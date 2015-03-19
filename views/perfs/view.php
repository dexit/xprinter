<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Perfs */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Perfs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редагувати', ['update', 'id' => $model->id_perfs], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id_perfs], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що бажаєте видалити даного виконавця?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_perfs',
            'name',
        ],
    ]) ?>

</div>
