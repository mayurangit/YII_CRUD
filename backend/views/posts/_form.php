<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Employees;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'post_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_body')->textarea(['rows' => '6', 'style' => 'resize:none; word-wrap:break-word;']) ?>

    <?= $form->field($model, 'post_createddate' , ['inputOptions' => ['autocomplete' => 'off']])->widget( DatePicker::className(), 
        [
        // inline too, not bad
         //'inline' => true, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'maxDate'=>'0',


        ]
], );?>

    <?= $form->field($model, 'post_author')->dropDownList(
            ArrayHelper::map(Employees::find()->all(), 'employee_id', 'employee_name'), ['prompt'=>'Select Author Name']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
