var myMap;
var vBase;
var arr=new Array(); 
var m_coll;
var sel_arr=new Array(); 
var	acol="#2f5771";
var	rcol="#EFFDFF";
var	chcol="#EFFDFF";

 function gogo() {
	var txt="";
 	for (i=0;i<sel_arr.length;i++)
	{
		if(!(sel_arr[i]==undefined))
		if(sel_arr[i].length==2)
		{
					if(txt.length>0) txt+=","+sel_arr[i][0];
					else txt=sel_arr[i][0];
						
		}
	}
	if(txt.length>0) document.location.href = "index.php?r=bb/group&id="+txt;
}
function gofind() {

	document.forms['find-form'].submit();
}
 function checkit (id) {
	var i,ii;
	var txt,txti;
	if($('#ch'+id).css('background-position')=="-1px -2px")
	{
		$('#ch'+id).css('background-position', '-20px -2px');
		i=sel_arr.length;
		txt=$('#rg'+id).html();
		sel_arr[i]=new Array();
		sel_arr[i][0]=id;
		sel_arr[i][1]=txt;
		arr[id].options.set( 'strokeColor' ,'F72579'); 
//		arr[id].options.set("iconImageClipRect", [[40, 338],[56, 356]]);
		arr[id].options.set("iconImageClipRect", [[520, 600],[552, 632]]);
		arr[id].options.set("iconImageSize", [30,35]);
		if(i==0)
		{
			chcol="#F72579";
			$("#pickbutton a").css('color','#F72579');
			$("#pickbutton div.left-circ").addClass('left-circ-p');
			$("#pickbutton div.left-circ-2").addClass('left-circ-2-p');
			$("#pickbutton div.left-circ").removeClass('left-circ');
			$("#pickbutton div.left-circ-2").removeClass('left-circ-2');
			$("#pickbutton_ a").css('color','#F72579');
			$("#pickbutton_ div.left-circ").addClass('left-circ-p');
			$("#pickbutton_ div.left-circ-2").addClass('left-circ-2-p');
			$("#pickbutton_ div.left-circ").removeClass('left-circ');
			$("#pickbutton_ div.left-circ-2").removeClass('left-circ-2');
		}
	}
	else
	{
		$('#ch'+id).css('background-position', '-1px -2px');
		ii=sel_arr.length;
		if(ii==1)
		{
			chcol="#EBEDEC";
			$("#pickbutton a").css('color','#EBEDEC');
			$("#pickbutton div.left-circ-p").addClass('left-circ');
			$("#pickbutton div.left-circ-2-p").addClass('left-circ-2');
			$("#pickbutton div.left-circ-p").removeClass('left-circ-p');
			$("#pickbutton div.left-circ-2-p").removeClass('left-circ-2-p');
			$("#pickbutton_ a").css('color','#EBEDEC');
			$("#pickbutton_ div.left-circ-p").addClass('left-circ');
			$("#pickbutton_ div.left-circ-2-p").addClass('left-circ-2');
			$("#pickbutton_ div.left-circ-p").removeClass('left-circ-p');
			$("#pickbutton_ div.left-circ-2-p").removeClass('left-circ-2-p');
		}
		for (i=0;i<ii;i++)
		{
			if(!(sel_arr[i]==undefined))
			if(sel_arr[i].length==2)
			{
				if(sel_arr[i][0]==id)
				{
						arr[id].options.set('strokeColor', '365870');
//						arr[id].options.set("iconImageClipRect", [[20, 338],[36, 356]]);
						arr[id].options.set("iconImageClipRect", [[556, 604],[580, 628]]);
						arr[id].options.set("iconImageSize", [24, 28]);						
						sel_arr.splice(i,1);
						break;					
				}
			}
		}
		
	}
 
 }
  function omover (id) {
						if (arr[id]==undefined) return;
						arr[id].options.set( 'strokeColor' ,'F72579'); 
//						arr[id].options.set("iconImageClipRect", [[40, 338],[56, 356]]);
						arr[id].options.set("iconImageClipRect", [[520, 600],[552, 632]]);
						arr[id].options.set("iconImageSize", [30,35]);
						}
  function omout (id) {
						for (i=0;i<sel_arr.length;i++)
						{
							if(!(sel_arr[i]==undefined))
							if(sel_arr[i].length==2)
							{
								if(sel_arr[i][0]==id)
								{
									return;
								}
							}
						}
						if (arr[id]==undefined) return;
						arr[id].options.set('strokeColor', '365870');
//						arr[id].options.set("iconImageClipRect", [[20, 338],[36, 356]]);
						arr[id].options.set("iconImageClipRect", [[556, 604],[580, 628]]);
						arr[id].options.set("iconImageSize", [24, 28]);						
						}
function trigger () {
	var tt=myMap.getType()
	if(tt=='yandex#map')		myMap.setType('yandex#publicMapHybrid');
	else if(tt=='yandex#publicMapHybrid')		myMap.setType('yandex#publicMap');
	else						myMap.setType('yandex#map');
}
 function init () {
			var mm;
			var iid;
			var baloon;
            // Создание экземпляра карты и его привязка к контейнеру с
            // заданным id ("map")
            myMap = new ymaps.Map('map', {
                    // При инициализации карты, обязательно нужно указать
                    // ее центр и коэффициент масштабирования
					center: [31.5,60],
					zoom: 7,
//					type: 'yandex#map',
					type: 'yandex#publicMap',
//					type: 'yandex#publicMapHybrid',
//					behaviors: ['default', 'scrollZoom'],
//					behaviors: ['default'],
                },{
				    geoObjectDraggable: false,
                    geoObjectFillColor: '#ff0000'
				});
//			myMap.controls.add('zoomControl', {right: '20px', top: '220px'}); 
				myMap.behaviors.disable(['scrollZoom','dblClickZoom','leftMouseButtonMagnifier',
											'rightMouseButtonMagnifier','multiTouch','drag']);
				myMap.geoObjects.options.set("strokeColor", "365870");	
				myMap.geoObjects.options.set("strokeWidth", 7);
				myMap.geoObjects.options.set("strokeOpacity", 0.8);
				myMap.geoObjects.options.set("iconImageHref", "css/sprite.png");
				myMap.geoObjects.options.set("iconImageSize", [24, 24]);
				myMap.geoObjects.options.set("iconImageOffset", [-20, -10]);
//				myMap.geoObjects.options.set("iconImageClipRect", [[20, 338],[36, 356]]);
				myMap.geoObjects.options.set("iconImageClipRect", [[556, 604],[580, 628]]);
			jj=0;
		for(jj=0;jj<coors.length;jj++)
			{
				if (coors[jj]==undefined) continue;
				if(!(coors[jj].length>0)) continue;
				iid=coors[jj][0]
				baloon=$('#rg'+iid).html();
			
				arr[iid]= new ymaps.GeoObjectCollection(); 					
				for(i=1;i<coors[jj].length;i++)
				{
					if (coors[jj][i].length>1)
					{
						if(coors[jj][i][0]==0)
							arr[iid].add(new ymaps.Placemark(coors[jj][i][1], {balloonContent: baloon}));
						else
							{
									var ml=new Array();
								for(j=1;j<coors[jj][i].length;j++)
									ml[j-1]=coors[jj][i][j];
//									ml[j-1]=new Array(coors[iid][i][j]);
								arr[iid].add(new ymaps.Polyline(ml, {balloonContent: baloon}));
							}
						}
			
				}
				myMap.geoObjects.add(arr[iid]);	
	
			}

				


}

$(document).ready(function() {
//	window.addEvent('load', function() {new JCaption('img.caption');});
//			(function() {
			var _menuInit = function() { 
							new Ext.ux.Menu("ariext88", {"direction":"vertical","transitionDuration":0.2}); 
							Ext.get("ariext88").select(".ux-menu-sub").removeClass("ux-menu-init-hidden"); };
			if (!Ext.isIE || typeof(MooTools) == "undefined" || typeof(MooTools.More) == "undefined")
				Ext.onReady(_menuInit); else window.addEvent("domready", _menuInit); 
//				})();
	
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
			 $('.ux-menu-item470 a').animate({'color':acol},700,function(){$('.ux-menu-item470 a').animate({'color':chcol},700)});
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
				
			// mix effect first					
	$('.ux-menu-item472').hover(
		function(){
			 $('.ux-menu-item472 .left-circ').animate({'opacity':0},1000);
			 $('.ux-menu-item472 a').animate({'color':acol},700,function(){$('.ux-menu-item472 a').animate({'color':chcol},700)});
			},
		function(){
			 $('.ux-menu-item472 .left-circ').animate({'opacity':1},0);
		});
	ymaps.ready(init);
	$("."+class_name).accordiont({
		accordiont:false,
		speed: 500,
		closedSign: '+',
		openedSign: '-'
	});


/* */					

});

