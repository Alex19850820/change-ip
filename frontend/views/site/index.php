<?php

/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'My Yii Application';
?>
<div class="site-index">
	
	<?php $form = ActiveForm::begin([
//    'action' => \yii\helpers\Url::to(['/site/send-form']),
		'id' => 'send-form',
//		'method' => 'post',
		'options' => [
			'enctype' => 'multipart/form-data',
//			'onsubmit' => 'return false',
		],
	]); ?>
	<?= $form->field($model, 'url', [
	])->textInput(['placeholder' => 'Введите сайт'])->label() ?>
	<?= $form->field($model, 'proxy', [
	])->hiddenInput(['value'=>$model->proxy])->label(false);?>
	<?php echo Html::button('Перейти', ['type'=>'submit', 'id' => 'send']);?>
<!--	<input type="submit" value="Send" id="send" >-->
	<?php ActiveForm::end() ?>
	<div id="result"></div>
	<iframe id="middle"></iframe>
	
<!--	--><?php
//		$js =  <<<JS
//		$('#send').on('click', function() {
//			alert('sdfsdf');return false;
//		  $.ajax({
//		    url: '/site/send-form',
//		    data: {122:'123'},
//		    success:function(res) {
//		      console.log(res);
//		    },
//		    error:function() {
//		        alert('error');
//		    }
//		  })
//		});
//JS;
//	?>
	
	
</div>
