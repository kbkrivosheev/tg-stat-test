<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Сервис коротких ссылок';
?>
    <h1><?= $this->title ?></h1>
$form = ActiveForm::begin(); ?>
<?= $form->field($model, 'original')->textInput()?>
<?= $form->field($model, 'short')->textInput(['disabled' => 'disabled'])?>
    <div class="form-group">
        <?= Html::submitButton('Создать',[ 'class' =>'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>