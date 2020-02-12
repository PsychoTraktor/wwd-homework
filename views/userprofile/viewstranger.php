<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['view']];
$this->params['breadcrumbs'][] = $user->username."'s profile";

?>

<div>
            <div class="col-lg-offset-1 col-lg-11">
                
                <h1><?php echo Html::encode($user->username)?>'s Profile </h1>
                <div>
                    <p>Username: <?php echo Html::encode($user->username) ?>
                </div>
                <div>
                    <p>Email: <?php echo Html::encode($user->email) ?></p>
                </div>
                <div>
                    <p>Date Of Birth: <?php echo Html::encode($profile->birthdate) ?> </p>
                </div>
                <div>
                    <p>Introduction: <?php echo Html::encode($profile->introduction) ?> </p>
                </div>
                <div>
                    <p>Address: <?php echo Html::encode( $profile->address.', '.$profile->city.', '.$profile->zip.', '.$profile->country) ?></p>
                </div>
                <div>
                    <p>Number of articles: <?php echo Html::encode($profile->numberOfArticles($user->id)) ?></p>
                </div>
               
            </div>
    </div>
</div>