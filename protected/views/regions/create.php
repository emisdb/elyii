<?php
$this->breadcrumbs=array(
	'Администрирование регионов'=>array('admins'),
	'Новый',
);

$this->menu=array(
	array('label'=>'Список регионов', 'url'=>array('index')),
	array('label'=>'Администрирование регионов', 'url'=>array('admins')),
);
?>

<h1>Новый регион</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>