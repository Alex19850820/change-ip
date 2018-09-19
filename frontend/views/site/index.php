<?php

/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'My Yii Application';
?>
<div class="site-index">
	
	<?php $form = ActiveForm::begin([
    'action' => \yii\helpers\Url::to(['/site/send-form']),
		'id' => 'send-form',
		'method' => 'post',
		'options' => [
			'enctype' => 'multipart/form-data'
		],
	]); ?>
	<?= $form->field($model, 'url', [
	])->textInput(['placeholder' => 'Введите сайт'])->label() ?>
	<?= $form->field($model, 'proxy', [
	])->hiddenInput(['value'=>$model->proxy])->label(false);?>
	<?php echo Html::button('Перейти', ['type'=>'submit','class' => 'phone-massage-btn js_phoneMassage']);?>
	<?php ActiveForm::end() ?>
</div>
