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
    public $id='id';
    public $description='description';
    public $status='status';
 	
    public function init()
	{
    }
   
   private function fetchRow($_par,$_next) 
  {
  }
	private function runMap()
	{
			$res="<style>\n";
			$res.="line:hover, polyline:hover{stroke:#f72579;stroke-width:5;opacity:.9;}\n";
			$res.="circle:hover{fill:#f72579;stroke-width:3;stroke:#f72579;}\n";
			$res.=".city-title{font-size:8pt;font-weight:normal;font-family:Arial Black;}\n";
			$res.=".road-title{fill:#f72579;font-size:8pt;font-weight:normal;font-family:Arial Black;}\n";
			$res.="</style>\n";
			$ii=0;
	          foreach ($this->tree as $value) {
				if($value['position']->type=='c'){
					$res.='<circle id="city'.$value['id']
						.'" cx="'.$value['position']->coors[0].'" cy="'.$value['position']->coors[1].'" r="'.$value['position']->coors[2].'" fill="#dededd" stroke="#336666" stroke-width="1" /> ';			
					$res.='<text class="city-title" x="'.$value['position']->title[0].'" y="'.$value['position']->title[1]
							.'" fill="#000">'.$value['name'];			
					$res.='<set attributeName="fill" to="#f72579" begin="city'.$value['id'].'.mouseover" end="city'.$value['id'].'.mouseout" ></text> ';			
				  }
				else {
					if($value['position']->type=='p'){
						  $res.='<polyline id="road'.$value['id'].'" stroke="#336666" stroke-width="4" fill="none" points="'.$value['position']->coors.'" />';	
					}
					  elseif($value['position']->type=="l")
					  {
						  $res.='<line id="road'.$value['id'].'" stroke="#336666" stroke-width="4"'
								  .' x1="'.$value['position']->coors[0].'"'
								  .' y1="'.$value['position']->coors[1].'"'
								  .' x2="'.$value['position']->coors[2].'"'
								  .' y2="'.$value['position']->coors[3].'"'
								  .'/>';			
					  }
					  $res.='<text class="road-title" fill-opacity="0" x="'.$value['position']->title[0].'" y="'.$value['position']->title[1]
							  .'" fill="#000">'.$value['name'];			
					  $res.='<set attributeName="fill-opacity" to=".9" begin="road'.$value['id'].'.mouseover" end="road'.$value['id'].'.mouseout" ></text> ';			
				  }
/**/				  $ii++;
				  $res.="/n";
            }
			echo $res;
		
	}
	public function run() 
	{
		$res='<svg class="'.$this->class.'" style="width:'.$this->width.'px; height:'.$this->height.'px;';
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