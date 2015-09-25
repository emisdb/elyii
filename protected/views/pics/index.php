<?php
/* @var $this PicsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Администрирование'=>array('/site/admin'),
	'Картинки'=>array('admin'),
	'Картинки',
);

$this->menu=array(
//	array('label'=>'List Expence', 'url'=>array('index')),
	array('label'=>'Новая картинка', 'url'=>array('create')),
//	array('label'=>'View Expence', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Картинки', 'url'=>array('admin')),
);

?>

<h1>Картинки</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
