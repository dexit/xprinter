<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Works */

$this->title = 'Update Works: ' . ' ' . $model->id_works;
$this->params['breadcrumbs'][] = ['label' => 'Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_works, 'url' => ['view', 'id' => $model->id_works]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="works-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
