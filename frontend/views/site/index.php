<?php

use yii\helpers\Html;
use frontend\widgets\registration\RegistrationWidget;

/* @var $this yii\web\View */

$this->title = 'Регистрация участников';
if ($conference) {
    $this->title .= ' на конференцию "' . $conference->title . '"';
}
?>
<div class="site-registration">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= RegistrationWidget::widget([
        'form' => $registrationForm,
        'data' => $post
    ]); ?>
</div>