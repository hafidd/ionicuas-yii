<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Wisata */

$this->title = 'Create Wisata';
$this->params['breadcrumbs'][] = ['label' => 'Wisatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wisata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
