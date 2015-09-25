<?php
/* @var $this BbSidesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bb Sides',
);

$this->menu=array(
	array('label'=>'Create BbSides', 'url'=>array('create')),
	array('label'=>'Manage BbSides', 'url'=>array('admin')),
);
?>

<h1>Bb Sides</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
