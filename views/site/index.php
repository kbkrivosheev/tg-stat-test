<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Links;

/**
 * @var Links $model
 * @var ActiveForm $form
 */
$shortLink = $model->short ? Url::toRoute("/site/view?short={$model->short}", true) : '';
$this->title = 'Сервис коротких ссылок';
?>
    <h1><?= $this->title ?></h1>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'original')->textInput() ?>
<?= $form->field($model, 'short')->textInput(['disabled' => 'disabled', 'value' => $shortLink]) ?>
<?= $model->short ? Html::a('Перейдите по ссылке', $shortLink, ['target' => '_blank']) : '' ?>
    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Очистить ', '/', ['class' => 'btn btn-default btn']) ?>
    </div>
<?php ActiveForm::end(); ?>