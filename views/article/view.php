<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="text-muted">
        <small>
        Created <?php echo Yii::$app->formatter->asRelativeTime($model->created_at)?>

        by <a href="<?php echo \yii\helpers\Url::to(['/userprofile/viewstranger', 'username' => $model->createdBy->username])?>"> 
                 <?php echo $model->createdBy->username?>
            </a>
    </p>


    <?php if (!Yii::$app->user->isGuest): ?>
        <p>
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
        </p>
     <?php endif; ?>
     <div>
            <?php echo Html::encode($model->summarize); ?>
        </div>
        <div>
            <?php echo Html::encode($model->body); ?>
        </div>
</div>    
  
   <?php $this->render('@app/views/article/comment.php');  ?>

    <?php foreach($comments as $lofasz){ ?>
        <p><?= $lofasz->createdBy->username; ?></p>
        <p><?= $lofasz->body; ?></p>
        
    <?php } ?>

   