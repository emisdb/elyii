<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coox')); ?>:</b>
	<?php echo CHtml::encode($data->coox); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cooy')); ?>:</b>
	<?php echo CHtml::encode($data->cooy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region_id')); ?>:</b>
	<?php echo CHtml::encode($data->region_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('next')); ?>:</b>
	<?php echo CHtml::encode($data->next); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ptype')); ?>:</b>
	<?php echo CHtml::encode($data->ptype); ?>
	<br />


</div>