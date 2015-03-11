<?php

use yii\jui\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Works */
/* @var $form yii\widgets\ActiveForm */
//var_dump($id);
//$model->id_printers = $id;
?>

<div class="works-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($id){?>
    <?= $form->field($model, 'id_printers')->dropDownList(
            arrayHelper::map(\app\models\Printers::findAll(['id_printers'=>$id]),'id_printers','name')) ?>
    <?php } else { ?>
    <?= $form->field($model, 'id_printers')->dropDownList(
            arrayHelper::map(\app\models\Printers::find()->all(),'id_printers','name'))

    ?>
    <?php }?>

    <?php // $form->field($model, 'date')->textInput() ?>

    <?php // $form->field($model, 'date')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2014-01-01']]) ?>

    <?= $form->field($model, 'date')->widget(\yii\widgets\MaskedInput::classname(),
                ['name' => 'date',
                'clientOptions' => ['alias' => 'date']])
    ?>

    <?php // $form->field($model, 'summ')->textInput() ?>

    <?= $form->field($model, 'summ')->widget(\yii\widgets\MaskedInput::classname(),
        ['name' => 'summ',
        'clientOptions' => [
            'alias' => 'decimal',
            'groupSeparator' => ',',
            'autoGroup' => false
        ],])
    ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
