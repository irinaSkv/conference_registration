<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use common\widgets\Alert;
    use frontend\widgets\registration\assets\RegistrationAsset;
    
    RegistrationAsset::register($this);
?>
<div class="row">
    <div class="col-lg-5">
        <?php if (Yii::$app->session->getFlash('success')): ?>
            <?= Alert::widget() ?>
            <div class="friend-registration">
                <?= Html::button(
                    'Добавить друга', 
                    [
                        'class' => 'btn btn-primary js-addFriendBtn', 
                        'name' => 'register-button',
                        'title' => 'Добавить друга'
                    ]) ?>
            </div>
        <?php else: ?>
            <div class="registration-form" style="margin: 20px 40px;">
                <?php $form = ActiveForm::begin([
                    'id' => 'form-registration',
                    'options' => ['enctype' => 'multipart/form-data']
                ]); ?>
                <?= $form->field($registrationForm, 'username') ?>
                <?= $form->field($registrationForm, 'phone') ?>
                <?= $form->field($registrationForm, 'email') ?>
                <?= $form->field($registrationForm, 'post') ?>
                <?= $form->field($registrationForm, 'avatarFile')->fileInput() ?>
                <?= $form->field($registrationForm, 'conference_id')->hiddenInput([
                    'value' => $conference_id
                ]); ?>
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton(
                            'Зарегистрироваться',
                            [
                                'class' => 'btn btn-success js-submitForm',
                                'name' => 'register-button'
                            ]) ?>
                    </div>
                </div>
                <?php ActiveForm::end();?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $this->registerJs("RegistrationForm.init();");?>