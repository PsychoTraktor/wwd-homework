<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use app\models\WshCoCity;
use yii\bootstrap\Modal;

$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['view']];
$this->params['breadcrumbs'][] = ['label' => 'Edit Profile', 'url' => ['edit']];

?>

<h1><?= Html::encode($this->title) ?></h1>

    


<div class="userprofile-edit container-fluid --element-background-color --radius --element-padding">

<h1>Edit Profile</h1>

<?php Modal::begin([
            'header' => '<h4>Edit Password</h4>',
            'id'     => 'modal',
            'size' => 'modal-sm',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
    ]);
    
    echo "<div id='modalContent'></div>";
    
    Modal::end();
?>

    <?php $form = ActiveForm::begin([
      
        'id' => '-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>
    <?= $form->field($model, 'id')->hiddenInput(['value'=>$model->id])->label(false);?>
    <?= $form->field($model, 'userid')->hiddenInput(['value'=>$model->userid])->label(false);?>
    <?= $form->field($model, 'username')?>
    <?= $form->field($model, 'email')->input('email')?>
    <?= $form->field($model, 'introduction')->textarea(['rows' => 3])?>
    <?= $form->field($model, 'birthdate')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'startDate' => date('1960-01-01'),
            'endDate' => date('')
        ]
]);?>
    <?= $form->field($model, 'address')?>
    <?= $form->field($model, 'zip_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(WshCoCity::find()->all(), 'cit_id', 'cit_zip'),
        'options' => ['placeholder' => 'Select a postal code...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])?>
    <?= $form->field($model, 'city')?>
    <?= $form->field($model, 'country')?>
    

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Update Profile', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            <?= Html::button('Change Password', ['value' => \yii\helpers\Url::to(['passwordedit']),'class' => 'btn btn-link', 'id' => 'modalButton']) ?>
         </div>
    </div>
        
    <?php ActiveForm::end(); ?>
</div>

<?php
$script = <<< JS
    //js goes here
    $('#userprofile-zip_id').change(function(){
        var zipId = $(this).val();
        $.get('index.php?r=city/get-city', {zipId : zipId}, function(data){
            var data = $.parseJSON(data);
            $('#userprofile-city').attr('value', data.cit_name);
        })
    });
JS;
$this->registerJs($script)
?>