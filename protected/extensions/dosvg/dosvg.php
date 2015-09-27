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
    }
    public function stylejs(&$res)
	{
 			$res.="<style>\n";
			$res.=".road-line{stroke:#336666; stroke-width:4;fill:none;}\n";
			$res.=".road-line-select{stroke:#f72579;stroke-width:5;opacity:.9;fill:none;}\n";
			$res.=".city{fill:#dededd; stroke:#336666; stroke-width:1;}\n";
			$res.=".city-select{fill:#f72579;stroke-width:3;stroke:#f72579;}\n";
			$res.=".city-title{font-size:8pt;font-weight:normal;font-family:Arial Black;}\n";
			$res.=".road-title{fill:#f72579;font-size:8pt;font-weight:normal;font-family:Arial Black;}\n";
			$res.="</style>\n";
			$res.='<script type="text/ecmascript"> <![CDATA[';
			$res.="function showtitle(evt,id){ \n";
			$res.='evt.target.parentNode.getElementById("textroad"+id).setAttribute("fill-opacity",.9);';
			$res.='evt.target.setAttribute("class","road-line-select");';
			$res.="}\n";
			$res.="function hidetitle(evt,id){ \n";
			$res.='evt.target.parentNode.getElementById("textroad"+id).setAttribute("fill-opacity",0);';
			$res.='evt.target.setAttribute("class","road-line");';
			$res.="}\n";
        		$res.="function showcircle(evt,id){ \n";
			$res.='evt.target.parentNode.getElementById("textcircle"+id).setAttribute("fill","#f72579");';
			$res.='evt.target.setAttribute("class","city-select");';
			$res.="}\n";
			$res.="function hidecircle(evt,id){ \n";
			$res.='evt.target.parentNode.getElementById("textcircle"+id).setAttribute("fill","#000");';
			$res.='evt.target.setAttribute("class","city");';
			$res.="}\n";
			$res.="]]> </script>\n";
	


   }
   
   private function fetchRow($_par,$_next) 
  {
  }
	private function runMap()
	{
		$res="";
		$this->stylejs($res);
		$ii=0;
		foreach ($this->tree as $value) {
		  if($value['position']->type=='c'){
			  $res.='<circle id="city'.$value['id'].'" class="city"'
                                .' cx="'.$value['position']->coors[0].'" cy="'.$value['position']->coors[1].'" r="'.$value['position']->coors[2].'"'			
                                . ' onmouseover="showcircle(evt,'.$value['id'].')"'	
                                . ' onmouseout="hidecircle(evt,'.$value['id'].')" />';	
			  $res.='<text id="textcircle'.$value['id'].'" class="city-title" x="'.$value['position']->title[0].'" y="'.$value['position']->title[1]
					  .'" fill="#000">'.$value['name'];			
//			  $res.='<set attributeName="fill" to="#f72579" begin="city'.$value['id'].'.mouseover" end="city'.$value['id'].'.mouseout" >';
				$res.='</text> ';			
			}
		  else {
			  if($value['position']->type=='p'){
//					$res.='<polyline id="road'.$value['id'].'" stroke="#336666" stroke-width="4" fill="none" points="'.$value['position']->coors.'" />';	
					$res.='<polyline class="road-line" id="road'.$value['id'].'" points="'.$value['position']->coors.'"'
							. ' onmouseover="showtitle(evt,'.$value['id'].')"'	
							. ' onmouseout="hidetitle(evt,'.$value['id'].')" />';	
			  }
				elseif($value['position']->type=="l")
				{
					$res.='<line id="road'.$value['id'].'" stroke="#336666" stroke-width="4"'
							.' x1="'.$value['position']->coors[0].'"'
							.' y1="'.$value['position']->coors[1].'"'
							.' x2="'.$value['position']->coors[2].'"'
							.' y2="'.$value['position']->coors[3].'"'
							. ' onmouseover="showtitle(evt,'.$value['id'].')"'	
							. ' onmouseout="hidetitle(evt,'.$value['id'].')" />';	
				}
				$res.='<text class="road-title" id="textroad'.$value['id'].'" fill-opacity="0" x="'.$value['position']->title[0].'" y="'.$value['position']->title[1]
						.'" fill="#000">'.$value['name'];			
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
		$res='<svg xmlns:svg="www.w3.org/2000/svg" version="1.1" class="'.$this->class.'" id="'.$this->svgid.'" style="width:'.$this->width.'px; height:'.$this->height.'px;';
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
		if(isset($this->poststuff)) echo "".$this->poststuff;
 			echo "\n</svg>\n";
    }


}