<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WorksSearch */
/* @var $form yii\widgets\ActiveForm */

$datepickerOptions = [
    'language' => 'UK',
    'dateFormat'=>'dd/MM/yyyy',
    'clientOptions' => [
        'showAnim' => 'slideDown',
        'autoSize'=>true,
        'regional'=>'',
        'showOn'=>'button',
        'buttonImage'=> 'images/calendar.png',
	    'buttonImageOnly'=> true,
        'dayNamesMin'=> [ "Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Нд" ],
        'monthNames'=> [ "Січень", "Лютий", "Березень", "Квітень", "Травень",
                         "Червень", "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень" ],
    ]
];
?>

<div class="works-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'date_from')->widget(\yii\jui\DatePicker::className(),$datepickerOptions) ?>

    <?= $form->field($model, 'date_to')->widget(\yii\jui\DatePicker::className(),$datepickerOptions) ?>

    <?php // echo $form->field($model, 'id_perfs') ?>

    <div class="form-group">
        <?= Html::submitButton('Пошук', ['class' => 'btn btn-primary']) ?>
        <?= Html::button('Відмінити', ['class' => 'btn btn-default',
                                        'onclick'=>'(function ($event)
                                            {
                                                document.getElementById("workssearch-date_from").value = "";
                                                document.getElementById("workssearch-date_to").value = "";
                                            })();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
