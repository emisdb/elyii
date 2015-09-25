<?php
/* @var $this PicsController */
/* @var $model Pics */

$this->breadcrumbs=array(
	'Администрирование'=>array('site/admin'),
	'Картинки'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Pics', 'url'=>array('index')),
	array('label'=>'Create Pics', 'url'=>array('create')),
	array('label'=>'Update Pics', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pics', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pics', 'url'=>array('admin')),
);
?>

<h1>View Pics #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'side',
		'bb_id',
		'ptype',
	),
)); ?>
