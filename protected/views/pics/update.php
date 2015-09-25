<?php
/* @var $this PicsController */
/* @var $model Pics */

$this->breadcrumbs=array(
	'Администрирование'=>array('/site/admin'),
	'Картинки'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Редакция',
);

$this->menu=array(
//	array('label'=>'List Expence', 'url'=>array('index')),
	array('label'=>'Новая картинка', 'url'=>array('create')),
//	array('label'=>'View Expence', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Картинки', 'url'=>array('admin')),
	array('label'=>'Список файлов', 'url'=>array('filelist'),'linkOptions'=>array('target'=>'_blank'),));
?>

<h1>Редакция картинки №<?php echo $model->id; ?></h1>
<span id="ast_obj">Update pics</span>
<?php echo $this->renderPartial('_form',array('model'=>$model,'ff'=>$ff,)); ?>