<?php
$this->breadcrumbs=array(
	'Администрирование'=>array('site/admin'),
	'Отметки',
);

$this->menu=array(
	array('label'=>'Список отметок', 'url'=>array('index')),
	array('label'=>'Новая отметка', 'url'=>array('create')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('plan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление отметками</h1>

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
	'id'=>'plan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'coox',
		'cooy',
		'region_id',
		'next',
		'ptype',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
		),
	),
)); ?>
