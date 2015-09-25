<?php
$this->breadcrumbs=array(
	'Администрирование'=>array('site/admin'),
	'Plans'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Plan', 'url'=>array('index')),
	array('label'=>'Create Plan', 'url'=>array('create')),
	array('label'=>'View Plan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Plan', 'url'=>array('admin')),
);
?>

<h1 id="header_id">Редактировать отметку № <?php echo $model->id; ?></h1>
<span id="ast_obj">Update plan</span>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>