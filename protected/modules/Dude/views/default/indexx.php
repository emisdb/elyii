<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

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

    echo 'dialog content here';

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

echo CHtml::ajaxLink(
  "Link Text",
  Yii::app()->createUrl( 'Dude/ajaxRequest' ),
  array( // ajaxOptions
    'type' => 'POST',
    'beforeSend' => "function( request )
                     {
                      }",
    'success' => "function( data )
                  {
                    alert( data );
                  }",
    'data' => array( 'val1' => '1', 'val2' => '2' )
  ),
  array( //htmlOptions
    'href' => Yii::app()->createUrl( 'Dude/ajaxRequest' ),
    'class' => $class
  )
);
?>