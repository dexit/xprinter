<?php

use yii\jui\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Works */
/* @var $form yii\widgets\ActiveForm */

$printers_obj = \app\models\Printers::find()->all();
$printers_arr = arrayHelper::map($printers_obj,'id_printers', 'name');
$printers_spec = arrayHelper::map($printers_obj,'id_printers', 'specs.fio');
foreach ($printers_arr as $k=>$v) {
    $printers_arr[$k]=$v.' - '.$printers_spec[$k];
}
?>

<div class="works-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if (!empty($id)){ ?>
    <?= $form->field($model, 'id_printers')->dropDownList(
        arrayHelper::map(\app\models\Printers::find()->where(['id_printers'=>$id])->all(),'id_printers','name')
    ); ?>
    <?php } else { ?>
    <?= $form->field($model, 'id_printers')->dropDownList(
        $printers_arr,['prompt'=>'--Оберіть принтер--']
    ); ?>
    <?php } ?>

    <?= $form->field($model, 'date')->widget(\yii\widgets\MaskedInput::classname(),
                ['name' => 'date',
                'clientOptions' => ['alias' => 'date']])
    ?>

    <?= $form->field($model, 'summ')->widget(\yii\widgets\MaskedInput::classname(),
        ['name' => 'summ',
        'clientOptions' => [
            'alias' => 'decimal',
            'groupSeparator' => ',',
            'autoGroup' => false
        ],])
    ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_perfs')->dropDownList(
            arrayHelper::map(\app\models\Perfs::find()->all(),'id_perfs','name'),[$model->id_perfs=>['selected'=>'selected']])
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Зберегти' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
