<?php
$this->breadcrumbs=array(
	'Plans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Plan', 'url'=>array('index')),
	array('label'=>'Manage Plan', 'url'=>array('admin')),
);
?>

<h1>Новая отметка</h1>
<span id="ast_obj">Create plan</span>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>