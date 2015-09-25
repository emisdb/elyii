<?php
/* @var $this PicsController */
/* @var $model Pics */

$this->breadcrumbs=array(
	'Администрирование'=>array('/site/admin'),
	'Картинки'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Новый',
);

$this->menu=array(
	array('label'=>'Картинки', 'url'=>array('admin')),
	array('label'=>'Список файлов', 'url'=>array('filelist'),'linkOptions'=>array('target'=>'_blank'),),
);
?>

<h1>Создать картинку для щита №<?php echo $bbid; ?></h1>
<span id="ast_obj">Create pics</span>
<?php 
	if(!isset($bbid)) $bbid=null;
	echo $this->renderPartial('_form',array('model'=>$model,'ff'=>$ff,'bbid'=>$bbid));
 ?>
