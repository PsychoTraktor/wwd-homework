<?php
use yii\helpers\Html;
/** @var $model \app\models\Article */
/** @var $model \app\models\Userprofileform*/
?>


<div>
    <a href="<?php echo \yii\helpers\Url::to(['view', 'slug' => $model->slug]) ?>">
        <h3><?php echo \yii\helpers\Html::encode($model->title) ?></h3>
    </a>
    <div>
        <?php echo \yii\helpers\StringHelper::truncateWords(\yii\helpers\Html::encode($model->body), 60) ?>
    </div>
    <p class="text-muted text-right">
        <small>
        Created <?php echo Yii::$app->formatter->asRelativeTime($model->created_at)?>

        by <a href="<?php echo \yii\helpers\Url::to(['/userprofile/viewstranger', 'name' => $model->createdBy->username])?>">
                 <?php echo $model->createdBy->username?>
            </a>
        views: <?php echo $model->getViews()?>
        </small>
    </p>
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
    <hr>
</div>