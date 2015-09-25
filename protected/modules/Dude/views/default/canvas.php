<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<canvas id="mycan" width="525" height="525" style="border:1px dashed #D0E3EF;"></canvas>

<script>
var acan=document.getElementById("mycan");
var cantx=acan.getContext("2d");
for(var x=0.5;x<530;x+=10)
{
	cantx.moveTo(x,0);
	cantx.lineTo(x,500);
	
}
for(x=0.5;x<530;x+=10)
{
	cantx.moveTo(0,x);
	cantx.lineTo(500,x);

}
	cantx.strokeStyle="#aee";
	cantx.stroke();
	cantx.beginPath();
	cantx.moveTo(0,20);
	cantx.lineTo(500,20);	
	cantx.lineTo(490,10);	
	cantx.moveTo(500,20);
	cantx.lineTo(490,30);	
	cantx.moveTo(20,0);
	cantx.lineTo(20,500);	
	cantx.lineTo(10,490);	
	cantx.moveTo(20,500);
	cantx.lineTo(30,490);	
	cantx.strokeStyle="#000";
	cantx.stroke();

</script>