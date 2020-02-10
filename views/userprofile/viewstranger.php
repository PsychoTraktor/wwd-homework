<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['view']];
$this->params['breadcrumbs'][] = $model->username."'s profile";

?>

<div>
            <div class="col-lg-offset-1 col-lg-11">
                
                <h1><?php echo Html::encode($model->username)?></h1>
                <div>
                    <p>Username: <?php echo Html::encode($model->username) ?>
                </div>
                <div>
                    <p>Email: <?php echo Html::encode($model->email) ?></p>
                </div>
                <div>
                    <p>Date Of Birth: <?php echo Html::encode($model->birthdate) ?> </p>
                </div>
                <div>
                    <p>Introduction: <?php echo Html::encode($model->introduction) ?> </p>
                </div>
                <div>
                    <p>Address: <?php echo Html::encode($model->address, $model->city, $model->zip, $model->country) ?></p>
                </div>
                <div>
                    <p>Number of articles: <?php echo Html::encode($model->address, $model->city, $model->zip, $model->country) ?></p>
                </div>
               
            </div>
    </div>
</div>