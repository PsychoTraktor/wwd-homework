<?php

use yii\helpers\Html;
use yii\widgets\View;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div align="right">
            <p><b>Sort By:</b></p>
            <span><a href="<?php echo \yii\helpers\Url::to(['/article/index'])?>">date</a></span>
            <span><a href="<?php echo \yii\helpers\Url::to(['/article/indexbyviews'])?>">views</a></span>
            <span><a href="<?php echo \yii\helpers\Url::to(['/article/indexbycomments'])?>">comments</a></span>
    </div>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_article_item'
        
    ]); ?>


</div>