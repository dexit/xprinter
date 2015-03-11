<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Printers */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
    $years = ['2000'=>'2000','2001'=>'2001','2002'=>'2002','2003'=>'2003','2004'=>'2004',
            '2005'=>'2005','2006'=>'2006','2007'=>'2007','2008'=>'2008','2009'=>'2009',
            '2010'=>'2010','2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014',
            '2015'=>'2015','2016'=>'2016','2017'=>'2017'];
?>

<div class="printers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'inv')->textInput() ?>

    <?= $form->field($model, 'serial')->textInput() ?>

    <?= $form->field($model, 'year')->dropDownList($years) ?>

    <?= $form->field($model, 'id_specs')->dropDownList(
                arrayHelper::map(\app\models\Specs::find()->all(),'id_specs','fio'),
                ['prompt'=>'--Обрати відповідального--'])
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
