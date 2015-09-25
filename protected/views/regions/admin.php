<?php
$this->breadcrumbs=array(
	'Администрирование'=>array('site/admin'),
	'Регионы',
);

$this->menu=array(
	array('label'=>'Список регионов', 'url'=>array('index')),
	array('label'=>'Новый регион', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('regions-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление регионами</h1>

<p>
Вы можете использовать операции сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) в начале каждого поискового запроса для того, чтобы получить набор все подходящих значений.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'regions-grid',
	'dataProvider'=>$model->search(),
	'ajaxUpdate'=>false,
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'region_id',
		'next',
		array(
			'class'=>'CButtonColumn',
		),

	),

)); ?>
