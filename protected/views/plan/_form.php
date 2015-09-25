
<?php	
		Yii::app()->clientScript->registerScriptFile(  Yii::app()->assetManager->publish('js/admin.js' ), CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/admin.css'); 		

$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'nextdialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Выбрать позицию',
       'modal'=>'true',
       'width'=>'420px',
       'autoOpen'=>false,
    ),
));
echo("<div id='nextdisplay'></div>");
								
$this->endWidget('zii.widgets.jui.CJuiDialog');	


$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Выбрать регион',
       'modal'=>'true',
       'autoOpen'=>false,
    ),
));/**/

$this->widget('ext.accWidget',array('model'=>Regions::model(),
								'columns'=>array(array('','name')),
								'id'=>'id',
								'togo'=>'prods/group',
								'next'=>'next',
								'par'=>'region_id',
								'action'=>'select_id(this,"Plan_region_id","regname","mydialog")',
								'active'=>$model->region['id'],
								'class'=>'topnav',
								'level'=>2));	

$this->endWidget('zii.widgets.jui.CJuiDialog');	
/**/	
 ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'plan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cooy'); ?>
		<?php echo $form->textField($model,'cooy'); ?>
		<?php echo $form->error($model,'cooy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coox'); ?>
		<?php echo $form->textField($model,'coox'); ?>
		<?php echo $form->error($model,'coox'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'region_id'); ?>
		<?php echo CHtml::textField('regname',$model->region['name'],array('length'=>'30','readonly'=>'readonly')); ?>
		<?php echo CHtml::button("...",array('onclick'=>'$("#mydialog").dialog("open");')); ?>
		<?php echo $form->hiddenField($model,'region_id'); ?>
		<?php echo $form->error($model,'region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'next'); ?>
		<?php echo $form->textField($model,'next',array('length'=>'5','readonly'=>'readonly')); ?>
		<?php echo CHtml::button("...",array('onclick'=>'dowin("Plan_region_id","header_id","plan")')); ?>
		<?php echo CHtml::button("X",array('onclick'=>'$("#Plan_next").val("");')); ?>
		<?php echo $form->error($model,'next'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ptype'); ?>
		<?php echo $form->dropDownList($model,'ptype', array('point' => 'point', 'line' => 'line'));?>
		<?php echo $form->error($model,'ptype'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); 

?>


</div><!-- form -->

