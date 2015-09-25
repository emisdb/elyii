<?php
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/tooltip.js');

/*
$this->breadcrumbs=array(
	'Bbs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Bb', 'url'=>array('index')),
	array('label'=>'Create Bb', 'url'=>array('create')),
	array('label'=>'Update Bb', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Bb', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bb', 'url'=>array('admin')),
);
<a name="map"></a>
*/
?>

<a name="cart">
<div id="cart_screen"></div>
</a>

<a name="map">
<div class="mapsi" id="map"></div>
</a>

<div id="stblock">
	<div class="left-menu secondpage">
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
					ЩИТЫ 3*6						<span class="ux-menu-arrow"></span>			</a>
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
)); /*echo $form->errorSummary($fmodel); */
		echo $form->textField($fmodel,'r_id',array('size'=>1,'maxlength'=>3)); echo "\n";
	/*	echo $form->error($fmodel,'r_id'); */
		echo $form->textField($fmodel,'bb_id',array('size'=>1,'maxlength'=>3));  echo "\n";
		echo $form->textField($fmodel,'side_id',array('size'=>1,'maxlength'=>2));  echo "\n";
		$this->endWidget(); ?>
				</li>
					<li id="pickbutton_" class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item473 ux-menu-item-parent-pos0">
				<a onclick="showmap()" href="#" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					ПОКАЗАТЬ ВЫБРАННЫЕ									</a> <span class="ux-menu-arrow"></span>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li id="pickbutton" class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item474 ux-menu-item-parent-pos0">
				<a onclick="gogo()" href="javascript:void(0)" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					ОТПРАВИТЬ В КОРЗИНУ						<span class="ux-menu-arrow"></span>			</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
			</ul>
		</div>
	</div>
</div>

<table class="scrolltab">
<col width="34px"><col width="42px"><col width="*"><col width="40px"><col width="52px">
<tr>
<td>X</td><td>GID</td><td>Адрес</td><td>Стор.</td><td>Напр.</td>
</tr>
</table>
<div id="scrolltab" class="scrolltab">
<?php	$this->widget('ext.MapTabWidget',array('model'=>$model,
			'with'=>array('bbsides.sides0'),
			'id'=>'id',
			'togo'=>'prods/group',
			'next'=>'next',
			'rownum'=>array('type'=>'b','relation'=>'bbsides','relation2'=>'sides0'),
			'rownam'=>array('type'=>'d','relation'=>'bbsides','relation2'=>'sides0','field'=>'name'),
			'par'=>'region_id',
			'where'=>'region_id',
			'catname'=>'name',
			'coox'=>'coox',
			'cooy'=>'cooy',
			'colspan'=>5,
			'colname'=>array('type'=>'a','relation'=>'region','field'=>'name'),
			'titname'=>array('34px','42px','*','40px','52px'),
			'pars'=>$list,
			'level'=>1,					
			'cont'=>array(
				array('type'=>'t','value'=>'<td>','rs'=>'x'),
				array('type'=>'v','value'=>'num'),
				array('type'=>'t','value'=>'</td>'),
				array('type'=>'t','value'=>'<td style="text-align:left;"><a href="javascript:void(0)" onclick="dowin(\'tr','rs'=>'x'),
				array('type'=>'v','value'=>'id'),
				array('type'=>'t','value'=>'.'),
				array('type'=>'s','value'=>'sides'),
				array('type'=>'t','value'=>'\');">'),
				array('type'=>'v','value'=>'name'),
				array('type'=>'t','value'=>'</a>'),
				array('type'=>'t','value'=>'</td>'),

/*				array('type'=>'r','value'=>'<td rowspan >','rs'=>'x','skip'=>'p'),
				array('type'=>'v','value'=>'num','skip'=>'p'),
				array('type'=>'t','value'=>'</td>','skip'=>'p'),
				array('type'=>'r','value'=>'<td rowspan style="text-align:left;"><a href="javascript:void(0)" onclick="dowin(\'tr','rs'=>'x','skip'=>'p'),
				array('type'=>'v','value'=>'id','skip'=>'p'),
				array('type'=>'t','value'=>'.','skip'=>'p'),
				array('type'=>'s','value'=>'sides','skip'=>'p'),
				array('type'=>'t','value'=>'\');">','skip'=>'p'),
				array('type'=>'v','value'=>'name','skip'=>'p'),
				array('type'=>'t','value'=>'</a>','skip'=>'p'),
				array('type'=>'t','value'=>'</td>','skip'=>'p'),
*/

				array('type'=>'t','value'=>'<td>'),
				array('type'=>'d','relation'=>'bbsides','relation2'=>'sides0','field'=>'name'),
//				array('type'=>'c','value'=>'sides'),
				array('type'=>'t','value'=>'</td><td>'),
				array('type'=>'d','relation'=>'bbsides','relation2'=>'sides0','field'=>'text'),
//				array('type'=>'d','value'=>'dir'),
				array('type'=>'t','value'=>'</td>'),
						)
				));

				?>
</div>
</div>
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
<br>
<div id='mydialog_pics'></div>
<!-- div id='mydialog_map'></div-->
<?php	
$this->endWidget('zii.widgets.jui.CJuiDialog');	
 ?>