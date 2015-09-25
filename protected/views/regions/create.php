<?php
$this->breadcrumbs=array(
	'Администрирование регионов'=>array('admin'),
	'Новый',
);

$this->menu=array(
	array('label'=>'Список регионов', 'url'=>array('index')),
	array('label'=>'Администрирование регионов', 'url'=>array('admin')),
);
?>

<h1>Create Regions</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>