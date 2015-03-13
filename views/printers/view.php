<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Printers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Printers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="printers-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr />
    <p>
        <?= Html::a('Оновити', ['update', 'id' => $model->id_printers], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id_printers], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_printers',
            'name:ntext',
            'inv:ntext',
            'serial:ntext',
            'year',
            //'id_specs',
            'specs.fio',
        ],
    ]) ?>
    <hr />
    <h4><?= Html::encode("Виконані роботи") ?></h4>
    <?= GridView::widget([
       'dataProvider'=>$works,
       'columns'=>[
           'date:ntext',
           'summ:ntext',
           'description:ntext',
           'perfs.name'
        ],
    ]) ?>

    <?= Html::a('Додати роботи', ['works/create', 'id' => $model->id_printers], ['class' => 'btn btn-primary']) ?>
</div>
