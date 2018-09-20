<?php

/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'My Yii Application';
?>
<div class="site-index">
	
	<?php $form = ActiveForm::begin([
		'id' => 'send-form',
		'options' => [
			'enctype' => 'multipart/form-data',
		],
	]); ?>
	<?= $form->field($model, 'url', [
	])->textInput(['placeholder' => 'Введите сайт'])->label() ?>
	<?php echo Html::button('Перейти', ['type'=>'submit', 'id' => 'send']);?>
	<?php ActiveForm::end() ?>
	<div id="result"></div>
<!--	<iframe id="middle" width="100%" height="500px"></iframe>-->
	
</div>
