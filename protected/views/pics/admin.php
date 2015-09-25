<?php
/* @var $this PicsController */
/* @var $model Pics */

$this->breadcrumbs=array(
	'Администрирование'=>array('/site/admin'),
	'Картинки'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список картинок', 'url'=>array('index')),
	array('label'=>'Создать картинку', 'url'=>array('create'),'linkOptions'=>array('target'=>'_blank')),	
	array('label'=>'Список файлов', 'url'=>array('filelist'),'linkOptions'=>array('target'=>'_blank')
),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pics-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление картинками</h1>
<p>
Для отбора значений можно использовать символы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) в начале каждого значения чтобы определить отбор, который вы хотите использовать.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pics-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'side',
		'bb_id',
		'ptype',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
