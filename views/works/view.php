<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Works */

$this->title = $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="works-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редагувати', ['update', 'id' => $model->id_works], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id_works], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы впевнені, що бажаєте видаити ці дані?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_works',
            //'id_printers',
            'printers.name',
            'date:ntext',
            'summ',
            'description:ntext',
            'perfs.name',
        ],
    ]) ?>

</div>
