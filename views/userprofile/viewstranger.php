<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['article/index']];
$this->params['breadcrumbs'][] = $user->username."'s profile";

?>

<div class="container-fluid --element-background-color --radius --element-padding">
            <div class="col-lg-offset-1 col-lg-11">
                
                <h1><?php echo Html::encode($user->username)?>'s Profile </h1>
                <div>
                    <p><b>Username:</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Html::encode($user->username) ?>
                </div>
                <div>
                    <p><b>Email:</b> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo Html::encode($user->email) ?></p>
                </div>
                <div>
                    <p><b>Date Of Birth:</b> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo Html::encode($profile->birthdate) ?> </p>
                </div>
                <div>
                    <p><b>Introduction:</b> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo Html::encode($profile->introduction) ?> </p>
                </div>
                <div>
                    <p><b>Address:</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo Html::encode( $profile->address.', '.$profile->city.', '.$profile->getZip().', '.$profile->country) ?></p>
                </div>
                <div>
                    <p><b>Number of articles made:&nbsp;&nbsp;&nbsp;&nbsp;</b> <?php echo Html::encode($profile->numberOfArticles($user->id)) ?></p>
                </div>
               
            </div>
    </div>
</div>