<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wisata */

$this->title = 'Update Wisata: ' . $model->wis_id;
$this->params['breadcrumbs'][] = ['label' => 'Wisatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->wis_id, 'url' => ['view', 'id' => $model->wis_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wisata-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
