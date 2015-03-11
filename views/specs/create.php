<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Specs */

$this->title = 'Додати відповідального';
$this->params['breadcrumbs'][] = ['label' => 'Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
