<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>
<div class="form">
<?php $set=Regions::model()->findAll();
	echo "<ul>";	
	for($ii=0;sizeof($set)>$ii;$ii++)
	{
		echo "<li>".$set[$ii]['id']." ".$set[$ii]['name']."=>".$set[$ii]['region_id']."->".$set[$ii]['next']."</li>";	
	} 
	echo "</ul>";		

 ?>
</div>
<p>
<div class="form">
<?php
	$category=Regions::model()->findByPk(0);
/*	$set=$category->descendants()->findAll();
	echo "<ul>";	
	for($ii=0;sizeof($set)>$ii;$ii++)
	{
		echo "<li>".$set[$ii]['id']." ".$set[$ii]['name']."=>".$set[$ii]['region_id']."->".$set[$ii]['next']."</li>";	
	} 
	echo "</ul>";		
*/
 ?>
</div>
<h2><?php echo "return: ".Yii::app()->user->returnUrl; ?></h2>
<h2><?php echo "login: ".Yii::app()->user->loginUrl; ?></h2>
<div id="accord">
<?php
$p1="Это action: ".$this->action->id.".";
$p2="Это controller ".get_class($this)." in the ".$this->module->id." module";
$p3="Это view <tt>".__FILE__."</tt>";
$this->widget('zii.widgets.jui.CJuiAccordion',array(
    'panels'=>array(
        'action'=>$p1,
        'controller'=>$p2,
        'view'=>$p3,
        // panel 3 contains the content rendered by a partial view
 //       'panel 4'=>$this->renderPartial('_partial',null,true),
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',
    ),
));
?>
</div>
<?php
$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
    'name'=>'city',
    'source'=>array('ac1','ac2','ac3'),
    // additional javascript options for the autocomplete plugin
    'options'=>array(
        'minLength'=>'2',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;',
    ),
));
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'publishDate',
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
     ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Dialog box 1',
       'modal'=>'true',
       'autoOpen'=>false,
    ),
));

    echo '<div id="mydialog_cont"></div>';

$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link('open dialog', '#', array(
   'onclick'=>'$("#mydialog").dialog("open"); return false;',
));
$this->beginWidget('zii.widgets.jui.CJuiDraggable',array(
    // additional javascript options for the draggable plugin
    'options'=>array(
        'scope'=>'myScope',
    ),
));
    echo 'Your draggable content here';

$this->endWidget();
$this->beginWidget('zii.widgets.jui.CJuiDroppable',array(
    // additional javascript options for the droppable plugin
    'options'=>array(
        'scope'=>'myScope',
    ),
));
    echo 'Your droppable content here';

$this->endWidget();
$class="goog";
echo CHtml::ajaxLink(
  "Link Text",
  Yii::app()->createUrl( 'Dude/default/ajaxRequest' ),
  array( // ajaxOptions
    'type' => 'POST',
    'beforeSend' => "function( request )
                     {
                      }",
    'success' => 'function( data )
                  {
                    $("#mydialog_cont").html(data);
                    $("#mydialog").dialog("open"); return false;
                  }',
    'data' => array( 'val1' => '1', 'val2' => '2' )
  ),
  array( //htmlOptions
    'href' => Yii::app()->createUrl( 'Dude/default/ajaxRequest' ),
    'class' => $class
  )
);
?>