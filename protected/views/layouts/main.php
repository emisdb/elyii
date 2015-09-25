<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
		

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes"/>
		<meta name="HandheldFriendly" content="true" />
		<meta name="apple-mobile-web-app-capable" content="YES" />
		 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Administrator" />

	<!-- blueprint CSS framework из main-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/template.css"  /> 
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/map.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	
	
	<script type="text/javascript">
		var class_name='';
		var coors=new Array();;
		baseUrl='<?php echo Yii::app()->request->baseUrl;?>';
		var act_id='<?php echo Yii::app()->controller->action->id;?>';
	</script>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/index.php" rel="canonical" />
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/widgetkit/widgetkit-1db94ed0.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mod_ariextmenu/mod_ariextmenu/js/css/menu.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mod_ariextmenu/mod_ariextmenu/js/css/menu.fix.css" type="text/css" />

  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/system/js/mootools-core.js" type="text/javascript"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/system/js/core.js" type="text/javascript"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/system/js/caption.js" type="text/javascript"></script>
     <!--[if IE]><link rel="stylesheet" type="text/css" href="/elvispiter/modules/mod_ariextmenu/mod_ariextmenu/js/css/menu.ie.min.css" /><![endif]-->
  <!--[if lt IE 8]><script type="text/javascript" src="/elvispiter/modules/mod_ariextmenu/mod_ariextmenu/js/fix.js"></script><![endif]-->


		<!--[if IE 7]>
		<link href="/elvispiter/templates/elvispiter/css/ie7only.css" rel="stylesheet" type="text/css" />
		<![endif]-->
		<?php 
			Yii::app()->clientScript->registerScriptFile(  Yii::app()->request->baseUrl."/js/jui/js/jquery-noconflict.js", CClientScript::POS_HEAD);
			Yii::app()->clientScript->registerScriptFile(  Yii::app()->request->baseUrl."/css/widgetkit/widgetkit-808f5433.js", CClientScript::POS_HEAD);
			Yii::app()->clientScript->registerScriptFile(  Yii::app()->request->baseUrl."/css/mod_ariextmenu/mod_ariextmenu/js/ext-core.js", CClientScript::POS_HEAD);
			Yii::app()->clientScript->registerScriptFile(  Yii::app()->request->baseUrl."/css/mod_ariextmenu/mod_ariextmenu/js/menu.min.js", CClientScript::POS_HEAD);
			Yii::app()->clientScript->registerScriptFile(  "https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js", CClientScript::POS_HEAD);
			Yii::app()->clientScript->registerScriptFile(  Yii::app()->request->baseUrl."/js/joo/rotate.js", CClientScript::POS_HEAD);
			Yii::app()->clientScript->registerScriptFile(  Yii::app()->request->baseUrl."/js/joo/color.js", CClientScript::POS_HEAD);
		?>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>


		
		
</head>

	<body>
		<div id="header">
			<div id="logo">
				 <a href="http://elvispiter.ru/index.php" class="logolink"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/logo.png" width="175" /> </a>
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/reklamnoe-2.png" width="190" id='reklamnoe' alt="Рекламное агенство"/> 
				 <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/arrow.png" width="190" id="top-arrow" />
				  <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/proizvodim_2.png" width="350" id="proizvodim" alt="Мы производим рекламу" />
				 <div id="mission-2"> <p> тел.:(812)327-7679, e-mail: kler@elvispiter.ru</p>
				</div>
				</div> <!--logo-->
					<p class="clear"/>

		</div>	
            <div id="wrapper">
			<div id="wrap-left">

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	
	<?php echo $content; ?>

<p class="clear" />	
</div><!-- page -->
						
				</div> <!--wrap-right-->
				<p class="clear" />
		
		</div> <!--wrapper-->
			<div id="footer">
				
			</div>
	</body>

	
</html>
