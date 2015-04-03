<?php

use yii\helpers\Html;
//use yii\grid\GridView;

use kartik\export\ExportMenu;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Роботи';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="works-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>


    <p>
        <?= Html::a('Додати роботу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php

    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'date:ntext',
        //'id_works',
        //'id_printers',
        ['attribute'=>'printersname','value'=>'printers.name'],
        // ['attribute'=>'printername','value'=>function($data){return $data->printername;}],
        ['attribute'=>'inv','value'=>'printers.inv'],
        ['attribute'=>'specs','value'=>'specs.fio'],
        //['attribute'=>'specs','value'=>'printers.id_specs'],
        //['attribute'=>'fio','value'=>'printers.specs.fio'],
        'summ',
        'description:ntext',
        ['attribute'=>'perfs','value'=>'perfs.name'],

        ['class' => 'yii\grid\ActionColumn'],
    ];

    $pageSummary = "wdd";

        echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'fontAwesome' => true,
        'dropdownOptions' => [
            'label' => 'Export All',
            'class' => 'btn btn-default'
        ]
    ]);
    ?>
    <hr />
    <?=
    \yii\bootstrap\Collapse::widget([
        'items' => [
            [
                'label' => 'Пошук за період',
                'content' => $this->render('_search', ['model' => $searchModel]),
                'contentOptions' => [ ],
                'options' => [ ]
            ],
        ]
    ]);
    ?>
    <hr />
    <?= kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
    ]); ?>

</div>
