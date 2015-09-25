<?php
/* @var $this PicsController */
/* @var $model Pics */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pics-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
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
		<?php echo $form->DropDownList($model,'ptype',array('0'=>'image','1'=>'yandex'))?>	
		<?php echo $form->error($model,'ptype'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'ptype'); ?>
		<?php echo $form->textField($model,'ptype',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'ptype'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->