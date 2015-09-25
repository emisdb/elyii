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
		<?php echo $form->label($model,'coox'); ?>
		<?php echo $form->textField($model,'coox'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cooy'); ?>
		<?php echo $form->textField($model,'cooy'); ?>
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
		<?php echo $form->label($model,'ptype'); ?>
		<?php echo $form->textField($model,'ptype',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->