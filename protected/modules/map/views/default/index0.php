
<?php
/* @var $this BbController */
/* @var $model Bb */
		Yii::app()->clientScript->registerCssFile(  Yii::app()->request->baseUrl."/css/modmap.css");
		Yii::app()->clientScript->registerScriptFile(  "https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js", CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile("http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU&coordorder=longlat");
		Yii::app()->clientScript->registerScriptFile(  Yii::app()->assetManager->publish('js/modmap0.js' ), CClientScript::POS_BEGIN);
?>
    



<div id="mymap" class="layers"></div>
<div id="center" class="layers" style="background-image: url('css/sprite.png');top:350px;left:200px; height:120px; width:120px;background-position:-400px -470px"></div>
<div id="l_5" class="layers" style="background-image: url('css/l_5.png');top:270px;left:280px; height:200px; width:300px;"></div>
<div id="l_4" class="layers" style="background-image: url('css/l_4.png');top:190px;left:100px; height:200px; width:150px;"></div>
<ul id="listik">
	<li><a  href="javascript:void(0)" onmouseover="omover('l_5',300)" onmouseout="omout('l_5')">Мурманское шоссе</a></li>
	<li><a  href="javascript:void(0)" onmouseover="omover('l_4',150)" onmouseout="omout('l_4')">Выборгское шоссе</a></li>
</ul>
<div id="map_div">
<h2>Создание пользовательского типа карты</h2>
<div id="map" style="height:550px; width:680px;"></div>
<p>
<a  href="javascript:void(0)" style="background-color: RGB(249, 201, 16);" onclick="trigger()">Смена карты</a>
<p>
<div id="maps" style="height: 550px; width:680px;"></div>
</div>