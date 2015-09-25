<?php

class doPlan extends CWidget {

	private $rows;
	private $regs;
	protected $arr_coor;
	protected $iters;
	protected $line_open;

	public $togo;
	public $lmodel;
	public $model;
	public $next;
	public $par;
	
    public function init()
	{
		$criteria=new CDbCriteria;
		$criteria->select="id,name";
		$criteria->condition="".$this->par." IS NOT NULL";
		$this->rows=$this->model->findAll();
		$this->regs=$this->lmodel->findAll($criteria);
 		$this->line_open=false;
    }
   
   private function fetchRow($_par,$_next) 
  {
	$ided=0;
	for($ii=0;sizeof($this->rows)>$ii;$ii++)
	{

		$this->iters++;
		if(($_next==$this->rows[$ii][$this->next])&&($_par==$this->rows[$ii][$this->par]) )
			{
				if($this->rows[$ii]['ptype']=='line') 
				{	
					$ided++;
					if(($_next==null)||($ided>1))
						{
							echo ",[0,";
							 $this->line_open=true;
						}
						else echo ",";
					echo "[".$this->rows[$ii]['coox'].",".$this->rows[$ii]['cooy']."]\n";
								$this->fetchRow($_par,$this->rows[$ii]['id']);
				}
				else
					echo ",[1,[".$this->rows[$ii]['coox'].",".$this->rows[$ii]['cooy']."]]\n";

			}
	} 
	if(($this->line_open)&&($ided>0))
	{
		echo "]";
		$this->line_open=false;
	}

  }
	
	public function run() 
	{
		echo "<script type=\"text/javascript\">\n";
		echo "coors =[\n";
		for($ii=0;sizeof($this->regs)>$ii;$ii++)
		{
			echo "[".$this->regs[$ii]['id'].",\"".str_replace("\"","\\\"",$this->regs[$ii]['name'])."\"";
			$this->fetchRow($this->regs[$ii]['id'],null);
			echo "]";
			if(sizeof($this->regs)!=$ii+1) echo ",\n";
		}
		echo "];\n</script>\n";
//		if ($this->fetchRow())	$this->runlevel();
//		echo "<h1>iters:".$this->iters."</h1>";
     }


}