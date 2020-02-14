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
                    <p><b>Username:&nbsp;&nbsp;&nbsp;&nbsp;</b> <?php echo Html::encode($user->username) ?>
                </div>
                <div>
                    <p><b>Email:&nbsp;&nbsp;&nbsp;&nbsp;</b> <?php echo Html::encode($user->email) ?></p>
                </div>
                <div>
                    <p><b>Date Of Birth:&nbsp;&nbsp;&nbsp;&nbsp;</b> <?php echo Html::encode($profile->birthdate) ?> </p>
                </div>
                <div>
                    <p><b>Introduction:&nbsp;&nbsp;&nbsp;&nbsp;</b> <?php echo Html::encode($profile->introduction) ?> </p>
                </div>
                <div>
                    <p><b>Address:&nbsp;&nbsp;&nbsp;&nbsp;</b> <?php echo Html::encode($profile->address.', '.$profile->city.', '.$profile->zip.', '.$profile->country) ?></p>
                </div>
                <div>
                <a href="<?php echo \yii\helpers\Url::to(['/article/myarticles'])?>">
                    <p><b>Number of articles made:&nbsp;&nbsp;&nbsp;&nbsp;</b> <?php echo Html::encode($profile->numberOfArticles($user->id)) ?></p>
                </a>        
                </div>
                
                <?= Html::a('Edit', ['edit'], ['class' => 'btn btn-primary']) ?>
            </div>
    </div>
</div>