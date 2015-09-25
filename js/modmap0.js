var myMap;
var myMapi;

var vBase;
var arr=new Array(); 
var m_coll;
var coors=new Array();;
var sel_arr=new Array(); 

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
	if(txt.length>0)	document.location.href = "index.php?r=bb/group&id="+txt;
}

  function omover (id,x) {
  		$("#"+id).css('background-position', '-'+x+'px -2px');
						}
  function omout (id) {
  		$("#"+id).css('background-position', '0px 0px');
						}
function trigger () {
	var tt=myMap.getType()
	if(tt=='yandex#map')		myMap.setType('yandex#publicMapHybrid');
	else if(tt=='yandex#publicMapHybrid')		myMap.setType('yandex#satellite');
	else if(tt=='yandex#satellite')		myMap.setType('yandex#publicMap');
	else						myMap.setType('yandex#map');
}

 function init () {
			var mm;
			var iid;
			var baloon;
            // Создание экземпляра карты и его привязка к контейнеру с
            // заданным id ("map")
	            myMap = new ymaps.Map('maps', {
                    // При инициализации карты, обязательно нужно указать
                    // ее центр и коэффициент масштабирования
					center: [31.5,60],
					zoom: 7,
					type: 'yandex#map',
//					type: 'yandex#publicMap',
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
				myMap.geoObjects.options.set("iconImageSize", [24, 28]);
				myMap.geoObjects.options.set("iconImageOffset", [-10, -20]);
				myMap.geoObjects.options.set("iconImageClipRect", [[20, 338],[36, 356]]);
			jj=0;
/*	for(iid in coors)
			{
				if(!(coors[iid].length>0)) continue;
				baloon=$('#rg'+iid).html();
				arr[iid]= new ymaps.GeoObjectCollection(); 					
				for(i=0;i<coors[iid].length;i++)
				{
					if (coors[iid][i].length>1)
					{
					if(coors[iid][i][0]==0)
							arr[iid].add(new ymaps.Placemark(coors[iid][i][1], {balloonContent: baloon}));
					else
							{
									var ml=new Array();
								for(j=1;j<coors[iid][i].length;j++)
									ml[j-1]=coors[iid][i][j];
//									ml[j-1]=new Array(coors[iid][i][j]);
								arr[iid].add(new ymaps.Polyline(ml, {balloonContent: baloon}));
							}
						}
			
				}
				myMap.geoObjects.add(arr[iid]);	
				jj++;
	
			}
	*/      
      var myProjection = new ymaps.projection.Cartesian([
                    [-1, -1], // координаты левого нижнего угла
                    [1, 1]    // координаты правого верхнего угла
                ]),
                // Создадим собственный слой карты:
                BlackSeaLayer = function () {
                    return new ymaps.Layer(
                        // Зададим функцию, преобразующую номер тайла и уровень масштабировая
                        // в URL до тайла на нашем хостинге
                        function (tile, zoom) {
                            return "css/logo.png";
                        }
                    )
                };

            // Добавим конструктор слоя в хранилище слоёв под ключом my#blacksea
            ymaps.layer.storage.add('my#blacksea', BlackSeaLayer);
            // Создадим новый тип карты, состоящий только из нашего слоя тайлов,
            // и добавим его в хранилище типов карты под ключом my#blacksea
            ymaps.mapType.storage.add('my#blacksea', new ymaps.MapType(
                'Карта Черного моря',
                ['my#blacksea']
            ));

            // Создаем карту в заданной системе координат.
            myMapi = new ymaps.Map('map', {
                    center: [0, 0],
                    zoom: 2,
                    // Указываем ключ нашего типа карты
                    type: 'my#blacksea'
                }, {
                    maxZoom: 3, // Максимальный коэффициент масштабирования для заданной проекции.
                    minZoom: 0, // Максимальный коэффициент масштабирования
                    projection: myProjection
                });

            // Добавим миникарту на нашу карту.
            myMapi.controls.add(new ymaps.control.MiniMap({
                type: 'my#blacksea'
            }));
				


}


$(document).ready(function() {
	ymaps.ready(init);
});
