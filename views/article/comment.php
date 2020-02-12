<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
?>

<div class="article-create">

    <h1>Leave Comment</h1>

    <?= $this->render('_commentform', [
        'model' => $model,
    ]) ?>

</div>
