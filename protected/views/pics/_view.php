<?php
/* @var $this PicsController */
/* @var $data Pics */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('side')); ?>:</b>
	<?php echo CHtml::encode($data->side); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bb_id')); ?>:</b>
	<?php echo CHtml::encode($data->bb_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ptype')); ?>:</b>
	<?php echo CHtml::encode($data->ptype); ?>
	<br />


</div>