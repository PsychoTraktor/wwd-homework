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

        by <a href="<?php echo \yii\helpers\Url::to(['/userprofile/show', 'name' => $model->createdBy->username])?>">
                 <?php echo $model->createdBy->username?>
            </a>
    </p>


    <?php if (!Yii::$app->user->isGuest): ?>
        <p>
            <?= Html::a('', ['update', 'id' => $model->slug], ['class' => 'glyphicon glyphicon-edit']) ?>
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
            
    </div>
    <div>

    <div class="comment-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($comments, 'body')->textarea(['rows' => 3]) ?>

        <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <p><?php echo $comment->body ?></p>


<table border="1">
    <tr>
        <th>Full_name</th>
        <th>Address</th>
        <th>Phone</th>
    </tr>
    <?php foreach($model as $field){ ?>
    <tr>
    <td><?= $field->id; ?></td>
        <td><?= $field->body; ?></td>
        <td><?= $field->created_by; ?></td>
    </tr>
    <?php } ?>
</table>