<?php $this->beginContent('//layouts/main_adm'); ?>

	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Операции',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
<!-- nocolumn -->
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->





<?php $this->endContent(); ?>