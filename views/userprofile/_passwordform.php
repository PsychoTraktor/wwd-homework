<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

?>

<div class="modal-content container-fluid align-center" >

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'password')->passwordInput(['style'=>'width:237px']) ?>
    <?= $form->field($model, 'password_repeat')->passwordInput(['style'=>'width:237px']) ?>
     <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
