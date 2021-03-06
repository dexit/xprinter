<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Specs */

$this->title = $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редагувати', ['update', 'id' => $model->id_specs], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id_specs], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що бажаєте видалити дану відповідальну особу?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_specs',
            'fio:ntext',
        ],
    ]) ?>

</div>
