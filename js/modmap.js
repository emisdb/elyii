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

  function omover (id,x,w) {
  		$("#"+id).css('background-position', '-'+x+'px -2px');
		if(w>0) $("#"+id).css('width', ''+w+'px');

						}
  function omout (id,w) {
  		$("#"+id).css('background-position', '0px 0px');
		if(w>0) $("#"+id).css('width', ''+w+'px');
						}
function trigger () {
	var tt=myMap.getType()
	if(tt=='yandex#map')		myMap.setType('yandex#publicMapHybrid');
	else if(tt=='yandex#publicMapHybrid')		myMap.setType('yandex#satellite');
	else if(tt=='yandex#satellite')		myMap.setType('yandex#publicMap');
	else						myMap.setType('yandex#map');
}
