<?php
/* @var $this SidesController */
/* @var $data Sides */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bb_s_id')); ?>:</b>
	<?php echo CHtml::encode($data->bb_s_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ord')); ?>:</b>
	<?php echo CHtml::encode($data->ord); ?>
	<br />


</div>