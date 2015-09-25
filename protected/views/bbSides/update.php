<?php
/* @var $this BbSidesController */
/* @var $model BbSides */

$this->breadcrumbs=array(
	'Bb Sides'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BbSides', 'url'=>array('index')),
	array('label'=>'Create BbSides', 'url'=>array('create')),
	array('label'=>'View BbSides', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BbSides', 'url'=>array('admin')),
);
?>

<h1>Update BbSides <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>