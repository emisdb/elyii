<?php
/* @var $this BbController */
/* @var $model Bb */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sides'); ?>
		<?php echo $form->textField($model,'sides'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dir'); ?>
		<?php echo $form->textField($model,'dir'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coox'); ?>
		<?php echo $form->textField($model,'coox'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cooy'); ?>
		<?php echo $form->textField($model,'cooy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pic'); ?>
		<?php echo $form->textField($model,'pic'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'region_id'); ?>
		<?php echo $form->textField($model,'region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'next'); ?>
		<?php echo $form->textField($model,'next'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num'); ?>
		<?php echo $form->textField($model,'num'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->