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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/adm.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	
	
	<script type="text/javascript">
		baseUrl='<?php echo Yii::app()->request->baseUrl;?>';
		var act_id='<?php echo Yii::app()->controller->action->id;?>';
	</script>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/index.php" rel="canonical" />


		<?php 


		?>

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>


		
		
</head>

	<body>
		<div id="wrapper">
			<div id="wrap-left">
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
				<p class="clear"/>
		
		</div> <!--wrapper-->
			<div id="footer">
				
			</div>
	</body>

	
</html>
