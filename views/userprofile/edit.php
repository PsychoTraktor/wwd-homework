<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use app\models\WshCoCity;

$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['view']];
$this->params['breadcrumbs'][] = ['label' => 'Edit Profile', 'url' => ['edit']];

?>

<div class="userprofile-edit">
    <h1><?= Html::encode($this->title) ?></h1>


    

    <?php $form = ActiveForm::begin([
      
        'id' => '-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($user, 'username')?>
    <?= $form->field($user, 'email')->input('email')?>
    <?= $form->field($user, 'password')->input('password')?>
    <?= $form->field($profile, 'introduction')->textarea(['rows' => 3])?>
    <?= $form->field($profile, 'birthdate')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>
    <?= $form->field($profile, 'address')?>
    <?= $form->field($profile, 'zip')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(WshCoCity::find()->all(), 'cit_id', 'cit_zip'),
        'options' => ['placeholder' => 'Select a postal code...', 'id' => 'zipCode'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])?>
    <?= $form->field($profile, 'city')?>
    <?= $form->field($profile, 'country')?>
    

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php
$script = <<< JS
    //js goes here
    $('#zipCode').change(function(){
        var zipId = $(this).val();
        $.get('index.php?r=city/get-city', {zipId : zipId}, function(data){
            var data = $.parseJSON(data);
            alert(data.cit_name);
             $('#profile-city').attr('value', data.cit_name);
        })
    });
 JS;
$this->registerJs($script)
?>