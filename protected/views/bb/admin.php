<?php
/* @var $this BbController */
/* @var $model Bb */
Yii::app()->clientScript->registerScriptFile(  Yii::app()->assetManager->publish('js/adm.js' ), CClientScript::POS_HEAD);	

$this->breadcrumbs=array(
	'Администрирование'=>array('site/admin'),
	'Щиты'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Новый щит', 'url'=>array('create'),'linkOptions'=> array(
                            'target' => '_blank',
                                              ),),
);
/*	*/
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog',
    'options'=>array(
        'title'=>'Картинки',
       'modal'=>'true',
        'autoOpen'=>false,
    ),
));
/*
	$this->widget('zii.widgets.Cmenu',array('items'=>array(
	array('label'=>'Создать картинку', 'url'=>array('pics/create'),'linkOptions'=> array(
                            'target' => '_blank',
                                              ),),),));
*/
  echo "<div id='mydialog_buts'>";
  echo CHtml::link('Создать картинку',
					array('pics/createID','id'=>''),
					array('title'=>'Новая','target'=>'_blank'));
  echo "</div>";
 echo("<div id='mydialog_pics'></div>");
								
$this->endWidget('zii.widgets.jui.CJuiDialog');	

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#bb-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление щитами</h1>

<p>
Можно использовать символы  (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) в начале поисковой строки чтобы получить выборку строк с указанными значениями.
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
if(isset($rid))
    $dataProvider=$model->search($rid);
else 
    $dataProvider=$model->search();
$dataProvider->setPagination(array('pageSize'=>70,));

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bb-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		'id',
		'num',
		'region_id',
		'name',
		'sides',
		'coox',
		'cooy',
	   array(
				'name'=>'sides',
				'type'=>'raw',
				'value'=>'$data->sides." ".CHtml::link("<img src=\"'.Yii::app()->request->baseUrl.'/css/pic.png'.'\">","javascript:void(0)",array("onclick"=>"dopicwin(\"$data->id\")"))'
			),
/*		'pic',
		'next',
		*/
		array(
			'class'=>'CButtonColumn',
			 'template'=>'{update}{delete}',
			 'updateButtonOptions'=>array('target'=>'_blank'),
/*			'buttons'=>array
			(
				'pic' => array
				(
					'label'=>'Картинки',
					'imageUrl'=>Yii::app()->request->baseUrl.'/css/pic.png',
					'url'=>'"#"',
					'click'=>'function(){alert("ff");}',
				),
			),		
*/			),
	),
)); ?>
