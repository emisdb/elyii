<?php

class dosvg extends CWidget {

    private $rows;
    private $regs;
    protected $arr_coor;
    protected $iters;
    protected $line_open;

    public $tree;
    public $mode;
    public $background;
    public $class;
    public $prestuff;
    public $poststuff;
    public $width=100;
    public $height=100;
    public $name='name';
    public $position='position';
    public $link='link';
    public $svgid='id';
    public $id='id';
    public $description='description';
    public $status='status';
 	
    public function init()
	{
		Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(dirname(__FILE__).'/res/dosvg.js' ), CClientScript::POS_BEGIN);
// 		Yii::app()->clientScript->registerCssFile(Yii::app()->assetManager->publish(dirname(__FILE__).'/res/dosvg.css' ), CClientScript::POS_BEGIN);
		if($this->mode=="tree"){
			$this->rows=array();
			$this->getfortree($this->tree,0);
			$this->width=(count($this->rows)+2)*150;
			$this->height=(max($this->rows)+5)*50;
 		}
		if($this->mode=="bush"){
			$this->rows=array();
			$ii=0;
			foreach ($this->tree as $value)
			{
				if(isset($value['items'])) $arr=$this->getforbush($value['items'],$ii);
				$ii++;
			}
			$this->width=(count($this->rows)+1)*180;
			$this->height=(max($this->rows)+1)*50+10;
 		}
 }
    private function getforbush($res,$x)
	{
		if(isset($this->rows[$x])) $this->rows[$x]+=count($res);
		else $this->rows[$x]=count($res);
		$ii=0;
		foreach ($res as $value)
		{
			$ii++;
			if(isset($value['items'])) $arr=$this->getforbush($value['items'],$x);
		}
	} 
	private function getfortree($res,$x)
	{
		if(isset($this->rows[$x])) $this->rows[$x]+=count($res);
		else $this->rows[$x]=count($res);
		
		foreach ($res as $value)
		{
			if(isset($value['items'])) $this->getfortree($value['items'],$x+1);
		}
	}
    private function stylejsformap(&$res)
	{
 			$res.="<style>\n";
			$res.=" polyline.cityroad{fill:none;}\n";
			$res.=".city-title{font-size:8pt;font-weight:normal;font-family:Arial Black;}\n";
			$res.=".road-title{fill:#f72579;font-size:8pt;font-weight:normal;font-family:Arial Black;}\n";
			$res.="</style>\n";
			$res.='<script type="text/ecmascript"> <![CDATA[';
			$res.="function showtitle(evt,id){ \n";
			$res.='if(evt.target.getAttribute("set")=="1") return;';
			$res.='evt.target.parentNode.getElementById("textcityroad"+id).setAttribute("fill-opacity",.9);';
			$res.='evt.target.setAttribute("stroke","#f72579");';
			$res.='evt.target.setAttribute("stroke-width","5");';
			$res.="}\n";
			$res.="function hidetitle(evt,id){ \n";
			$res.='if(evt.target.getAttribute("set")=="1") return;';
			$res.='evt.target.parentNode.getElementById("textcityroad"+id).setAttribute("fill-opacity",0);';
			$res.='evt.target.setAttribute("stroke","#336666");';
			$res.='evt.target.setAttribute("stroke-width","4");';
			$res.="}\n";
        		$res.="function showcircle(evt,id){ \n";
			$res.='evt.target.parentNode.getElementById("textcityroad"+id).setAttribute("fill","#f72579");';
			$res.='if(evt.target.getAttribute("set")=="1") return;';
			$res.='evt.target.setAttribute("fill","#f72579");';
			$res.='evt.target.setAttribute("stroke","#f72579");';
			$res.='evt.target.setAttribute("stroke-width",3);';
			$res.="}\n";
			$res.="function hidecircle(evt,id){ \n";
			$res.='if(evt.target.getAttribute("set")=="1") return;';
			$res.='evt.target.parentNode.getElementById("textcityroad"+id).setAttribute("fill","#000");';
			$res.='evt.target.setAttribute("fill","#dededd");';
			$res.='evt.target.setAttribute("stroke","#336666");';
			$res.='evt.target.setAttribute("stroke-width",1);';
			$res.="}\n";
			$res.="]]> </script>\n";
   }
       private function stylejsforbush(&$res)
	{
 			$res.='<script type="text/ecmascript"> <![CDATA[';
			$res.="function choosewhat(evt,id){ \n";
			$res.='var element=evt.target.parentNode.getElementById("box_what");';
			$res.='element.firstChild.data=id;';
			$res.="}\n";
			$res.="function choosewhere(evt,id){ \n";
			$res.='var element=evt.target.parentNode.getElementById("box_where");';
			$res.='element.firstChild.data=id;';
			$res.="}\n";
 			$res.="]]> </script>\n";
			$res.='<rect x="'.($this->width-50).'" y="30" width="40" height="20" style="fill:#eee;stroke:#ccc;stroke-width:2;" />';
 			$res.='<text id="box_what" x="'.($this->width-40).'" y="45" style="fill:#888;font-size:10pt;">..</text>';
			$res.='<text x="'.($this->width-50).'" y="20" style="fill:#999;font-size:8pt;">Что:</text>';
			$res.='<rect  x="'.($this->width-50).'" y="65" width="40" height="20" style="fill:#eee;stroke:#ccc;stroke-width:2;" />';
 			$res.='<text id="box_where" x="'.($this->width-40).'" y="80" style="fill:#888;font-size:10pt;">..</text>';
			$res.='<text x="'.($this->width-50).'" y="60" style="fill:#999;font-size:8pt;">Куда:</text>';
    }
   
	private function fetchTreeRow($arr,$x,$y)
					{
		$off=$x*200;
		$ii=0;
     foreach ($arr as $issue) {
		$lev=$ii*50;
		echo '<rect id="task'.$issue['id'].'" x="'.($off+30).'" y="'.($y+$lev+10).'" width="100" height="40"'
				. ' style="fill:#8f8; stroke-width:2; stroke:#454;"';
		echo ' onmouseover="evt.target.setAttribute(\'opacity\',0.5);ShowTooltip(evt,\''.$issue['id'].'\');"';
		echo ' onmouseout="evt.target.setAttribute(\'opacity\',1);HideTooltip(\''.$issue['id'].'\');"'. ' />';
		echo "\n";
		echo '<a xlink:href="'.$issue['id'].'" >'; 
		echo '<text x="'.($off+35).'" y="'.($y+$lev+25).'" style="fill:#000;font-weight:bold;">'.$issue['name'].'</text>';
		echo '</a>';
		if($issue["items"]){
			$this->fetchTreeRow($issue["items"],$x+1,$lev);
		}
		$ii++;
	 }
	}
		private function fetchBushRow($arr,$x,$y) {
			$ii=0;
			foreach ($arr as $issue) {
			$lev=$ii*50;
		echo '<line x1="'.($x+100).'" y1="'.($y+$lev).'" x2="'.($x+100).'" y2="'.($y+$lev+10).'" style="stroke:#000;stroke-width:3;" />';	
		echo '<rect id="reg'.$issue['id'].'" x="'.($x+20).'" y="'.($y+$lev+10).'" width="170" height="40"'
				. ' style="fill:#8f8; stroke-width:2; stroke:#454;"';
		echo ' ondblclick="choosewhat(evt,\''.$issue['id'].'\');"';
		echo ' onclick="choosewhere(evt,\''.$issue['id'].'\');"';
		echo ' onmouseover="evt.target.setAttribute(\'opacity\',0.5);"';
		echo ' onmouseout="evt.target.setAttribute(\'opacity\',1);"'. ' />';
		echo "\n";
		echo '<a xlink:href="'.$issue['link'].'" >'; 
		echo '<text x="'.($x+35).'" y="'.($y+$lev+25).'" style="fill:#000;;font-size:9pt;">';
		$realname=trim($issue['name']);
		if(mb_strlen($realname,Yii::app()->charset)>18)
		{
			echo'<tspan x="'.($x+35).'" y="'.($y+$lev+25).'" >'.$issue['id'].". ".mb_substr($realname, 0, 18,Yii::app()->charset).'</tspan>';
			echo'<tspan x="'.($x+35).'" y="'.($y+$lev+45).'" >'.mb_substr($realname, 18,50,Yii::app()->charset).'</tspan>';
		}
		else 
			echo "".$issue['id'].". ".$realname;
		echo "</text>\n";
		echo '</a>';
		if($issue["items"]){
			$this->fetchBushRow($issue["items"],$x,$lev+$y);
		}
		$ii++;
	 }
	}
	private function runTree()
	{
			$this->fetchTreeRow($this->tree,0,0);
	}
	private function runBush()
	{
		$ii=0;
		$res="";
		$this->stylejsforbush($res);
		echo $res;
	foreach ($this->tree as $value)
		{
			$off=$ii*180;
			if($ii>0)
			echo '<line x1="'.($off+10).'" y1="30" x2="'.($off+20).'" y2="30" style="stroke:#000;stroke-width:3;" />';	
			echo '<rect id="reg'.$value['id'].'" x="'.($off+20).'" y="10" width="170" height="40"'
				. ' style="fill:#ff8; stroke-width:2; stroke:#454;"';
		echo ' ondblclick="choosewhat(evt,\''.$value['id'].'\');"';
		echo ' onclick="choosewhere(evt,\''.$value['id'].'\');"';
		echo ' onmouseover="evt.target.setAttribute(\'opacity\',0.5);"';
		echo ' onmouseout="evt.target.setAttribute(\'opacity\',1);"'. ' />';
		echo "\n";
		echo '<a xlink:href="'.$value['link'].'" >'; 
		echo '<text x="'.($off+35).'" y="25" style="fill:#000;font-size:9pt;">'.$value['name'].'</text>';
		$realname=trim($value['name']);
		if(mb_strlen($realname,Yii::app()->charset)>18)
		{
			echo'<tspan x="'.($off+35).'" y="25" >'.$value['id'].". ".mb_substr($realname, 0, 18,Yii::app()->charset).'</tspan>';
			echo'<tspan x="'.($off+35).'" y="45" >'.mb_substr($realname, 18,50,Yii::app()->charset).'</tspan>';
		}
		else 
			echo "".$value['id'].". ".$realname;
		echo "</text>\n";

		
		echo '</a>';
			if(isset($value['items'])) $this->fetchBushRow($value['items'],$off,50);;
				$ii++;
			}
			
	}
	private function runMap()
	{
		$res="";
		$this->stylejsformap($res);
		$ii=0;
		foreach ($this->tree as $value) {
		  if($value['position']->type=='c'){
			  $res.='<circle id="cityroad'.$value['id'].'" set="0" fill="#dededd" stroke="#336666" stroke-width=1'
                                .' cx="'.$value['position']->coors[0].'" cy="'.$value['position']->coors[1].'" r="'.$value['position']->coors[2].'"'			
                                . ' onmouseover="showcircle(evt,'.$value['id'].')"'	
                                . ' onmouseout="hidecircle(evt,'.$value['id'].')" />';	
			  $res.='<text id="textcityroad'.$value['id'].'" class="city-title" x="'.$value['position']->title[0].'" y="'.$value['position']->title[1]
					  .'" fill="#000">'.$value['name'];			
//			  $res.='<set attributeName="fill" to="#f72579" begin="city'.$value['id'].'.mouseover" end="city'.$value['id'].'.mouseout" >';
				$res.='</text> ';			
			}
		  else {
			  if($value['position']->type=='p'){
					$res.='<polyline class="cityroad" id="cityroad'.$value['id'].'" set="0" stroke="#336666"; stroke-width="4" points="'.$value['position']->coors.'"'
							. ' onmouseover="showtitle(evt,'.$value['id'].')"'	
							. ' onmouseout="hidetitle(evt,'.$value['id'].')" />';	
			  }
				elseif($value['position']->type=="l")
				{
					$res.='<line id="cityroad'.$value['id'].'" set="0" stroke="#336666" stroke-width="4" '
							.' x1="'.$value['position']->coors[0].'"'
							.' y1="'.$value['position']->coors[1].'"'
							.' x2="'.$value['position']->coors[2].'"'
							.' y2="'.$value['position']->coors[3].'"'
							. ' onmouseover="showtitle(evt,'.$value['id'].')"'	
							. ' onmouseout="hidetitle(evt,'.$value['id'].')" />';	
				}
				$res.='<text class="road-title" id="textcityroad'.$value['id'].'" fill-opacity="0" x="'.$value['position']->title[0].'" y="'.$value['position']->title[1]
						.'">'.$value['name'];			
//				$res.='<set attributeName="fill-opacity" to=".9" begin="road'.$value['id'].'.mouseover" end="road'.$value['id'].'.mouseout" >';			
				$res.='</text> ';			
			}
/**/				  $ii++;
			$res.="\n";
	  }
		echo $res;
		
	}
	public function run() 
	{
		$res='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" class="'.$this->class.'" id="'.$this->svgid.'" style="width:'.$this->width.'px; height:'.$this->height.'px;';
			if (is_null($this->background)){
			$res.='background:#fff;opacity:1;';			
		}
		else {
			$res.='background-image:url('.Yii::app()->request->baseUrl.$this->background.');';			
		}
			$res.='">';
			echo $res;
	if(isset($this->prestuff)) echo "".$this->prestuff;
		if($this->mode=="map")	$this->runMap();
		elseif($this->mode=="tree")	$this->runTree();
		elseif($this->mode=="bush")	$this->runBush();
	if(isset($this->poststuff)) echo "".$this->poststuff;
 			echo "\n</svg>\n";
    }


}