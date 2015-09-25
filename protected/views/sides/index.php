<?php
/* @var $this SidesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sides',
);

$this->menu=array(
	array('label'=>'Create Sides', 'url'=>array('create')),
	array('label'=>'Manage Sides', 'url'=>array('admin')),
);
?>

<h1>Sides</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
