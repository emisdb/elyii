<?php
/* @var $this BbController */
/* @var $model Bb */

$this->breadcrumbs=array(
	'Bbs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Управление щитами', 'url'=>array('admin')),
);
?>

<h1>Новый щит</h1>
<span id="ast_obj">Create bb</span>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>