<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Update Article: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'slug' => $model->slug]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-update --element-background-color --radius --element-padding">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_updateform', [
        'model' => $model,
    ]) ?>

</div>
