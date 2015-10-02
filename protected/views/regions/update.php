<?php
$this->breadcrumbs=array(
	'Администрирование регионов'=>array('admins'),
	'Update',
);

$this->menu=array(
	array('label'=>'Список регионов', 'url'=>array('index')),
	array('label'=>'Администрирование регионов', 'url'=>array('admins')),
);
?>

<h1>Редакция региона<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>