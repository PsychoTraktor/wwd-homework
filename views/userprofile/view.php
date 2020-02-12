<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['view']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div>
            <div class="col-lg-offset-1 col-lg-11">
                
                <h1>My Profile</h1>
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
                    <p>Address: <?php echo Html::encode($profile->address.', '.$profile->city.', '.$profile->zip.', '.$profile->country) ?></p>
                </div>
                <div>
                    <p>Number of articles made: <?php echo Html::encode($profile->numberOfArticles($user->id)) ?></p>
                </div>
                
                <?= Html::a('Edit', ['edit'], ['class' => 'btn btn-primary']) ?>
            </div>
    </div>
</div>