<?php
/* @var $this BbSidesController */
/* @var $model BbSides */

$this->breadcrumbs=array(
	'Bb Sides'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List BbSides', 'url'=>array('index')),
	array('label'=>'Create BbSides', 'url'=>array('create')),
	array('label'=>'Update BbSides', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BbSides', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BbSides', 'url'=>array('admin')),
);
?>

<h1>View BbSides #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sides',
		'name',
	),
)); ?>
