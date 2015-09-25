<?php
/* @var $this SidesController */
/* @var $model Sides */

$this->breadcrumbs=array(
	'Sides'=>array('admin'),
	$model->name=>array('admin','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sides', 'url'=>array('index')),
	array('label'=>'Create Sides', 'url'=>array('create')),
	array('label'=>'View Sides', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sides', 'url'=>array('admin')),
);
?>

<h1 id="header_id">Редактировать сторону № <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>