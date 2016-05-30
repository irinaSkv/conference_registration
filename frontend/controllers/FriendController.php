<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\FriendRegistrationForm;

/**
 * Контролер записи друзейы
 */
class FriendController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout = false;

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Форма добавления друзей
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $post = Yii::$app->request->post();
        $friendRegistrationForm = new FriendRegistrationForm();
        if ($post && $friendRegistrationForm->load($post)) {
            $friendRegistrationForm->submit();
            return $this->goBack();
        }
        return $this->render(
            'index',
            [
                'registrationForm' => $friendRegistrationForm
            ]
        );
    }
    
    /**
     * Форма добавления друзей
     */
    public function actionSave()
    {
        $post = Yii::$app->request->post();
        $form = new FriendRegistrationForm();
        if ($form->load($post, '')) {
            $form->submit();
        }
        return $this->render('save');
    }
}
