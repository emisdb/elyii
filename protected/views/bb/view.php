
<?php
/* @var $this BbController */
/* @var $model Bb */

		Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-1.5.2.min.js');
		Yii::app()->clientScript->registerScriptFile("http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU&coordorder=longlat");
		Yii::app()->clientScript->registerScriptFile(  Yii::app()->assetManager->publish('js/gtw.js' ), CClientScript::POS_HEAD);
		Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl."/css/gtw.css");
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
<div class="mapsis" id="map"></div>


<?php	
$this->endWidget('zii.widgets.jui.CJuiDialog');	
 ?>
 
	<div class="left-menu secondpage forthpage">
	<div class="moduletable">
		<div id="ariext88_container" class="ux-menu-container ux-menu-clearfix">
			<ul id="ariext88" class="ux-menu ux-menu-horizontal">
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item470 ux-menu-item-parent-pos0">
				<a href="http://elvispiter.ru" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					ГЛАВНАЯ						<span class="ux-menu-arrow"></span>			</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item472 ux-menu-item-parent-pos0">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=regions" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					ЩИТЫ 3*6					<span class="ux-menu-arrow"></span>			</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item471 ux-menu-item-parent-pos0">
				<a href="javascript:void(0)" onclick="gofind()" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
				<span id="find">ПОИСК</span>
<span class="ux-menu-arrow"></span>			</a>
				
<?php 

	$form=$this->beginWidget('CActiveForm', array(
	'id'=>'find-form',
//	'action'=>''.Yii::app()->request->baseUrl.'/index.php?r=bb/find',
//	'name'=>'respond-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); /*echo $form->errorSummary($fmodel); */
		echo $form->textField($fmodel,'r_id',array('size'=>1,'maxlength'=>3)); echo "\n";
	/*	echo $form->error($fmodel,'r_id'); */
		echo $form->textField($fmodel,'bb_id',array('size'=>1,'maxlength'=>3));  echo "\n";
		echo $form->textField($fmodel,'side_id',array('size'=>1,'maxlength'=>2));  echo "\n";
		$this->endWidget(); ?>
						</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item473 ux-menu-item-parent-pos0">
				<a onclick="$('#mydialog').dialog('open');" href="#" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					ПОКАЗАТЬ НА КАРТЕ	</a> <span class="ux-menu-arrow"></span>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>						</ul>
		</div>
	</div>
</div>
<div id="bb_pics">
<?php 
		$rows=$model->pics(array('condition'=>'side='.$side.' OR side=0','order'=>'ptype ASC'));
		$countrow=sizeof($rows);
		echo '<table class="scrolltab views"><thead><tr><th colspan="'.$countrow.'">';
		echo 'Щит №'.$model->num.' '.$model->name.' сторона '.$model->bbsides->sides0[$side-1]['name'];
		echo ' ('.$model->bbsides->sides0[$side-1]['text'].') </th></tr></thead>' ;
		echo '<tbody><tr>';
		for($ii=0;$countrow>$ii;$ii++)
		{
			echo "<td>";
			if($rows[$ii]['ptype']=='image')
				echo("<img src=\"".Yii::app()->request->baseUrl."/images/".$rows[$ii]['name']."\" >\n");
			else
				echo("<img src=\"//api-maps.yandex.ru/services/constructor/1.0/static/?sid=".$rows[$ii]['name']."\" alt=\"\" >\n");
			echo "</td>";
		} 
			echo "</tr></tbody></table>";
	
		echo "<script type=\"text/javascript\">\n";
		echo "coors =[\n";
		$i=0;
		echo "[".$model->id.", \"".str_replace("\"","\\\"",$model->name)."\", [".$model->coox.",".$model->cooy."],1   ,[";
		$arrlength=count($model->bbsides->sides0);
			for($x=0;$x<$arrlength;$x++)
			  {
			   if($x>0) echo ",";
			  echo "\"".$model->bbsides->sides0[$x]['name']."\"";
			  }	
				echo "]]\n";
			echo "];\n</script>\n";	
?>

</div>
