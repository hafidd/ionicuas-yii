<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WisataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wisatas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wisata-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Wisata', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'wis_id',
            'wis_kab_id',
            'wis_jenis_id',
            'wis_nama',
            'wis_keterangan:ntext',
            //'wis_lat',
            //'wis_long',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
