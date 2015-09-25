<div  id="content" name="content">
<?php
$this->breadcrumbs=array(
	'Regions',
);

$this->menu=array(
	array('label'=>'Create Regions', 'url'=>array('create')),
	array('label'=>'Manage Regions', 'url'=>array('admin')),
);
?>

<h1>Regions</h1>

<?php
	$this->widget('ext.HLWidget',array('model'=>$model,
								'columns'=>array(array('','name')),
								'id'=>'id',
								'togo'=>'prods/group',
								'next'=>'next',
								'par'=>'region_id',
								'level'=>2));
?>
</div>

