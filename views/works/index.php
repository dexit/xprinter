<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Роботи';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider->setSort(['defaultOrder'=>['date'=>SORT_ASC],]);

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


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
