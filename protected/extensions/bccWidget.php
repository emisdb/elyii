<?php

class bccWidget extends CWidget {

	private $position;
	private $lvl;
	private $_next;
	private $_par;	
	private $iters;
	private $rows;
	private $prows;

	protected $line_open;
	protected $arr_coor;

	public $func=true;
	public $togo;
	public $model;
	public $columns;
	public $next;
	public $par;
	public $id;
	public $level;
	public $class;
	public $action='';
	public $active='';
	public $ret_value='';
	
    public function init()
	{
//		Yii::app()->clientScript->registerCoreScript( "https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js", CClientScript::POS_HEAD);
//		Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-1.5.2.min.js',CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile(  Yii::app()->assetManager->publish('js/scriptbreaker-multiple-accordion-1.js' ), CClientScript::POS_BEGIN);
//		Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/scriptbreaker-multiple-accordion-1.js',CClientScript::POS_HEAD);
		$criteria=new CDbCriteria;
		if($this->columns!=null)
		{
			$cri="";
			foreach($this->columns as $row)
				if(strlen($row[0])>0) $cri[]=$row[0];
			$criteria->with=$cri;
		}
		$this->rows=$this->model->findAll($criteria);
 		$this->line_open=false;
		$this->position=0;
		$this->ret_value=array();
  }
   
   private function fetchRowDumb() 
  {
	$ided=false;
	for($ii=0;sizeof($this->rows)>$ii;$ii++)
	{
//		echo ":$ii";
		$this->iters++;
		if(($this->_next==$this->rows[$ii][$this->next])&&($this->_par==$this->rows[$ii][$this->par]) )
			{ $ided=true; break;}
	
	} 

	$this->position=$ii;
	return $ided;
  }
   private function fetchRow() 
  {
	$ided=false;
	for($ii=$this->position;sizeof($this->rows)>$ii;$ii++)
	{
//		echo ":$ii";
		$this->iters++;
		if(($this->_next==$this->rows[$ii][$this->next])&&($this->_par==$this->rows[$ii][$this->par]) )
			{ $ided=true; break;}
		
	} 
	if(!$ided)
	{
		for($ii=0;$this->position>$ii;$ii++)
		{
			$this->iters++;
//			echo ":$ii";
		if(($this->_next==$this->rows[$ii][$this->next])&&($this->_par==$this->rows[$ii][$this->par]) )
			{ $ided=true; break;}
		} 
	}
	$this->position=$ii;
	return $ided;
  }
   private function fetchList($_par,$_next,$rec=0) 
  {
	$ided=0;
	$hasone=false;
	for($ii=0;sizeof($this->prows)>$ii;$ii++)
	{

		if(($_next==$this->prows[$ii][$this->next])&&($_par==$this->prows[$ii][$this->par]) )
			{
			if((!$hasone)&&($_next==null))	$this->arr_coor[$_par]=array();
				$hasone=true;
				if($this->prows[$ii]['ptype']=='line') 
				{	
					$ided++;
					if(($_next==null)||($ided>1))
					{
						
						$this->arr_coor[$_par][]=array(1,$this->prows[$ii]['coox'],$this->prows[$ii]['cooy']);

//									echo ",[0,";
							 $this->line_open=true;
					}
					else 
						$this->arr_coor[$_par][]=array(2,$this->prows[$ii]['coox'],$this->prows[$ii]['cooy']);
					$this->fetchList($_par,$this->prows[$ii]['id']);
				}
				else
					$this->arr_coor[$_par][]=array(0,$this->prows[$ii]['coox'],$this->prows[$ii]['cooy']);
//		echo ",[1,[".$this->rows[$ii]['coox'].",".$this->rows[$ii]['cooy']."]]\n";

			}
	} 
	if(($this->line_open)&&($ided>0))
	{
//		echo "]";
		$this->line_open=false;
	}

  }

	private function displayRow($pos) 
  {
		$strout="";
 		$id=$this->rows[$pos][$this->id];
		if($this->lvl==$this->level)
		{
			if(strlen($this->action)==0)
			{
				if($this->func)
					echo ("<li onmouseover='omover(\"$id\",682)' onmouseout='omout(\"$id\")'");
				else
					echo ("<li onmouseover='onmover(\"$id\")' onmouseout='onmout(\"$id\")'");
				if($id==$this->active)	echo (" class=\"active\" ");
				if($this->func)
					echo ("><div class='chk' id='ch$id' onclick='checkit(\"$id\")'></div><a href='#' onclick='checkit(\"$id\")' id='rg$id'>");
				else
					echo ("><div class='chk' id='ch$id' onclick='checkiti(\"$id\")'></div><a href='#' onclick='checkiti(\"$id\")' id='rg$id'>");
//				$this->fetchList($id,null);	
				$this->ret_value[]=$id;
			}
			else
			{	
				echo ("<li ");
				if($id==$this->active)	echo (" class=\"active\" ");
				echo ("><a href='#' onclick='".$this->action."' id='rg$id'>"); 
			}
		}
		else 
		echo("<li><a href='#'>");
		foreach($this->columns as $col)
		{
			if(strlen($col[0])>0)
				$row=$this->rows[$pos][$col[0]];
			else
				$row=$this->rows[$pos];
				
			if ($row[$col[1]]==null)
					$strout .= " ";
				else
				{
					if ($col[3]=='!')
					{
						if ($col[2]=='img')
							$strout ="<img src=\"".Yii::app()->request->baseUrl.PIC_PATH.$row[$col[1]]."\">";
						else
							$strout =" ".$row[$col[1]]." ";
					}
					else
					{
						if ($col[2]=='img')
							$strout .="<img src=\"".Yii::app()->request->baseUrl.PIC_PATH.$row[$col[1]]."\">";
						else
							$strout .=" ".$row[$col[1]]." ";
					}
				}
		}
		echo ("$strout</a>\n");
 }
	private function runlevel()
{
	$this->lvl++;
	if($this->lvl>$this->level) return;
	$next=0;
	$par=0;
	$id=0;
	$cal=0;
	if($this->lvl==1)
	{
		$class=($this->class==null ? "" : "class=\"".$this->class."\"");
		echo ("<ul $class>\n");	
	}
	else		echo ("<ul>\n");	

	while($cal<100)
	{
		$cal++;
		$this->displayRow($this->position);
		$id=$this->rows[$this->position][$this->id];
		$next=$this->rows[$this->position][$this->next];
		$par=$this->rows[$this->position][$this->par];
		$this->_next=$id;
		$this->_par=$par;
		if($this->lvl==$this->level)
		{
			if (!$this->fetchRow()) break;	
		}
		else
		{
			$this->_next=null;
			$this->_par=$id;
			if ($this->fetchRow())
			{
				$this->runlevel();
				$this->_next=$id;
				$this->_par=$par;
				if (!$this->fetchRow()) break;
			}			
			else 
			{
				$this->_next=$id;
				$this->_par=$par;
				if (!$this->fetchRow()) break;
			}
		}
		echo "</li>\n";
	}
	echo ("</li>\n</ul>\n");
	$this->lvl--;

}	
	public function run() 
	{
		$this->_next=null;
		$this->_par=null;
		$this->lvl=0;
		if ($this->fetchRow())	$this->runlevel();
//		echo "<h1>iters:".$this->iters."</h1>";
		$script="class_name='".$this->class."';\n";
		Yii::app()->clientScript->registerScript('goarr',$script, CClientScript::POS_HEAD);
 }


}