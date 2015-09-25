<?php
/* @var $this BbSidesController */
/* @var $model BbSides */

$this->breadcrumbs=array(
	'Bb Sides'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BbSides', 'url'=>array('index')),
	array('label'=>'Manage BbSides', 'url'=>array('admin')),
);
?>

<h1>Create BbSides</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>