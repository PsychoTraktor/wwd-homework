<?php
/** @var $model \app\models\Article */
/** @var $model \app\models\Userprofileform*/
?>


<div class="container-fluid --element-background-color --radius --element-padding">
    <a href="<?php echo \yii\helpers\Url::to(['view', 'slug' => $model->slug]) ?>">
        <h3><?php echo \yii\helpers\Html::encode($model->title) ?></h3>
    </a>
    <div>
    <?php echo \yii\helpers\StringHelper::truncateWords(\yii\helpers\Html::encode($model->summarize), 60) ?>
    </div>
    <hr>
    <p class="text-muted text-right">
        <small>
            Created <?php echo Yii::$app->formatter->asDate($model->created_at)?>

            by <a href="<?php echo \yii\helpers\Url::to(['/userprofile/viewstranger', 'username' => $model->createdBy->username])?>">
                 <?php echo $model->createdBy->username?>
                </a> <br>
            views: <?php echo $model->getViews()?><br>
            comments: <?php echo $model->countComments($model->id)?><br>
        </small>
    </p>
</div>