<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Perfs */

$this->title = 'Update Perfs: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Perfs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_perfs]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
