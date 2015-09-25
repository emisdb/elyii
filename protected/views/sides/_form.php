<?php
/* @var $this SidesController */
/* @var $model Sides */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sides-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textField($model,'text',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bb_s_id'); ?>
		<?php echo $form->textField($model,'bb_s_id'); ?>
		<?php echo $form->error($model,'bb_s_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ord'); ?>
		<?php echo $form->textField($model,'ord'); ?>
		<?php echo $form->error($model,'ord'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->