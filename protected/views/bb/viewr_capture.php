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
<table class="scrolltab">
<col width="34px"><col width="42px"><col width="*"><col width="42px"><col width="54px">
<tr>
<td>X</td><td>GID</td><td>Адрес</td><td>Стор.</td><td>Напр.</td>
</tr>
</table>
<div id="scrolltab">
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
</div>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'name'=>'respond-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

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
	</div>

	<div class="row">
		<?php echo $form->labelEx($fmodel,'subject'); ?>
		<?php echo $form->textField($fmodel,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($fmodel,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($fmodel,'body'); ?>
		<?php echo $form->textArea($fmodel,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($fmodel,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($fmodel,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($fmodel,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($fmodel,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
