<?php
$this->pageTitle=Yii::app()->name . ' - File load';
/*
	$this->breadcrumbs=array(
	'Login',
);
*/
?>

<h1>Load</h1>

<div class="form">
<?php 
	$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);
?>
	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model, 'image'); ?>
		<?php echo $form->error($model,'image'); ?>
		<p class="hint">
			Hint: You may looad image here.
		</p>
	</div>
	<div class="row buttons">

		<?php 
		echo CHtml::submitButton('Submit');
		$this->endWidget(); ?>
	</div>
</div><!-- form -->
