<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Перелік принтерів';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="printers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_printers',
            //'name:ntext',
            ['attribute'=>'name',
                'format'=>'raw',
                'value'=>function ($data) {
                return "<a href=".\yii\helpers\Url::to('?r=printers/view&id='.$data->id_printers).">".$data->name."</a>";
            },],
            'inv:ntext',
            'serial:ntext',
            'year',
            ['attribute'=>'specs','value'=>'specs.fio'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
