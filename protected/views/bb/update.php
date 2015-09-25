<?php
/* @var $this BbController */
/* @var $model Bb */

$this->breadcrumbs=array(
	'Администрирование'=>array('site/admin'),
	'Щиты'=>array('admin'),
	'Изменить',
);

$this->menu=array(
	array('label'=>'List Bb', 'url'=>array('index')),
	array('label'=>'Create Bb', 'url'=>array('create')),
	array('label'=>'View Bb', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Bb', 'url'=>array('admin')),
);
?>

<h1 id="header_id">Редактировать щит № <?php echo $model->id; ?></h1>
<span id="ast_obj">Update bb</span>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>