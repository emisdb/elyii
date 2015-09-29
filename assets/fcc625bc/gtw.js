var colreg="#C2C2C2";
var colover="#D3C99C";
var colsel="#abeef5";
var coltxt="#675C7C";
var collink="#2f5771";
var myMap;
var coors;
var regshow=true;
var mutex,tmpII;
var arr=new Array(); 
var myMappi;
var sel_arr=new Array(); 
var	acol="#2f5771";
var	rcol="#EFFDFF";
var	chcol="#EFFDFF";

 function goshow() {
	alert(coors.length);
 }
 function gogo() {
	var txt="";
 	for(ix in arr)
	{
		if(arr[ix][0]>0)
		{
			txt+=ix.substring(2)+"_"+arr[ix][0]+","
		}

	}
	document.location.href = "index.php?r=bb/result&id="+txt;
}
 function gores() {
	var txt=""; var txti="";
 	for(ix in arr)
	{
		if(arr[ix][0]>0)
		{
			txt+=ix.substring(2)+"_"+arr[ix][0]+","
		}

	}
	txt="http://bb.elvispiter.ru/index.php?r=bb/result&id="+txt;
	txti="<a href='"+txt+"'>"+txt+"</a>";
	document.forms['contact-form']['ContactForm[linky]'].value=txti;
	document.forms['contact-form'].submit();
}
 function showmap () {
		var isch=-1;
		var txti,txtj;
		regshow = !regshow;
		$('#gtw tr').each(function(po,ele){
			if(ele.id.length>0)
			{
				if(regshow)
				{	
	 				$(ele).show();
					txti=ele.id.substring(0,ele.id.indexOf("_"));
	/*					if(arr[txti]==undefined) continue;*/
					var object=	arr[txti][2];
					object.options.set("visible", true);
				}
				else
				{
					txtj=ele.id.substring(ele.id.indexOf("_")+1);
					var i=Math.pow(2, parseInt(txtj));
					if(i==1)
					{
						if(isch==0)
						{
							var object=	arr[txti][2];
							object.options.set("visible", false);
						}
						isch=0;				
					}
					txti=ele.id.substring(0,ele.id.indexOf("_"));
/* 					if(arr[txti]==undefined) continue; */
					if(arr[txti][0]&i)	isch=isch+i;
					else	$(ele).hide();
				}
			}
		});
		if((!regshow)&&(isch==0))
		{
			var object=	arr[txti][2];
			object.options.set("visible", false);
		}
		if(regshow) 		$("#pickbutton_ a").html((act_id=='result') ? 'Показать выбранные' : 'ПОКАЗАТЬ ВЫБРАННЫЕ');
		else				$("#pickbutton_ a").html((act_id=='result') ? 'Показать все' : 'ПОКАЗАТЬ ВСЕ');
 }
 function gofind() {

	document.forms['find-form'].submit();
}
 function showcart (show) {
		var txt,txti,txtj;
		txt=""
		if(!(show)) 
		{
			$("#cart_screen").css('visibility','hidden');
			return false;
		}
		$('#gtw tr').each(function(po,ele){
		if(ele.id.length>0)
		{
			txtj=ele.id.substring(ele.id.indexOf("_")+1);
			var i=Math.pow(2, parseInt(txtj));
	
			txti=ele.id.substring(0,ele.id.indexOf("_"));
			if(arr[txti]==undefined) return false;
			if(arr[txti][0]&i)
			{			
				$("#"+ele.id+" td").each(function(pos,elem){
				if(pos==1)	txti=elem.innerHTML;
				if(pos==2)	txtj=" - "+elem.innerHTML;
				if(pos==3)	txti+=". "+elem.innerHTML;
				});
				txt+="<li>"+txti+txtj+"</li>";
			}
		}});
		if (txt.length>0) txt="<ol>"+txt+"</ol>";
 		$("#cart_screen").html(txt);
		$("#cart_screen").css('visibility','visible');
		return false;

  }
  function pickcolor ()   { 
	for(ix in arr)
	{
		if(arr[ix][0]>0) {
			chcol="#F72579";
			$("#pickbutton a").css('color','#F72579');
			$("#pickbutton a").css('border-color','#F72579');
			$("#pickbutton div.left-circ").addClass('left-circ-p');
			$("#pickbutton div.left-circ-2").addClass('left-circ-2-p');
			$("#pickbutton div.left-circ").removeClass('left-circ');
			$("#pickbutton div.left-circ-2").removeClass('left-circ-2');
			$("#pickbutton_ a").css('color','#F72579');
			$("#pickbutton_ div.left-circ").addClass('left-circ-p');
			$("#pickbutton_ div.left-circ-2").addClass('left-circ-2-p');
			$("#pickbutton_ div.left-circ").removeClass('left-circ');
			$("#pickbutton_ div.left-circ-2").removeClass('left-circ-2');
			return;
			}
	}
			chcol="#EBEDEC";
			$("#pickbutton a").css('color','#EBEDEC');
			$("#pickbutton a").css('border-color','#EBEDEC');
			$("#pickbutton div.left-circ-p").addClass('left-circ');
			$("#pickbutton div.left-circ-2-p").addClass('left-circ-2');
			$("#pickbutton div.left-circ-p").removeClass('left-circ-p');
			$("#pickbutton div.left-circ-2-p").removeClass('left-circ-2-p');
			$("#pickbutton_ a").css('color','#EBEDEC');
			$("#pickbutton_ div.left-circ-p").addClass('left-circ');
			$("#pickbutton_ div.left-circ-2-p").addClass('left-circ-2');
			$("#pickbutton_ div.left-circ-p").removeClass('left-circ-p');
			$("#pickbutton_ div.left-circ-2-p").removeClass('left-circ-2-p');
 /*	 */
 }
  
  function checkit (id) {
	var i;
	var txt,txti;
	txt=id.substring(id.indexOf("_")+1);
	i=Math.pow(2, parseInt(txt));
	
	txti="tr"+id.substring(0,id.indexOf("_"));
	if(arr[txti]==undefined) return;
	if(!(arr[txti][0]&i)) 
	{
//		$('#ch'+id).css('background-position', '-20px -2px');
		if(arr[txti][0]==0)
		{
			var object=	arr[txti][2];
//			object.options.set("iconImageClipRect", [[532, 118],[550, 134]]);
			object.options.set("iconImageClipRect", [[519, 86],[548, 114]]);
			object.options.set("iconImageSize", [36,31]);
		}
		if (act_id=='result') {
			$("#tr"+id).css("color",coltxt);
			$("#tr"+id+" a").css("color",collink);
		}
		arr[txti][0]+=i;
	}
	else
	{
//		$('#ch'+id).css('background-position', '-1px -2px');
		arr[txti][0]-=i;
		if(arr[txti][0]==0) 
		{
			var object=	arr[txti][2];
//			object.options.set("iconImageClipRect", [[124, 364],[140, 378]]);
			object.options.set("iconImageClipRect", [[488, 86],[515, 114]]);
			object.options.set("iconImageSize", [24,21]);
			
		}
		if (act_id=='result') {
			$("#tr"+id).css("color","#fff");
			$("#tr"+id+" a").css("color","#fff");
		}
	}
	$('#ch'+id).toggleClass('chkd');
	$('#ch'+id).toggleClass('chk');
	mutex=2;
	pickcolor();
  }
  function omover (id) {
//					$(id).toggleClass("gtwtrhover");
					var ix=id.id
					if (ix.indexOf("_")>0)
						ix=ix.substring(0,ix.indexOf("_"));
					if(arr[ix] == undefined) return;
					if(arr[ix][0]>0) return;
					var geoO=arr[ix][2];
						
//					geoO.options.set("iconImageClipRect", [[562, 118],[582, 134]]);
					geoO.options.set("iconImageClipRect", [[552, 86],[579, 114]]);
					geoO.options.set("iconImageSize", [32,28]);
	
					
					}
  function omout (id) { 
//					$(id).toggleClass("gtwtrhover");
					var ix=id.id
					if (ix.indexOf("_")>0)
						ix=ix.substring(0,ix.indexOf("_"));
					if(arr[ix] == undefined) return;
					if(arr[ix][0]>0) return;
					var geoO=arr[ix][2];
					
//					geoO.options.set("iconImageClipRect", [[124, 364],[140, 378]]);
					geoO.options.set("iconImageClipRect", [[488, 86],[515, 114]]);
					geoO.options.set("iconImageSize", [24,21]);
					
					}
function trigger () {
	var tt=myMap.getType()
	if(tt=='yandex#map')		myMap.setType('yandex#publicMapHybrid');
	else if(tt=='yandex#publicMapHybrid')		myMap.setType('yandex#publicMap');
	else						myMap.setType('yandex#map');
}
function dowin(id){
	var ix,txti,txtname,txtside,txtdir;
	if (id.indexOf(".")>0)
		ix=id.substring(0,id.indexOf("."));
//	if(arr[ix] == undefined) return false;
	var sides=parseInt(id.substring(id.indexOf(".")+1));
	$("#"+ix+"_"+sides+" td").each(function(pos,elem){
		if(pos==1)	txti=elem.innerHTML;
		else if(pos==2)	txtname=elem.innerHTML;
		else if(pos==3)	txtside=elem.innerHTML;
		else if(pos==4)	txtdir=elem.innerHTML;
	});
/*	
	var geoO=arr[ix][2];
	var coords = geoO.geometry.getCoordinates();
	var bcont = geoO.properties.get('balloonContent');
*/	
	var p_start=txtname.indexOf(">");
	var p_end=txtname.lastIndexOf("<");
	if((!(p_start<0))&&(p_end>p_start)) 
		txtname = txtname.substring(p_start+1,p_end);

		var picco=ix.replace( /^\D+/g, '');	
		var txtt="<a href='index.php?r=bb/views&id="+picco+"&side="+(sides+1)+"'>"+txtname+"</a>"
		$("#mydialog_h2").html(txtt);
		jQuery.ajax({'type':'POST',
					'beforeSend':function( request ){},
					'success':function(data){$("#mydialog_pics").html(data);},
					'data':{'val_id':id},
					'url':'index.php?r=bb/ajaxReq',
					'cache':false});
 
/*				pmark=new ymaps.Placemark(coords,
				{balloonContent: txtt}, {
				iconImageHref: 'css/sprite.png',
				iconImageOffset:[-20, -32],
				iconImageSize: [36,31],
				iconImageClipRect:[[532, 118],[550, 134]],
//                     iconImageClipRect:[[562, 118],[582, 134]],
				iconContent: picco,
				balloonContentSize: [100, 100],
				balloonShadow: true
				});
			myMappi.geoObjects.each(function (geoObject) {
				myMappi.geoObjects.remove(geoObject);
			});
			myMappi.geoObjects.add(pmark);	
			myMappi. setCenter(coords, 9)	
*/

					$("#mydialog").dialog("option","title","Щит №"+txti+" сторона "+txtside+" ("+txtdir+")"); 
					$("#mydialog").dialog("option","width","650px"); 
					$("#mydialog").dialog('option', 'position', [100, 100]);
					$("#mydialog").dialog("option", "show", "slow" );
					$("#mydialog").dialog("open");
//					$("#mydialog").effect("bounce","slow");
					event.returnValue=false;
					return false;
}
function picout(pic){
		$("#preview").remove();	
}
function pichover(pic,e){		
	var	xOffset = 10;
	var	yOffset = 150;
//	var e = window.event;
	$("body").append("<p id='preview'><img src='"+ pic.src +"' alt='Image preview' />");								 
	$("#preview")
			.css("top",(e.pageY - yOffset) + "px")
			.css("left",(e.pageX + xOffset) + "px")
			.css("z-index","1100")
			.fadeIn("fast");						

}
function picmove(pic,e){		
	var	xOffset = 10;
	var	yOffset = 150;
			$("#preview")
			.css("top",(e.pageY - yOffset) + "px")
			.css("left",(e.pageX + xOffset) + "px");
}
function dobaloon(txt,sides,id,pos){
		var res="<h2>"+txt+"</h2><br><ul>";
		if(pos>0)
		{
			var j=1;	var i=0;	var k=0;
			while(j<=pos)
			{
				if(j&pos)
					res+="<li><a href='javascript:void(0)' onclick='dowin(\""+id+"."+i+"\"); return false;'> сторона "+sides[k++]+"</a></li>";
				j=Math.pow(2, ++i);
			}
		}
		else
		{
			for(var j=0;j<sides.length;j++)
					res+="<li><a href='javascript:void(0)' onclick='dowin(\""+id+"."+j+"\"); return false;'> сторона "+sides[j]+"</a></li>";
		}
		res+="</ul>";
		return res;
}
 function init () {
			var bbounds=[90,90];
			var ubounds=[0,0];

 
			// Создание экземпляра карты и его привязка к контейнеру с
            // заданным id ("map")
            myMap = new ymaps.Map('map', {
                    // При инициализации карты, обязательно нужно указать
                    // ее центр и коэффициент масштабирования
					center: [31.3,60.1],
					zoom: 9,
//					type: 'yandex#map',
					type: 'yandex#publicMap',
					behaviors: ['default', 'scrollZoom'],
                },{
				    geoObjectDraggable: false,
                    geoObjectFillColor: '#ff0000'
				});
				myMap.controls.add('zoomControl', {right: '5px', top: '50px'}); 
			for(i=0;i<coors.length;i++)
			{
			ix="tr"+coors[i][0];
			if (coors[i][2][0]<bbounds[0]) bbounds[0]=coors[i][2][0];
			if (coors[i][2][1]<bbounds[1]) bbounds[1]=coors[i][2][1];
			if (coors[i][2][0]>ubounds[0]) ubounds[0]=coors[i][2][0];
			if (coors[i][2][1]>ubounds[1]) ubounds[1]=coors[i][2][1];
			arr[ix]=new Array();
			arr[ix][0]=coors[i][3];
			arr[ix][1]=coors[i][3];
			baltxt=dobaloon(coors[i][1],coors[i][4],ix,coors[i][3]);
//			baltxt=coors[i][1];
			arr[ix][2]=new ymaps.Placemark(coors[i][2],
			{balloonContent: baltxt}, {
                    iconImageHref: 'css/sprite.png',
 				iconImageOffset:[-15, -20],
                    // Размеры изображения иконки
					iconImageSize: [24, 21],
 //                   iconImageClipRect:[[124, 364],[140, 378]],
                    iconImageClipRect:[[488, 86],[515, 114]],
 					iconContent: ix,
					balloonContentSize: [100, 100],
                    balloonShadow: true
                });
				if(coors[i][3]>0)
				{	
//					arr[ix][2].options.set("iconImageClipRect", [[532, 118],[550, 134]]);
					arr[ix][2].options.set("iconImageClipRect", [[519, 86],[548, 114]]);
					arr[ix][2].options.set("iconImageSize", [36,31]);
        				arr[ix][2].options.set("iconImageOffset", [-21, -30]);
				}
				arr[ix][2].events.add('mouseenter', menter);
				arr[ix][2].events.add('mouseleave', mleave);
				arr[ix][2].events.add('click', mleave);	

		myMap.geoObjects.add(arr[ix][2]);	
		
		}
		if(i>1)		myMap.setBounds([bbounds,ubounds]);
		else 	myMap. setCenter(coors[0][2], 12);
		if (act_id=='result') pickcolor();
		//настройка карты окна
/*	
					myMappi = new ymaps.Map('mydialog_map', {
					center: [31.3,60.1],
					zoom: 9,
//					type: 'yandex#map',
					type: 'yandex#publicMap',
					behaviors: ['default', 'scrollZoom'],
                },{
				    geoObjectDraggable: false,
                    geoObjectFillColor: '#ff0000'
				});
*/
				mutex=0;


}
function menter(e){
			if (mutex==1) return;
				mutex=1;	
				var object = e.get('target');
				var xi=object.options.get('iconContent');
				if(arr[xi][0]>0) return;
				object.options.set("iconImageClipRect", [[552, 86],[579, 114]]);
				object.options.set("iconImageSize", [32,28]);
				object.options.set("iconImageOffset", [-19, -27]);
				colrg=$("#"+xi+"_0").css('background-color');
				$("#"+xi+"_0").css('background-color', colsel);
				$("#scrolltab").animate({
					scrollTop: $("#"+xi+"_0").position().top}, 1000);
				setTimeout(function() {timeleave(object,colrg)},2000);
				e.stopPropagation();	
//				$("#cart_screen").html($("#cart_screen").html()+"enter; ");
}
function timeleave(object,colrg)
{
				mutex=2;
				var xi=object.options.get('iconContent');
				if(arr[xi][0]>0) return;
				object.options.set("iconImageClipRect", [[488, 86],[515, 114]]);
				object.options.set("iconImageSize", [24,21]);
				object.options.set("iconImageOffset", [-15, -20]);
				$("#"+xi+"_0").css('background-color', colrg);
				$("#"+xi+"_0").hover(
					function(){$(this).css("background-color", colover);},
					function(){$(this).css("background-color", colrg);}
					);

}

function mleave(e){
				return;
				if (mutex==2) return;
				mutex=2;	
				var object = e.get('target');
				timeleave(object);
				e.stopPropagation();	
}

$(document).ready(function() {
    ymaps.ready(init);
		window.addEvent('load', function() {
				new JCaption('img.caption');
			});
			(function() {
			var _menuInit = function() { 
							new Ext.ux.Menu("ariext88", {"direction":"horizontal","transitionDuration":0.2}); 
							Ext.get("ariext88").select(".ux-menu-sub").removeClass("ux-menu-init-hidden"); };
			if (!Ext.isIE || typeof(MooTools) == "undefined" || typeof(MooTools.More) == "undefined")
				Ext.onReady(_menuInit); else window.addEvent("domready", _menuInit); })();
	
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
			 $('.ux-menu-item472 a').animate({'color':acol},700,function(){$('.ux-menu-item472 a').animate({'color':rcol},700)});
			},
		function(){
			 $('.ux-menu-item472 .left-circ').animate({'opacity':1},0);
		});

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
				
			// mix effect first					
	$('.ux-menu-item473').hover(
		function(){
			 $('.ux-menu-item473 .left-circ').animate({'opacity':0},1000);
			 $('.ux-menu-item473 a').animate({'color':acol},700,function(){$('.ux-menu-item473 a').animate({'color':chcol},700)});
			},
		function(){
			 $('.ux-menu-item473 .left-circ').animate({'opacity':1},0);
		});

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
				
			// mix effect first					
	$('.ux-menu-item474').hover(
		function(){
			 $('.ux-menu-item474 .left-circ').animate({'opacity':0},1000);
			 $('.ux-menu-item474 a').animate({'color':acol},700,function(){$('.ux-menu-item474 a').animate({'color':chcol},700)});
			},
		function(){
			 $('.ux-menu-item474 .left-circ').animate({'opacity':1},0);
		});
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
				
			// mix effect first					
	$('.ux-menu-item475').hover(
		function(){
			 $('.ux-menu-item475 .left-circ').animate({'opacity':0},1000);
			 $('.ux-menu-item475 a').animate({'color':acol},700,function(){$('.ux-menu-item475 a').animate({'color':chcol},700)});
			},
		function(){
			 $('.ux-menu-item475 .left-circ').animate({'opacity':1},0);
		});

});
