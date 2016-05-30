<?php
namespace frontend\models;

use yii\web\UploadedFile;
use common\models\User;
use frontend\models\AbstractRegistrationForm;

/**
 * Форма регистрации друга
 */
class FriendRegistrationForm extends AbstractRegistrationForm
{
    public $username;
    public $post;
    
    /**
     * @var UploadedFile
     */
    public $avatarFile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['avatarFile', 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            
            [['username', 'post'], 'filter', 'filter' => 'trim'],
            [['username', 'post', 'avatarFile'], 'required'],
            ['username', 'string', 'min' => 3, 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Имя участника',
            'post' => 'Должность',
            'avatarFile' => 'Аватар'
        ];
    }
    
    /**
     * Сохранение друга
     */
    public function submit()
    {
        $this->avatarFile = UploadedFile::getInstance($this, 'avatarFile'); 
        if ($this->validate()) {
            $this->upload();
            $values = $this->getAttributes();
            $userFriend = new User();
            $userFriend->setAttributes($values);
            $userFriend->avatar_url = 'uploads/' . $this->avatarFile->name;
            $userFriend->referer_user_id = \Yii::$app->session->get('user_id', 0);
            $password = \Yii::$app->security->generateRandomString();
            $userFriend->setPassword($password);
            $userFriend->generateAuthKey();
            if ($userFriend->save()) {
                \Yii::$app->session->setFlash(
                    'success', 'Друг зарегистрирован'
                );
            }
        }
    }
}