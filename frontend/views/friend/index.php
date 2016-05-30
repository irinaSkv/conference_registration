<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="row">
    <div class="friend-registration">
        <?php $form = ActiveForm::begin([
            'id' => 'friend-registration',
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>
        <h3><?= Html::encode('Добавление друга'); ?></h3>
        <?= $form->field($registrationForm, 'username') ?>
        <?= $form->field($registrationForm, 'post') ?>
        <?= $form->field($registrationForm, 'avatarFile')->fileInput() ?>
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-11">
                <?= Html::submitButton(
                    'Зарегистрировать друга',
                    [
                        'class' => 'btn btn-success js-saveFriendBtn',
                        'name' => 'register-friend-button'
                    ]) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>