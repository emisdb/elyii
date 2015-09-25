
<?php
/* @var $this BbController */
/* @var $model Bb */
		Yii::app()->clientScript->registerCssFile(  Yii::app()->request->baseUrl."/css/modmap.css");
		Yii::app()->clientScript->registerScriptFile(  "https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js", CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile(  Yii::app()->assetManager->publish('js/modmap.js' ), CClientScript::POS_BEGIN);
?>
    



<div id="mymap" class="layers">

</div>

<div id="l_4" class="layers" style="background-image: url('css/reg/l_4.png');top:225px;height:150px; width:230px;">
</div>
<div id="pointi" class="layers" style="background-image: url('css/reg/pointi.png');top:225px;left:90px; height:26px; width:25px;">
</div>
<div id="point" class="layers" style="background-image: url('css/reg/point.png');top:255px;left:10px; height:26px; width:25px;">
</div><div id="center" class="layers" style="background-image: url('css/sprite.png');top:350px;left:200px; height:120px; width:120px;background-position:-400px -470px"></div>
<div id="l_5" class="layers" style="background-image: url('css/reg/l_5.png');top:270px;left:280px; height:200px; width:300px;"></div>

<ul id="listik">
	<li><a  href="javascript:void(0)" onmouseover="omover('l_5',300)" onmouseout="omout('l_5')">Мурманское шоссе</a></li>
	<li><a  href="javascript:void(0)" onmouseover="omover('l_4',235)" onmouseout="omout('l_4')">Выборгское шоссе</a></li>
	<li><a  href="javascript:void(0)" onmouseover="omover('pointi',26,120)" onmouseout="omout('pointi',25)">Выборг</a></li>
	<li><a  href="javascript:void(0)" onmouseover="omover('point',26,35)" onmouseout="omout('point',25)">Торфяновка</a></li>
</ul>
<div id="map_div">
Картинка складывается из следующих элементов:
<ol>
<li>Основная картинка (карта) размером:   height: 550px;  width: 680px;
<p>
Пример:
<p>
 <img src='css/reg/mapbg.jpg' style="border:2px solid blue;">
</li>
<li>Картинка (спрайт) на каждый элемент для направления (дороги), который меняет цвет (или какая угодно иная анимация):
	<ol>
		<li>Картинка представляет из себя элемент на карте в двух состояниях - начальное и выделенное
		<p>
			Пример:
			<p> <img src='css/reg/l_4.png' style="border:2px solid blue;">
		</li>
		<li>Выделенный элемент должен идти справа от начального с отступом в 2 пикселя</li>
		<li>Картинка должна быть оптимального размера для того чтобы минимизировать объем файла</li>
		<li>Картинка должна быть в формате png на прозрачном фоне	</li>
		<li>Название файла картинки должно быть в формате r_#.png, где # - номер региона, который он обозначает</li>
		<li>Номер кода нужно брать из файла <a href="css/reg/reg.csv">Скачать файл</a> (колонка №1)</li>
		<li>Файл вернуть со следующими значениями( по колонкам):
			<ol>
				<li>C: (top) расстояние в пикселях от верхнего края основной картинки (карты) до расположения картинки элемента </li>
				<li>D: (left) расстояние в пикселях от левоно края края основной картинки (карты) до расположения картинки элемента </li>
				<li>E: (height) высота картинки элемента </li>
				<li>F: (width) ширина картинки элемента (только начального значения)</li>
			</ol>
			<p>
			Пример:
			<p>
			 <img src='css/reg/mapbg_sizes.jpg' style="border:2px solid blue;">
		</li>
	</ol>
</li>
<li>Картинка (спрайт) на каждый элемент для одиночного пункта:
	<ol>
		<li>Картинка представляет из себя элемент на карте в двух состояниях - начальное и выделенное
			Пример:
			<p> <img src='css/reg/point.png' style="border:2px solid blue;">
		</li>
		<li>Выделенный элемент должен идти справа от начального с отступом в 2 пикселя</li>
		<li>Картинка должна быть оптимального размера для того чтобы минимизировать объем файла</li>
		<li>Картинка должна быть в формате png на прозрачном фоне	</li>
		<li>Если для каждого пункта будет использоваться одинаковое обозначение, то достаточно одной картинки (Пример Торфяновка)</li>
		<li>но если каждый регион будет отмечаться чем-то особенным (например в выделенном состоянии будет всплывать название, то соответственно каждый пункт должен быть снабжен оригинальной картинкой (Пример Выборг)
			Пример:
			<p> <img src='css/reg/pointi.png' style="border:2px solid blue;">		
		</li>
		<li>Название файла картинки при выборе по первому варианту (п5) - неважно какое, при выборе по второму варианту (п6) - следует указанию для направлений</li>
		<li>В файл reg.cvs вернуть те же значения что и для дорог, но если будет выбран второй вариант, то добавить в колонку G: (width selected) ширина картинки элемента  в выделенном состоянии 
		</li>
	</ol>
</li>
</ol>

</div>
