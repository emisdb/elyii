<?php
/* @var $this SidesController */
/* @var $model Sides */

$this->breadcrumbs=array(
	'Sides'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sides', 'url'=>array('index')),
	array('label'=>'Manage Sides', 'url'=>array('admin')),
);
?>

<h1>Create Sides</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>