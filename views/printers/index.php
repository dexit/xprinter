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
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_printers',
            //'name:ntext',
            ['attribute'=>'name',
                'format'=>'raw',
                'value'=>function ($data) {
                    return "<a href=".\yii\helpers\Url::to('?r=printers/view&id='.$data->id_printers).">".$data->name."</a>
                    <a href=".\yii\helpers\Url::to('?r=works/create&id='.$data->id_printers)." title='Додати роботи'>
                        <span class='glyphicon glyphicon glyphicon-plus'></span>
                    </a>";
                },
            ],
            'inv:ntext',
            'serial:ntext',
            //'countworks',
            ['attribute'=>'countworks',
                'label'=>'Кількість робіт',
                'value'=>function ($data){
                    //return $count = \app\models\Works::find()->where(['id_printers'=>$data->id_printers])->count();
                    //var_dump($data);
                    return $data->countworks;
                }
            ],
            'year',
            ['attribute'=>'specs','value'=>'specs.fio'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
