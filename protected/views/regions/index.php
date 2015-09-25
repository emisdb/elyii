
<div class="maps" id="map_pic"></div>
<div id='k0' class='layers' style='background-image: url("css/reg/k000.png");'></div>
<div id='k1' class='layers' style='background-image: url("css/reg/k1.png");'></div>

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
<?php
	foreach($reg_list as $id)	echo ("<div id='k$id' class='layers' style='background-image: url(\"css/reg/k$id.png\");'></div>\n");
//?>								
