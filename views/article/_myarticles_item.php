<?php
use yii\helpers\Html;
/** @var $model \app\models\Article */
/** @var $model \app\models\Userprofileform*/
?>


<div class="container-fluid --element-background-color --radius --element-padding">
    <a href="<?php echo \yii\helpers\Url::to(['view', 'slug' => $model->slug]) ?>">
        <h3><?php echo \yii\helpers\Html::encode($model->title) ?></h3>
    </a>
    <?= Html::a('', ['update', 'slug' => $model->slug], ['class' => 'glyphicon glyphicon-edit']) ?>
        <?= Html::a('', ['delete', 'slug' => $model->slug], [
                'class' => 'glyphicon glyphicon-remove',
                'style' => 'color:red',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
                ])
             ?>
    <div class="text-muted text-right">
        <small>
        views: <?php echo $model->getViews()?> <br>
        comments: <?php echo $model->countComments($model->id)?>
        </small>
    </div>
</div>