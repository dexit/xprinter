<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Perfs */

$this->title = 'Create Perfs';
$this->params['breadcrumbs'][] = ['label' => 'Perfs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
