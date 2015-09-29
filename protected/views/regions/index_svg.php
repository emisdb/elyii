<?php
	$this->widget('ext.dosvg.dosvg',array(
					'tree'=>$model->getRegionMap(),
					'mode'=>'map',
					'svgid'=>'svg_map',
					'class'=>'maps',
					'width'=>680,
					'height'=>550,
					'background'=>'/css/reg/leningrad_obl_map.png',
					'poststuff'=>'<image x="216" y="268" width="65" height="60" xlink:href="css/reg/k001.png" />',

		));
?>
	<div class="left-menu">
	<div class="moduletable">
		<div id="ariext88_container" class="ux-menu-container ux-menu-clearfix">
			<ul id="ariext88" class="ux-menu ux-menu-vertical">
					<li id="pickbutton" class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item470 ux-menu-item-parent-pos0">
				<a onclick="gogo()" href="javascript:void(0)" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					ВЫБРАТЬ						<span class="ux-menu-arrow"></span>			</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
							</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item471 ux-menu-item-parent-pos0">
				<a href="javascript:void(0)" onclick="gofind()" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
				<span id="find">ПОИСК</span>
<span class="ux-menu-arrow"></span>			</a>
				
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'find-form',
//	'action'=>''.Yii::app()->request->baseUrl.'/index.php?r=bb/find',
//	'name'=>'respond-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<?php /*echo $form->errorSummary($fmodel); */
		echo $form->textField($fmodel,'r_id',array('size'=>2,'maxlength'=>3)); echo "\n";
	/*	echo $form->error($fmodel,'r_id'); */
		echo $form->textField($fmodel,'bb_id',array('size'=>2,'maxlength'=>3));  echo "\n";
		echo $form->textField($fmodel,'side_id',array('size'=>2,'maxlength'=>2));  echo "\n";
		$this->endWidget(); ?>
				

				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
			</ul>
		</div>
	</div>

<?php
	$obj=$this->widget('ext.bccWidget',array('model'=>$model,
								'columns'=>array(array('','name')),
								'id'=>'id',
								'func'=>false,
								'togo'=>'prods/group',
								'next'=>'next',
								'par'=>'region_id',
								'class'=>'topnav',
								'level'=>2));
	$reg_list=$obj->ret_value;
//		Yii::app()->clientScript->registerScriptFile("http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU&coordorder=longlat", CClientScript::POS_BEGIN);
		Yii::app()->clientScript->registerScriptFile(  Yii::app()->assetManager->publish('js/region.js' ), CClientScript::POS_BEGIN);
//		$url = Yii::app()->assetManager->publish('css/sprite.png');

?>

	<div class="moduletable">
		<div id="ariext87_container" class="ux-menu-container ux-menu-clearfix">
			<ul id="ariext87" class="ux-menu ux-menu-vertical">
					<li id="pickbutton_" class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item472 ux-menu-item-parent-pos0">
				<a onclick="gogo()" href="javascript:void(0)" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					ВЫБРАТЬ						<span class="ux-menu-arrow"></span>			</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
			</ul>
		</div>
	</div>
	</div>
							
