<?php

class OrderlistWidget extends CWidget {

	private $position;
	private $lvl;
	private $_next;
	private $_par;	
	private $iters;
	private $rows;
	private $columns_num;

	public $filter;
	public $togo;
	public $model;
	public $columns;
	public $next;
	public $par;
	public $par_id;
	public $id;
	public $level;
	public $class;
	public $cur_id;
	
    public function init()
	{
		$criteria=new CDbCriteria;
		$this->columns_num=sizeof($this->columns);
/*		if($this->columns!=null)
		{
			$cri="";
			foreach($this->columns as $row)
				if(strlen($row[0])>0) $cri[]=$row[0];
			$criteria->with=$cri;
		}
*/	
		if($this->filter!=null) 
		{
			$criteria->condition="(".$this->filter.")";         
		}	
		if($this->par_id!=null) 
		{
			if(strlen($criteria->condition)>0) $criteria->condition.="AND";
			$criteria->condition.="(".$this->par."=:val)";         
			$criteria->params=array(':val'=>$this->par_id);

		}

		$this->rows=$this->model->findAll($criteria);
		$this->position=0;
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
		if(($this->_next==$this->rows[$ii][$this->next])&&($this->_par==$this->rows[$ii][$this->par]) )
			{ $ided=true; break;}
		
	} 
	if(!$ided)
	{
		for($ii=0;$this->position>$ii;$ii++)
		{
		if(($this->_next==$this->rows[$ii][$this->next])&&($this->_par==$this->rows[$ii][$this->par]) )
			{ $ided=true; break;}
		} 
	}
	$this->position=$ii;
	return $ided;
  }

  private function displayRow($pos) 
  {
		$this->iters++;
		$strout="";
 		$id=$this->rows[$pos][$this->id];
		if($id==$this->cur_id) $class="class=\"".$this->class."self\"";
 		elseif($this->iters%2) $class="class=\"".$this->class."even\"";
 		else $class="class=\"".$this->class."odd\"";
 		echo("<tr onclick='sel_row($id)' $class id='".$this->class."tr$id'>");
		foreach($this->columns as $col)
			echo ("<td>".$this->rows[$pos][$col]."</td>");
		echo ("</tr>\n");
 }
	private function runlevel()
{
	$this->lvl++;
	if($this->lvl>$this->level) return;
	$next=0;
	$par=0;
	$id=0;
	$cal=0;
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
	}
 	$this->lvl--;

}	
	
	public function run() 
	{
		if($this->par_id!=null) $this->_par=$this->par_id;
		else	$this->_par=null;
		$this->iters=0;
		$this->lvl=0;
		$class=($this->class==null ? "" : "class=\"".$this->class."\"");
		$trclass=($this->class==null ? "" : "class=\"".$this->class."_tr\"");
		echo ("<table $class>\n");
		$jj=0;
		for($ii=0;sizeof($this->rows)>$ii;$ii++)
		{
			if($this->rows[$ii][$this->next]==null)
			{
				$id=$this->rows[$ii][$this->id];
				$this->_next=null;
				$jj++;
				$this->position=$ii;
				echo ("<tr onclick='sel_row(null)' $trclass ><td colspan='".$this->columns_num."'>Начало списка $jj");
				echo ("</td></tr>\n");
				if ($this->fetchRow())	$this->runlevel();
			}
		}
  		echo ("</table>\n");
   }


}