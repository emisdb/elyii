<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'regions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region_id'); ?>
		<?php echo $form->textField($model,'region_id'); ?>
		<?php echo $model->parentname; ?>
		<?php echo $form->error($model,'region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'next'); ?>
		<?php echo $form->textField($model,'next'); ?>
		<?php echo $model->nextname; ?>
		<?php echo $form->error($model,'next'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>60,'maxlength'=>224)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" class="maps" id="svg_map" onmousemove="coors(evt)" style="width:680px; height:550px;background-image:url(<?php Yii::app()->baseUrl ?>/elyii/css/reg/leningrad_obl_map.png);">
    <style>
 polyline.cityroad{fill:none;}
.city-title{font-size:8pt;font-weight:normal;font-family:Arial Black;}
.road-title{fill:#f72579;font-size:8pt;font-weight:normal;font-family:Arial Black;}
</style>
<script type="text/ecmascript"> 
  <![CDATA[
    function coors(evt){
     var mousex=evt.clientX;
     var mousey=evt.clientY;
     var element=evt.target.parentNode.getElementById("box_what");
     element.firstChild.data=mousex;
     var element=evt.target.parentNode.getElementById("box_where");
     element.firstChild.data=mousey;
    }
]]>  
</script>
    <rect x="630" y="30" width="40" height="20" style="fill:#eee;stroke:#ccc;stroke-width:2;" />';
    <text id="box_what" x="640" y="45" style="fill:#888;font-size:10pt;">..</text>';
    <text x="630" y="20" style="fill:#999;font-size:8pt;">X:</text>';
    <rect  x="630" y="65" width="40" height="20" style="fill:#eee;stroke:#ccc;stroke-width:2;" />';
    <text id="box_where" x="640" y="80" style="fill:#888;font-size:10pt;">..</text>';
    <text x="630" y="60" style="fill:#999;font-size:8pt;">Y:</text>';
    
<image x="216" y="268" width="65" height="60" xlink:href="<?php Yii::app()->baseUrl ?>css/reg/k001.png"></image>
</svg>