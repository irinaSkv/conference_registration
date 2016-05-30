<?php

namespace frontend\widgets\registration;

use frontend\models\RegistrationForm;
use common\models\User;
use yii\web\UploadedFile;
use common\models\Conference;
use common\models\ConferenceHasUser;

/**
 * Виджет формы регистрации
 */
class RegistrationWidget extends \yii\bootstrap\Widget
{
    /**
     * @var RegistrationForm
     */
    public $form;
    
    /**
     *
     * @var array 
     */
    public $data;

    public function run() 
    {
        $user_id = \Yii::$app->session->get('user_id', 0);
        $user = User::findOne($user_id);
        if ($this->form->load($this->data)) {
            $this->form->avatarFile = UploadedFile::getInstance(
                $this->form, 'avatarFile'
            );
            if ($this->form->validate()) {
                $this->form->upload();
                $values = $this->form->getAttributes();
                $conference = Conference::findOne([
                    'id' => $values['conference_id']
                ]);
                $user = new User();
                $user->setAttributes($values);
                $user->avatar_url = 'uploads/' . $this->form->avatarFile->name;
                $password = \Yii::$app->security->generateRandomString();
                $user->setPassword($password);
                $user->generateAuthKey();
                if ($user->save() && $conference) {
                    $link = new ConferenceHasUser();
                    $link->setAttributes([
                        'conference_id' => $conference->id,
                        'user_id' => $user->id
                    ]);
                    $link->save();
                    $user_id = $user->id;
                    \Yii::$app->session->set('user_id', $user->id);
                }
            }
        }
        if ($user && !\Yii::$app->session->getFlash('success')) {
            \Yii::$app->session->setFlash(
                'success', 'Вы зарегистрированы на конференцию'
            );
        }
        return $this->render(
            'index', 
            [
                'registrationForm' => $this->form,
                'conference_id' => $this->data['conference_id']
            ]
        );
    }
}
