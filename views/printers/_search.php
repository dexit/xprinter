<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PrinterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="printers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_printers') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'inv') ?>

    <?= $form->field($model, 'serial') ?>

    <?= $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'id_specs') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
