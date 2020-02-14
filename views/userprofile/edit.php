<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['view']];
$this->params['breadcrumbs'][] = ['label' => 'Edit Profile', 'url' => ['edit']];

?>

<div class="userprofile-edit">
    <h1><?= Html::encode($this->title) ?></h1>


    

    <?php $form = ActiveForm::begin([
      
        'id' => '-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($user, 'username')?>
    <?= $form->field($user, 'email')->input('email')?>
    <?= $form->field($user, 'password')->input('password')?>
    <?= $form->field($profile, 'introduction')->textarea(['rows' => 3])?>
    <?= $form->field($profile, 'birthdate')?>
    <?= $form->field($profile, 'address')?>
    <?= $form->field($profile, 'city')?>
    <?= $form->field($profile, 'zip')?>
    <?= $form->field($profile, 'country')?>>
    

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>