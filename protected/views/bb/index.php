<?php
/* @var $this BbController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bbs',
);

$this->menu=array(
	array('label'=>'Create Bb', 'url'=>array('create')),
	array('label'=>'Manage Bb', 'url'=>array('admin')),
);
?>

<h1>Bbs</h1>


<?php
	print_r($dataProvider);
/*
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
*/
 ?>
