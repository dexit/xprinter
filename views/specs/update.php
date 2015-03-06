<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Specs */

$this->title = 'Update Specs: ' . ' ' . $model->id_specs;
$this->params['breadcrumbs'][] = ['label' => 'Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_specs, 'url' => ['view', 'id' => $model->id_specs]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="specs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
