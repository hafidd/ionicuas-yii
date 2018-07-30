<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Wisata */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wisata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'wis_kab_id')->textInput() ?>

    <?= $form->field($model, 'wis_jenis_id')->textInput() ?>

    <?= $form->field($model, 'wis_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wis_keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'wis_lat')->textInput() ?>

    <?= $form->field($model, 'wis_long')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
