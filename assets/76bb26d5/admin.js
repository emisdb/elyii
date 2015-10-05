
var class_name;
var set_name;
function dopicwin(id){
		jQuery.ajax({'type':'POST','beforeSend':function( request )
                     {
                      },'success':function(data)
                  {
					$("#mydialog_pics").html(data);
					},'data':{'val_id':id},'url':'index.php?r=bb/ajaxReq','cache':false});
					$("#mydialog").dialog("option","title","Щит №"+id); 
					$("#mydialog").dialog("option","width","650px"); 
					$("#mydialog").dialog('option', 'position', [100, 100]);
					$("#mydialog").dialog("option", "show", "slow" );
					$("#mydialog").dialog("open");
					$("#mydialog").effect("bounce","slow");
					event.returnValue=false;
					return false;
}
function dowin(parid,curid,cl_t)
{
	pid=$("#"+parid).val();
	if(!(pid.length>0))
	{
		alert("Необходимо выбрать район");
		return;
	}	
	cid=$("#"+curid).html();
	if(cid==null)	cid=0;
	else	if(cid.length>0)	cid=cid.replace( /^\D+/g, '');
	
	jQuery.ajax({'type':'POST',
				'beforeSend':function( request ){},
				 'success':function(data)
                  {
					$("#nextdisplay").html(data);
					},'data':{'p_id':pid,'c_id':cid,},
					'url':'index.php?r='+cl_t+'/ajaxReqord',
					'cache':false});
				$("#nextdialog").dialog("open");
}
function sel_row(id)
{
	var ast=$("#ast_obj").text();
	if(ast.indexOf("bb")>0)
		$("#Bb_next").val(id);
	else
		$("#Plan_next").val(id);
	$("#nextdialog").dialog("close");

}
function select_id(me,id,name,dialog)
{
	var	id_val=me.id.substring(2);
	var	name_val=$("#"+me.id).html();
	$("#"+id).val(id_val);
	$("#"+name).val(name_val);
	$("#"+dialog).dialog("close");
}
$(document).ready(function() {
	$("."+class_name).accordiont({
		accordiont:true,
		speed: 500,
		closedSign: '[+]',
		openedSign: '[-]'
	});
//	jQuery('#mydialog').dialog({'title':'Выбрать регион','modal':'true','autoOpen':false});
});