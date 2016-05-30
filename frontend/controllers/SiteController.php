<?php
namespace frontend\controllers;

use Yii;
use frontend\models\RegistrationForm;
use yii\web\Controller;
use common\models\Conference;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Главная страница записи на конференцию
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $registartionForm = new RegistrationForm();
        $post = Yii::$app->request->post();
        $conference = Conference::findOne([
            'id' => 1
        ]);
        $post['conference_id'] = $conference->id;
        return $this->render(
            'index',
            [
                'registrationForm' => $registartionForm,
                'post' => $post,
                'conference' => $conference
            ]
        );
    }
}
