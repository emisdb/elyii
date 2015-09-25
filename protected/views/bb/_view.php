<?php
/* @var $this BbController */
/* @var $data Bb */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sides')); ?>:</b>
	<?php echo CHtml::encode($data->sides); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dir')); ?>:</b>
	<?php echo CHtml::encode($data->dir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coox')); ?>:</b>
	<?php echo CHtml::encode($data->coox); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cooy')); ?>:</b>
	<?php echo CHtml::encode($data->cooy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic')); ?>:</b>
	<?php echo CHtml::encode($data->pic); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('region_id')); ?>:</b>
	<?php echo CHtml::encode($data->region_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('next')); ?>:</b>
	<?php echo CHtml::encode($data->next); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num')); ?>:</b>
	<?php echo CHtml::encode($data->num); ?>
	<br />

	*/ ?>

</div>