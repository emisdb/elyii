<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
		

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes"/>
		<meta name="HandheldFriendly" content="true" />
		<meta name="apple-mobile-web-app-capable" content="YES" />
		<link href="css/template.css" rel="stylesheet" type="text/css" />  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Administrator" />

	<!-- blueprint CSS framework из main-->
	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" /-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/map.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!-- link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" /-->
	<!-- link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" / -->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	
	
	<script type="text/javascript">
		var baseUrl='<?php echo Yii::app()->request->baseUrl;?>';
		var act_id='<?php echo Yii::app()->controller->action->id;?>';
	</script>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/index.php" rel="canonical" />
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/widgetkit/widgetkit-1db94ed0.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mod_ariextmenu/mod_ariextmenu/js/css/menu.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mod_ariextmenu/mod_ariextmenu/js/css/menu.fix.css" type="text/css" />
  <style type="text/css">
UL#ariext88 LI A{font-size:12px;font-weight:normal;text-transform:none;text-align:left;}UL#ariext88 LI UL.ux-menu-sub A{font-size:12px;font-weight:normal;text-transform:none;text-align:left;}
  </style>
 		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
 <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/system/js/mootools-core.js" type="text/javascript"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/system/js/core.js" type="text/javascript"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/system/js/caption.js" type="text/javascript"></script>
  <!--script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jui/js/jquery.min.js" type="text/javascript"></script-->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jui/js/jquery-noconflict.js" type="text/javascript"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/widgetkit/widgetkit-808f5433.js" type="text/javascript"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/mod_ariextmenu/mod_ariextmenu/js/ext-core.js" type="text/javascript"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/mod_ariextmenu/mod_ariextmenu/js/menu.min.js" type="text/javascript"></script>
  <script type="text/javascript">
window.addEvent('load', function() {
				new JCaption('img.caption');
			});
;(function() { var _menuInit = function() { new Ext.ux.Menu("ariext88", {"direction":"horizontal","transitionDuration":0.2}); Ext.get("ariext88").select(".ux-menu-sub").removeClass("ux-menu-init-hidden"); }; if (!Ext.isIE || typeof(MooTools) == "undefined" || typeof(MooTools.More) == "undefined") Ext.onReady(_menuInit); else window.addEvent("domready", _menuInit); })();
  </script>
     <!--[if IE]><link rel="stylesheet" type="text/css" href="/elvispiter/modules/mod_ariextmenu/mod_ariextmenu/js/css/menu.ie.min.css" /><![endif]-->
  <!--[if lt IE 8]><script type="text/javascript" src="/elvispiter/modules/mod_ariextmenu/mod_ariextmenu/js/fix.js"></script><![endif]-->


		<!--[if IE 7]>
		<link href="/elvispiter/templates/elvispiter/css/ie7only.css" rel="stylesheet" type="text/css" />
		<![endif]-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/joo/rotate.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/joo/color.js"></script>

		<script type="text/javascript">
		jQuery(document).ready(function(){
		//	left-menu first
			rcol="#2f5771";
			acol="#EBEDEC";
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
								 $('.ux-menu-item470 a').animate({'color':acol},700,function(){$('.ux-menu-item470 a').animate({'color':rcol},700)});
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
								 $('.ux-menu-item471 a').animate({'color':acol},700,function(){$('.ux-menu-item471 a').animate({'color':rcol},700)});
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
								 $('.ux-menu-item472 a').animate({'color':acol},700,function(){$('.ux-menu-item472 a').animate({'color':rcol},700)});
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
								 $('.ux-menu-item473 a').animate({'color':acol},700,function(){$('.ux-menu-item473 a').animate({'color':rcol},700)});
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
								$('.ux-menu-item474 a').animate({'color':acol},700,function(){$('.ux-menu-item474 a').animate({'color':rcol},700)});
									},
								function(){
								 $('.ux-menu-item474 .left-circ').animate({'opacity':1},0);
					});
			//six
				
			});


		</script>		
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
				 <div id="mission-2"> <p> тел.:(812)327-7679, e-mail: kler@elvispiter.ru</p></div>
				</div> <!--logo-->
					<p class="clear"/>
						<div id="left-menu">
						
									<div class="moduletable">
					
<div id="ariext88_container" class="ux-menu-container ux-menu-clearfix">

	<ul id="ariext88" class="ux-menu ux-menu-horizontal">
		<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item470 ux-menu-item-parent ux-menu-item-parent-pos0">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=regions" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					Щиты 3*6										</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
			
	<ul class="ux-menu-sub ux-menu-init-hidden">
					<li class=" ux-menu-item-level-1 ux-menu-item514">
				<a href="http://elvispiter.ru" class=" ux-menu-link-level-1" title="">
					На главную									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class=" ux-menu-item-level-1 ux-menu-item515">
				<a href="http://elvispiter.ru/index.php/3d-design" class=" ux-menu-link-level-1" title="">
					3D дизайн, проектирование									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class=" ux-menu-item-level-1 ux-menu-item485">
				<a href="http://elvispiter.ru/index.php/narujnaya-reklama" class=" ux-menu-link-level-1" title="">
					Наружная реклама									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class=" ux-menu-item-level-1 ux-menu-item486">
				<a href="http://elvispiter.ru/index.php/pos" class=" ux-menu-link-level-1" title="">
					POS-материалы									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class=" ux-menu-item-level-1 ux-menu-item487">
				<a href="http://elvispiter.ru/index.php/torg-oborudovanie" class=" ux-menu-link-level-1" title="">
					Торговое оборудование									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class=" ux-menu-item-level-1 ux-menu-item488">
				<a href="http://elvispiter.ru/index.php/btl-promo" class=" ux-menu-link-level-1" title="">
					BTL (промо)									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class=" ux-menu-item-level-1 ux-menu-item489">
				<a href="http://elvispiter.ru/index.php/d-free" class=" ux-menu-link-level-1" title="">
					Duty Free									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class=" ux-menu-item-level-1 ux-menu-item492">
				<a href="http://elvispiter.ru/index.php/pechati" class=" ux-menu-link-level-1" title="">
					Печать								</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
					<li class=" ux-menu-item-level-1 ux-menu-item493">
				<a href="http://elvispiter.ru/index.php/suveniri" class=" ux-menu-link-level-1" title="">
					Сувениры									</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
			</ul>
			</li>
		<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item471 ux-menu-item-parent-pos1" style="width:480px">
					<div id="sel_screen"><?php echo $this->pageTit; ?></div>			
				<div class="left-circ-2" style="left:460px"></div>
				<div class="left-circ" style="left:460px"></div>
			
			</li>	
			<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item472 ux-menu-item-parent ux-menu-item-parent-pos1" style="margin-left:40px">
				<a href="#map" onclick="showmap(false)" class=" ux-menu-link-level-0 ux-menu-link-first" title="">
					Показать выделенные								</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
			
	<ul class="ux-menu-sub ux-menu-init-hidden">
					<li class=" ux-menu-item-level-1 ux-menu-item514">
				<a href="#map" onclick="showmap(true)" class=" ux-menu-link-level-1" title="">
					Показать все								</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
						</li>
			
			</ul>	
		</li>	
		<li class="ux-menu-item-main ux-menu-item-level-0 ux-menu-item473 ux-menu-item-parent-pos3" style="margin-left:10px">
				<a href="javascript:void(0)" id="pickbutton" onclick="<?php echo (Yii::app()->controller->action->id=='result' ? "gores()" : "gogo()") ?>" class=" ux-menu-link-level-0 ux-menu-link-parent" title="">
				<?php echo (Yii::app()->controller->action->id=='result' ? "Отправить заявку" : "Отправить в корзину") ?>			

					<span class="ux-menu-arrow"></span>
				</a>
				<div class="left-circ-2"></div>
				<div class="left-circ"></div>
			
			</li>
</ul>
</div>		</div>
	
						</div>
								<p class="clear" />
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
