<?php

/*
$this->breadcrumbs=array(
	'Bbs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Bb', 'url'=>array('index')),
	array('label'=>'Create Bb', 'url'=>array('create')),
	array('label'=>'Update Bb', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Bb', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bb', 'url'=>array('admin')),
);
*/
?>
<?php	
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Щит',
       'modal'=>'true',
       'autoOpen'=>false,
    ),
));
 ?>
<h2 id="mydialog_h2"></h2>
<br>
<div id='mydialog_pics'></div>
<!--div id='mydialog_map'></div-->
<?php	
$this->endWidget('zii.widgets.jui.CJuiDialog');	
 ?>
 
<a name="cart"></a>
<div id="cart_screen"></div>
<a name="map">
<div class="mapsi" id="map"></div>
</a>
<div id="stblock">
	<div class="left-menu secondpage thirdpage">
	<div class="moduletable">
		<div id="ariext88_container" class="ux-menu-container ux-menu-clearfix">
			<ul id="ariext88" class="ux-menu ux-menu-horizontal">
					<li id="pickbutton_" class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item475 ux-menu-item-parent-pos0">
				<a onclick="showmap()" href="#" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					Показать выбранные									</a> <span class="ux-menu-arrow"></span>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item470 ux-menu-item-parent-pos0">
				<a href="http://elvispiter.ru" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					Главная						<span class="ux-menu-arrow"></span>			</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item472 ux-menu-item-parent-pos0">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=regions" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					Щиты 3*6						<span class="ux-menu-arrow"></span>			</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
						</ul>
		</div>
	</div>
</div>


<table class="scrolltab">
<col width="34px"><col width="42px"><col width="*"><col width="42px"><col width="54px">
<tr>
<td>X</td><td>GID</td><td>Адрес</td><td>Стор.</td><td>Напр.</td>
</tr>
</table>
<div id="scrolltab" class="res">
<?php	$this->widget('ext.MapTabWidget',array('model'=>$model,
			'with'=>array('bbsides.sides0'),
			'id'=>'id',
			'togo'=>'prods/group',
			'next'=>'next',
			'rownum'=>array('type'=>'b','relation'=>'bbsides','relation2'=>'sides0'),
			'rownam'=>array('type'=>'d','relation'=>'bbsides','relation2'=>'sides0','field'=>'name'),
			'par'=>'region_id',
			'where'=>'t.id',
			'catname'=>'name',
			'coox'=>'coox',
			'cooy'=>'cooy',
			'colspan'=>5,
				'titname'=>array('34px','42px','*','42px','54px'),
		'colname'=>array('type'=>'a','relation'=>'region','field'=>'name'),
			'pars'=>$list,
			'sides'=>$lists,
			'type'=>1,
			'level'=>1,					
			'cont'=>array(
				0=>array('type'=>'t','value'=>'<td>'),
				1=>array('type'=>'v','value'=>'num'),
				2=>array('type'=>'t','value'=>'</td><td style="text-align:left;"><a href="javascript:void(0)" onclick="dowin(\'tr'),
				3=>array('type'=>'v','value'=>'id'),
				4=>array('type'=>'t','value'=>'.'),
				5=>array('type'=>'s','value'=>'sides'),
				6=>array('type'=>'t','value'=>'\');">'),
				7=>array('type'=>'v','value'=>'name'),
				8=>array('type'=>'t','value'=>'</a></td><td>'),
				10=>array('type'=>'d','relation'=>'bbsides','relation2'=>'sides0','field'=>'name'),
				11=>array('type'=>'t','value'=>'</td><td>'),
				12=>array('type'=>'d','relation'=>'bbsides','relation2'=>'sides0','field'=>'text'),
//				9=>array('type'=>'d','value'=>'dir'),
				13=>array('type'=>'t','value'=>'</td>'),
						)
				));
 ?>
</div>

<div class="form">


	<div class="left-menu bottom">
	<div class="moduletable">
		<div id="ariext87_container" class="ux-menu-container ux-menu-clearfix">
			<ul id="ariext87" class="ux-menu ux-menu-vertical">
					<li id="pickbutton" class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item474 ux-menu-item-parent-pos0">
				<a onclick="gores()" href="javascript:void(0)" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					ОТПРАВИТЬ ЗАЯВКУ						<span class="ux-menu-arrow"></span>			</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
			</ul>
		</div>
	</div>
	
	</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
//	'name'=>'respond-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>	
<p class="note">Поля отмеченные "<span class="required">*</span>" обязательны.</p>


	<?php echo $form->errorSummary($fmodel); ?>

	<div class="row">
		<?php echo $form->labelEx($fmodel,'name'); ?>
		<?php echo $form->textField($fmodel,'name'); ?>
		<?php echo $form->error($fmodel,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($fmodel,'email'); ?>
		<?php echo $form->textField($fmodel,'email'); ?>
		<?php echo $form->error($fmodel,'email'); ?>
		<?php echo $form->labelEx($fmodel,'subject'); ?>
		<?php echo $form->textField($fmodel,'subject',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($fmodel,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($fmodel,'linky'); ?>
		<?php echo $form->labelEx($fmodel,'body'); ?>
		<?php echo $form->textArea($fmodel,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($fmodel,'body'); ?>
	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->

</div>
