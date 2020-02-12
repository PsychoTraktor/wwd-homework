<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(['action' => ['comment']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'summarize')->textarea(['rows' => 2]) ?>
    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'public')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\"> {label} {input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ])->checkbox(['label' => 'Public']) ?>
    <?= $form->field($model, 'commentable')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\"> {label} {input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ])->checkbox(['label' => 'Commentable']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
