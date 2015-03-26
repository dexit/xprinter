<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Роботи';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider->setSort(['defaultOrder'=>['date'=>SORT_DESC],]);

?>
<div class="works-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати роботу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'date:ntext',
            //'id_works',
            //'id_printers',
            ['attribute'=>'printers','value'=>'printers.name'],
            ['attribute'=>'fio','value'=>'printers.specs.fio'],
            //['attribute'=>'fio','value'=>'printers.specs.fio'],
            'summ',
            'description:ntext',
            ['attribute'=>'perfs','value'=>'perfs.name'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
