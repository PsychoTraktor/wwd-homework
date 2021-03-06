<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Create Article';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create --element-background-color --radius --element-padding">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_createform', [
        'model' => $model,
    ]) ?>

</div>
