<?php
$this->pageTitle=Yii::app()->name . ' - Администрирование';
$this->breadcrumbs=array(
	'Администрирование',
);
?>
<h2>Административная панель</h2>


	<div id="admmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Регионы', 'url'=>array('/regions/admins')),
				array('label'=>'Отметки регионов', 'url'=>array('/plan/admin')),
				array('label'=>'Щиты', 'url'=>array('/bb/admin')),
				array('label'=>'Типы', 'url'=>array('/bbsides/admin')),
				array('label'=>'Картинки', 'url'=>array('/pics/admin')),
				array('label'=>'Пользователи', 'url'=>array('/users/admin')),
				array('label'=>'выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu >
<img src="//api-maps.yandex.ru/services/constructor/1.0/static/?sid=_iDDkfPmSmfuuqegCxCCDMds7tPcHKoI&width=600&height=450" alt=""/-->