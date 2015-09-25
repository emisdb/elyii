<?php
/* @var $this PicsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Администрирование'=>array('/site/admin'),
	'Картинки'=>array('admin'),
	'Картинки',
);

$this->menu=array(
//	array('label'=>'List Expence', 'url'=>array('index')),
	array('label'=>'Новая картинка', 'url'=>array('create')),
//	array('label'=>'View Expence', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Картинки', 'url'=>array('admin')),
);

?>
		<?php 

		$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'accountsdialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Картинка',
       'modal'=>'true',
       'width'=>'620px',
       'autoOpen'=>false,
    ),
));
								
echo("<div id='pay_table'></div>");
								
$this->endWidget('zii.widgets.jui.CJuiDialog');	
		
?>
<h1>Список файлов</h1>
<table class="tab_fl">
<?php 
$inti=0;
foreach($model as $row)
{
	if (($row==".")||($row=="..")) continue;
echo "<tr><td>".(++$inti)."</td><td>$row</td>";
echo "<td>	".CHtml::ajaxLink(
    '<div class="fl_view"></div>',          // the link body (it will NOT be HTML-encoded.)
    array('ajaxReq'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
    array(
 		'type'=>'POST',
       'update'=>'#pay_table',
 		'data'=>array('val_id'=>$row),
//       'beforeSend' => 'function() {$("#maindiv").addClass("loading");}',
        'complete' => 'function() {$("#accountsdialog").dialog("option","title","'.$row.'");
									$("#accountsdialog").dialog("open");}',        
    )
).CHtml::link('<div class="fl_del"></div>',array('fileDelete',
                   'file'=>$row),array('confirm' => 'Удалить файл?'))."</td></tr>\n";
}
?>
</table>