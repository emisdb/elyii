<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework из main-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/map.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	
	
	<script type="text/javascript">
		baseUrl='<?php echo Yii::app()->request->baseUrl;?>';
	</script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<script src="http://elvispiter.ru/templates/elvispiter/javascript/rotate.js" type="text/javascript"></script>
	<script type="text/javascript">
	
		jQuery(document).ready(function(){
		//	left-menu first
				jQuery(".ux-menu-item470").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.ux-menu-item470 > div').rotate({animateTo:1440,duration:8000})
						},
						mouseout : function() { 
							jQuery(".ux-menu-item470 > div").rotate(360);
						}
					 } 
				});
				
			// mix effect first					
					$('.ux-menu-item470').hover(
								function(){
								 $('.ux-menu-item470 .left-circ').animate({'opacity':0},1000);
								 $('.ux-menu-item470 a').animate({'color':'#2F5771'},700,function(){$('.ux-menu-item470 a').animate({'color':'#FFFFFF'},700)});
								},
								function(){
								 $('.ux-menu-item470 .left-circ').animate({'opacity':1},0);
					});
				
				
			// second	
				jQuery(".ux-menu-item471").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.ux-menu-item471 > div').rotate({animateTo:1440,duration:8000})
						},
						mouseout : function() { 
							jQuery(".ux-menu-item471 > div").rotate(360);
						}
					 } 
				});
				
				// mix effect second					
					$('.ux-menu-item471').hover(
								function(){
								 $('.ux-menu-item471 .left-circ').animate({'opacity':0},1000);
								 $('.ux-menu-item471 a').animate({'color':'#2F5771'},700,function(){$('.ux-menu-item471 a').animate({'color':'#FFFFFF'},700)});
								},
								function(){
								 $('.ux-menu-item471 .left-circ').animate({'opacity':1},0);
					});
					
					
			//third
					jQuery(".ux-menu-item472").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.ux-menu-item472 > div').rotate({animateTo:1440,duration:8000})
						},
						mouseout : function() { 
							jQuery(".ux-menu-item472 > div").rotate(360);
						}
					 } 
				});
				
				// mix effect third					
					$('.ux-menu-item472').hover(
								function(){
								 $('.ux-menu-item472 .left-circ').animate({'opacity':0},1000);
								 $('.ux-menu-item472 a').animate({'color':'#2F5771'},700,function(){$('.ux-menu-item472 a').animate({'color':'#FFFFFF'},700)});
								},
								function(){
								 $('.ux-menu-item472 .left-circ').animate({'opacity':1},0);
					});
			//four
						jQuery(".ux-menu-item473").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.ux-menu-item473 > div').rotate({animateTo:1440,duration:8000})
						},
						mouseout : function() { 
							jQuery(".ux-menu-item473 > div").rotate(360);
						}
					 } 
				});
				
				// mix effect four			
					$('.ux-menu-item473').hover(
								function(){
								 $('.ux-menu-item473 .left-circ').animate({'opacity':0},1000);
								 $('.ux-menu-item473 a').animate({'color':'#2F5771'},700,function(){$('.ux-menu-item473 a').animate({'color':'#FFFFFF'},700)});
								},
								function(){
								 $('.ux-menu-item473 .left-circ').animate({'opacity':1},0);
					});
			//five
						jQuery(".ux-menu-item474").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.ux-menu-item474 > div').rotate({animateTo:1440,duration:8000})
						},
						mouseout : function() { 
							jQuery(".ux-menu-item474 > div").rotate(360);
						}
					 } 
				});
				
				// mix effect five			
					$('.ux-menu-item474').hover(
								function(){
								 $('.ux-menu-item474 .left-circ').animate({'opacity':0},1000);
								 $('.ux-menu-item474 a').animate({'color':'#2F5771'},700,function(){$('.ux-menu-item474 a').animate({'color':'#FFFFFF'},700)});
								},
								function(){
								 $('.ux-menu-item474 .left-circ').animate({'opacity':1},0);
					});
			//six
						jQuery(".ux-menu-item475").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.ux-menu-item475 > div').rotate({animateTo:1440,duration:8000})
						},
						mouseout : function() { 
							jQuery(".ux-menu-item475 > div").rotate(360);
						}
					 } 
				});
				
				// mix effect six			
					$('.ux-menu-item475').hover(
								function(){
								 $('.ux-menu-item475 .left-circ').animate({'opacity':0},1000);
								 $('.ux-menu-item475 a').animate({'color':'#2F5771'},700,function(){$('.ux-menu-item475 a').animate({'color':'#FFFFFF'},700)});
								},
								function(){
								 $('.ux-menu-item475 .left-circ').animate({'opacity':1},0);
					});
			//seven
								jQuery(".ux-menu-item476").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.ux-menu-item476 > div').rotate({animateTo:1440,duration:8000})
						},
						mouseout : function() { 
							jQuery(".ux-menu-item476 > div").rotate(360);
						}
					 } 
				});
				
				// mix effect six			
					$('.ux-menu-item476').hover(
								function(){
								 $('.ux-menu-item476 .left-circ').animate({'opacity':0},1000);
								 $('.ux-menu-item476 a').animate({'color':'#2F5771'},700,function(){$('.ux-menu-item476 a').animate({'color':'#FFFFFF'},700)});
								},
								function(){
								 $('.ux-menu-item476 .left-circ').animate({'opacity':1},0);
					});
					
					//eight
								jQuery(".ux-menu-item477").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.ux-menu-item477 > div').rotate({animateTo:1440,duration:8000})
						},
						mouseout : function() { 
							jQuery(".ux-menu-item477 > div").rotate(360);
						}
					 } 
				});
				
				// mix effect eight			
					$('.ux-menu-item476').hover(
								function(){
								 $('.ux-menu-item477 .left-circ').animate({'opacity':0},1000);
								 $('.ux-menu-item477 a').animate({'color':'#2F5771'},700,function(){$('.ux-menu-item477 a').animate({'color':'#FFFFFF'},700)});
								},
								function(){
								 $('.ux-menu-item477 .left-circ').animate({'opacity':1},0);
					});
					
					//nine
								jQuery(".ux-menu-item478").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.ux-menu-item478 > div').rotate({animateTo:1440,duration:8000})
						},
						mouseout : function() { 
							jQuery(".ux-menu-item478 > div").rotate(360);
						}
					 } 
				});
				
				// mix effect nine			
					$('.ux-menu-item478').hover(
								function(){
								 $('.ux-menu-item478 .left-circ').animate({'opacity':0},1000);
								 $('.ux-menu-item478 a').animate({'color':'#2F5771'},700,function(){$('.ux-menu-item478 a').animate({'color':'#FFFFFF'},700)});
								},
								function(){
								 $('.ux-menu-item478 .left-circ').animate({'opacity':1},0);
					});
					
					
				
				//top-menu first
								jQuery(".item-465").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.item-465 > div').rotate({animateTo:-1440,duration:50000})
						},
						mouseout : function() { 
							jQuery(".item-465 > div").rotate({angle:0});
						}
					 } 
				});
				//second
								jQuery(".item-466").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.item-466 > div').rotate({animateTo:-1440,duration:50000})
						},
						mouseout : function() { 
							jQuery(".item-466 > div").rotate({angle:0});
						}
					 } 
				});
				//third
								jQuery(".item-467").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.item-467 > div').rotate({animateTo:-1440,duration:50000})
						},
						mouseout : function() { 
							jQuery(".item-467 > div").rotate({angle:0});
						}
					 } 
				});
				//fourth
							jQuery(".item-468").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.item-468 > div').rotate({animateTo:-1440,duration:50000})
						},
						mouseout : function() { 
							jQuery(".item-468 > div").rotate({angle:0});
						}
					 } 
				});
				//fith
							jQuery(".item-469").rotate({ 
				   bind: 
					 { 
						mouseover : function() { 
							jQuery('.item-469 > div').rotate({animateTo:-1440,duration:50000})
						},
						mouseout : function() { 
							jQuery(".item-469 > div").rotate({angle:0});
						}
					 } 
				});
				
				
			});
		
	</script>
</head>

<body>
  <div id="wrapper">
	<div id="header">
	
		
		
		<a href="http://elvispiter.ru" id="logo-pic"> <img src="http://elvispiter.ru/templates/elvispiter/images/logo.png" width="175" alt="Логотип" /> </a>
		<img src="http://elvispiter.ru/templates/elvispiter/images/reklamnoe-2.png" width="190" alt="Рекламное агенство" id="reklamnoe" />
		<img src="http://elvispiter.ru/templates/elvispiter/images/arrow.png" width="190" alt="arrow" id="top-arrow" />
		<img src="http://elvispiter.ru/templates/elvispiter/images/proizvodim_2.png" width="350" id="proizvodim" alt="Мы производим рекламу" />
		<div id="phones"><p> тел.:(812)327-7679 e-mail: adv@elvispiter.ru</p></div>
		<div id="top-menu">
		<ul class="nav menu">
<li class="item-465"><a href="http://elvispiter.ru/index.php/kontakti" >Информация и контакты</a><div class="top-circ"></div></li><li class="item-466"><a href="http://elvispiter.ru/index.php/proizv" >Производство и оборудование</a><div class="top-circ"></div></li><li class="item-467"><a href="http://elvispiter.ru/index.php/price" >Прайсы Заявки на обсчет</a><div class="top-circ"></div></li><li class="item-468"><a href="http://elvispiter.ru/index.php/vacansii" >Вакансии</a><div class="top-circ"></div></li><li class="item-469"><a href="http://elvispiter.ru/index.php/poisk" >Быстрый поиск по сайту</a><div class="top-circ"></div></li></ul>
		</div>
		</div> <!--header-->
		<p class="clear" />

		<div id="left-menu">
	<ul id="ariext88" class="ux-menu ux-menu-vertical">
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item470 ux-menu-item-parent-pos0">
				<a href="#" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					Щиты 3*6									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item-parent ux-menu-item471 ux-menu-item-parent-pos1">
				<a href="http://elvispiter.ru/index.php/3d-design" class=" ux-menu-link-level-0 ux-menu-link-parent" title="">
					3D дизайн, проектирование										<span class="ux-menu-arrow"></span>
									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
			</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item-parent ux-menu-item472 ux-menu-item-parent-pos2">
				<a href="http://elvispiter.ru/index.php/narujnaya-reklama" class=" ux-menu-link-level-0 ux-menu-link-parent" title="">
					Наружная реклама										<span class="ux-menu-arrow"></span>
									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
			</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item-parent ux-menu-item473 ux-menu-item-parent-pos3">
				<a href="http://elvispiter.ru/index.php/pos" class=" ux-menu-link-level-0 ux-menu-link-parent" title="">
					POS-материалы										<span class="ux-menu-arrow"></span>
									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
			</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item474 ux-menu-item-parent-pos4">
				<a href="http://elvispiter.ru/index.php/torg-oborudovanie" class=" ux-menu-link-level-0" title="">
					Торговое оборудование									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item-parent ux-menu-item475 ux-menu-item-parent-pos5">
				<a href="http://elvispiter.ru/index.php/btl-promo" class=" ux-menu-link-level-0 ux-menu-link-parent" title="">
					BTL (промо)										<span class="ux-menu-arrow"></span>
									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
			</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item476 ux-menu-item-parent-pos6">
				<a href="http://elvispiter.ru/index.php/d-free" class=" ux-menu-link-level-0" title="">
					Duty Free									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item-parent ux-menu-item477 ux-menu-item-parent-pos7">
				<a href="http://elvispiter.ru/index.php/pechati" class=" ux-menu-link-level-0 ux-menu-link-parent" title="">
					Печать										<span class="ux-menu-arrow"></span>
									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
			</li>
					<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item478 ux-menu-item-parent-pos8">
				<a href="http://elvispiter.ru/index.php/suveniri" class=" ux-menu-link-level-0 ux-menu-link-last" title="">
					Сувениры									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
			</ul>
		
	</div> <!--left-menu-->
				
		
	
	
<div class="container" id="page">

<!-- header -->

	<!--<div id="mainmenu">
		<?php /*$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Домой', 'url'=>array('/site/index')),
				array('label'=>'Карта', 'url'=>array('/regions')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Администрирование', 'url'=>array('/site/admin'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); */?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	
	<?php echo $content; ?>

<p class="clear" />	
</div><!-- page -->
<p class="clear" />	
</div> <!--wrapper-->
<p class="clear" />	
<div id="footer">

</div>
</body>
</html>
