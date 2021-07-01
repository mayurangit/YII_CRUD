<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Branches;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Employees */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employees-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employee_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branches_branch_id')->dropDownList(

            ArrayHelper::map(Branches::find()->all(), 'branch_id', 'branch_name'), ['prompt'=>'Select Branch']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
