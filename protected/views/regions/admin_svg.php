<?php

$this->breadcrumbs=array(
	'Администрирование'=>array('site/admin'),
	'Регионы',
);
?>

<?php
//$this->menu=array(
//	array('label'=>'Список регионов', 'url'=>array('index')),
//	array('label'=>'Новый регион', 'url'=>array('create')),
//);

?>

<h1>Управление регионами</h1>
<?php
if (strlen($errnote)>0)
	{ 
	echo '<div style="border: #f00 groove 3px; color:#f00; width:500px;">'.$errnote."</div>\n";
}
?>

<div class="maps" style="overflow-x: scroll;width:730px;">
<?php

	$this->widget('ext.dosvg.dosvg',array(
					'tree'=>$model,
					'mode'=>'bush',
					'svgid'=>'svg_map',
					'class'=>'svg',
					'width'=>680,
					'height'=>550,
					'poststuff'=>'',

		));
?>
</div>

<div style="border: #0480be groove 3px; width:200px;margin-left:10px;float:left;padding-bottom:10px;background-color:#5fa;">
	<h3>Операции</h3>
		<div id="admmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Перенести перед', 'url'=>'javascript:void(0)','linkOptions'=>array('onclick'=>'operations("mb");')),
				array('label'=>'Перенести после', 'url'=>'javascript:void(0)','linkOptions'=>array('onclick'=>'operations("ma");')),
				array('label'=>'Перенести в', 'url'=>'javascript:void(0)','linkOptions'=>array('onclick'=>'operations("mi");')),
				array('label'=>'Создать перед', 'url'=>'javascript:void(0)','linkOptions'=>array('onclick'=>'operations("cb");')),
				array('label'=>'Создать после', 'url'=>'javascript:void(0)','linkOptions'=>array('onclick'=>'operations("ca");')),
				array('label'=>'Создать в', 'url'=>'javascript:void(0)','linkOptions'=>array('onclick'=>'operations("ci");')),
				array('label'=>'Удалить', 'url'=>'javascript:void(0)','linkOptions'=>array('onclick'=>'operations("d");')),
			),
		)); ?>
	</div>
	<!-- mainmenu -->

</div>
