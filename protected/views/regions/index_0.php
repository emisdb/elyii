<div  id="contenti" name="content">
<?php
$this->breadcrumbs=array(
	'Regions',
);

$this->menu=array(
	array('label'=>'Create Regions', 'url'=>array('create')),
	array('label'=>'Manage Regions', 'url'=>array('admin')),
);
?>

<div id="sel_title" onclick="gogo()">Отбор</div><div id="sel_screen"></div>
<div class="maps" id="map"></div>
<?php
	$this->widget('ext.accWidget',array('model'=>$model,
								'columns'=>array(array('','name')),
								'id'=>'id',
								'togo'=>'prods/group',
								'next'=>'next',
								'par'=>'region_id',
								'class'=>'topnav',
								'level'=>2));
?>
</div>

