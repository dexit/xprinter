<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Роботи';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider->setSort(['defaultOrder'=>['date'=>SORT_DESC],]);

//var_dump(time());
//$date_to_unixtime = strtotime('25th October 2009 11:12:34 PM (UTC)');
//var_dump($date_to_unixtime);
//$unix_to_date = timetostr($date_to_unixtime);
//var_dump($unix_to_date);
//$unixtime_to_date = date('d/m/Y', time());
//var_dump($unixtime_to_date);

?>
<div class="works-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати роботу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'date:ntext',
            //'id_works',
            //'id_printers',
            ['attribute'=>'printers','value'=>'printers.name'],
            'summ',
            'description:ntext',
            ['attribute'=>'perfs','value'=>'perfs.name'],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
