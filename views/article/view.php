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
<div class="article-view --element-background-color --radius --element-padding">

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
        <p><?php echo Html::encode($model->summarize); ?></p>
    </div>

    <div>
    <p><?php echo Html::encode($model->body); ?></p>
    </div>



    
</div>
<hr>

<div class="comment-view">

<?php if ($model->commentable == 1): ?> 

    <?php if (Yii::$app->user->isGuest): ?>
        <h4>If You want to leave a comment, please log in!</h4>
    <?php else: ?>
        <h3>Leave a Comment</h3>

        <div class="comment-form">

            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($comment, 'article_id')->hiddenInput(['value'=>$model->id])->label(false); ?>           
            <?= $form->field($comment, 'body')->textarea(['cols' => 3])->label(false); ?>
        
            <div class="form-group">
                <?= Html::submitButton('Comment', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    <?php endif; ?>  

       
   <div >
        <h3>Comments</h3>
        <div>    
            <?php foreach(array_reverse($comments) as $item){ ?>
            <div class = "--element-background-color --radius --element-padding">
               
                <p><b><?= $item->createdBy->username; ?></b></p>
                <p><?= $item->body; ?></p>
                
            </div>
            <?php } ?>
        </div> 
    </div>
       
  
    <?php else: ?>
        <h3>This article is not commentable.</h3>  
    <?php endif; ?>
        
</div>
