<?php

use yii\jui\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Works */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="works-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if (!$model->isNewRecord){?>
    <?= $form->field($model, 'id_printers')->dropDownList(
            arrayHelper::map(\app\models\Printers::findAll(['id_printers'=>$model->id_printers]),'id_printers','name')) ?>
    <?php } else { ?>
    <?= $form->field($model, 'id_printers')->dropDownList(
            arrayHelper::map(\app\models\Printers::find()->all(),'id_printers','name'))

    ?>
    <?php }?>

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

    <?php if ($model->isNewRecord){ ?>
        <?= $form->field($model, 'id_perfs')->dropDownList(
            arrayHelper::map(\app\models\Perfs::find()->all(),'id_perfs','name')
        ) ?>
    <?php } else { ?>
        <?= $form->field($model, 'id_perfs')->dropDownList(
            arrayHelper::map(\app\models\Perfs::findAll(['id_perfs'=>$model->id_perfs]),'id_perfs','name')
        ) ?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
