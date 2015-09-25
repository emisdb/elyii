<?php
/* @var $this PicsController */
/* @var $model Pics */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-1.5.2.min.js');
		Yii::app()->clientScript->registerScriptFile(  Yii::app()->assetManager->publish('js/adm.js' ), CClientScript::POS_HEAD);		
		Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/admin.css'); 		

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'pics-form',
       'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($ff,'image'); ?>
		<?php echo $form->fileField($ff, 'image',array('size'=>60,'maxlength'=>128,'onchange'=>'doch()')); ?>
		<?php echo $form->error($ff,'image'); ?>
		<p class="hint">
			Загрузка файла картинки.
		</p>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'side'); ?>
		<?php echo $form->textField($model,'side'); ?>
		<?php echo $form->error($model,'side'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bb_id'); ?>
		<?php echo $form->textField($model,'bb_id',array('value'=>$bbid)); ?>
		<?php echo $form->error($model,'bb_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ptype'); ?>
		<?php echo $form->DropDownList($model,'ptype',array('image'=>'image','yandex'=>'yandex'),array('onchange'=>'dochange()'))?>	
		<?php echo $form->error($model,'ptype'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->