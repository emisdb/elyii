<?php

class MapTabWidget extends CWidget {

	protected $position;
	protected $lvl;
	protected $_next;
	protected $_par;	
	protected $iters;
	protected $par_id;
	protected $siters;
	protected $rows;
	protected $rowss;
	protected $arr_coor;
	protected $rcount;

	public $with;
	public $where;
	public $togo;
	public $model;
	public $columns;
	public $next;
	public $par;
	public $pars;
	public $id;
	public $level;
	public $class;
	public $catname;
	public $titname;
	public $titwidth;
	public $picname;
	public $cont;
	public $type=0;
	public $sides;
//	public $cont2;
	public $qry;

	public $rownum;
	public $rownam;
	public $colspan;
	public $colname;
	public $coox;
	public $cooy;
	
    public function init()
	{
		$css=Yii::app()->request->baseUrl."/css/gtw.css";
		$cs = Yii::app()->getClientScript();
		$cs->registerCssFile($css);
//		Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-1.5.2.min.js');
		Yii::app()->clientScript->registerScriptFile("http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU&coordorder=longlat");
		Yii::app()->clientScript->registerScriptFile(  Yii::app()->assetManager->publish('js/gtw.js' ), CClientScript::POS_HEAD);
//		Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/gtw.js');
		$criteria=new CDbCriteria;
		if(!is_null($this->with))
		{
			$criteria->with=$this->with;
		}
		$criteria->addInCondition($this->where,$this->pars);
		$this->rows=$this->model->findAll($criteria);
		$this->position=0;
		$this->initAdd($criteria);
//		echo print_r($this->rows);

    }
  protected function initAdd($crit) 
  {
 		$connection=Yii::app()->db; 
		if(!is_null($this->qry))
		{
			for($i=0;$i<sizeof($this->qry);$i++)
			{
				$str=$this->qry[$i]['q']." WHERE ".$crit->condition." ORDER BY ".$this->qry[$i]['o'];	
				$command=$connection->createCommand($str);
				$dataReader=$command->query($crit->params);
				if(!is_null($dataReader))
					$this->rowss[]=$dataReader->readAll();
			}
		}
   }
   
  
  /*
  процедура выводит информацию по массиву шаблонов в переменной cont.
  шаблон по следующему формату "буква"+"цифра",
  где буква означает тип данных, выводимый на отображение, а цифра - порядковый номер данных.
  обозначение букв:
  t - текст как он введен в значении шаблона
  v - имя параметра (колонки) основного массива данных (подставляется в строку на текущей итерации)
  q - вызывается функция getQry с параметром из значения шаблона и ключевым значением из текущей строки массива данных. параметр обозначает набор {массив,фильтр, формат}
  a - данные берутся из связанного набора (relation) и далее либо выводятся напрямую, либо (при наличии набора функций q ) обарбатываются в getQry  
  
  
  */
  
  
  protected function getValue($pos,$temp_row,$rowset=-1,$ord=-1)
{
	$val=$temp_row['type'];
	$sk=$temp_row['skip'];
	$rows=$this->rows;
	if(($sk=='p')&&($ord>0)) return '';
/*
	if ($rowset<0) $rows=$this->rows;
	else  $rows=$this->rowss[$rowset];
*/
	switch($val)
	{
	case 't':
		return $temp_row['value'];
		break;
	case 'r':
		$rs=$temp_row['rs'];
		$num=$this->getValue($pos,$this->rownum);
		if($rs=='x') return str_replace("rowspan","rowspan='$num'",$temp_row['value']);
		return $temp_row['value'];
		
		break;
	case 'v':
		return $rows[$pos][$temp_row['value']];
		break;
	case 'a':
		return $rows[$pos][$temp_row['relation']][$temp_row['field']];
		break;
	case 'b':
		if (is_null($temp_row['relation2']))
			return count($rows[$pos][$temp_row['relation']]);
		else
			return count($rows[$pos][$temp_row['relation']][$temp_row['relation2']]);			
		break;
	case 'q':
		return $this->getQ($temp_row,$pos);
		break;
	case 'c':
		return "&#".(65+$ord).";";
		break;
	case 's':
		return $ord;
		break;
	case 'd':
		if (is_null($temp_row['relation2']))
			return $rows[$pos][$temp_row['relation']][$rowset][$temp_row['field']];
		else
			return $rows[$pos][$temp_row['relation']][$temp_row['relation2']][$rowset][$temp_row['field']];			
		break;
//		return (($rows[$pos][$temp_row['value']]==$ord) ? "В СПб" : "Из СПб");;
		break;
	case 'x':
		$where=$this->getValue($pos,$temp_row['where']);
		if($temp_row['how']=='r')
		{
			if($temp_row['src']['type']=='q')
				return $this->getQ($temp_row['src'],$pos,$where,$temp_row['what']['format']);
			elseif($temp_row['src']['type']=='f')
			{
				$stri=array();
				$go=true;
				for($j=0;$j<sizeof($temp_row['src']['format']);$j++)
				{
						$res=$this->getValue($pos,$temp_row['src']['format'][$j]);
						if(strlen($res)>0)
						{
								if(!is_null($temp_row['src']['format'][$j]['condition'])) 
									$stri[]=array('c'=>'*','v'=>$res);
								else $stri[]=array('v'=>$res);
						}
						else
						if($temp_row['src']['format'][$j]['condition']=='x') $go=false;	
						
				}
//				print_r($stri);
				$str="";
				for($j=0;$j<sizeof($stri);$j++) 
				{
					$str.=((!$go)&&(!is_null($stri[$j]['c']))) ? '' : $stri[$j]['v'];  
				}
				$strx="";
				for($j=0;$j<sizeof($temp_row['what']['format']);$j++)
					$strx.=$this->getValue($pos,$temp_row['what']['format'][$j]);
//					echo "\n<br>$strx";
				return str_replace($strx,$str,$where);
			}
			
		}

	}
}

   protected function getQ($temp_row,$pos,$val='',$frmi='') 
{
		$rowss=$this->rowss[$temp_row['q']];
		$fltr=$temp_row['filter'];
		$frm=$temp_row['format'];
		$str="";$strx="";
		$ii=-1;	

		foreach($rowss as $row)
		{
			$ii++;
			if($row[$fltr]==$this->rows[$pos][$this->id]) //очень негибко
			{
				$dnum=sizeof($frm);
				if($dnum>0)
					for($j=0;$j<$dnum;$j++)
								$str.=$this->getValue($ii,$frm[$j],$temp_row['q']);
				if($frmi!=='')
				{
					$dnum=sizeof($frmi);
					if($dnum>0)
					{
						for($j=0;$j<$dnum;$j++)
								$strx.=$this->getValue($ii,$frmi[$j],$temp_row['q']);
						$val=str_replace($strx,$str,$val);
					}
					$str="";$strx="";	
				}
	
			}	
			
		}
		if($frmi!=='') return $val;
		else	return $str;

} 
  protected function fetchRowDumb() 
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
   protected function fetchRow() 
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
   protected function displayRow($pos) 
  {
		$strout=array();
 		$id=$this->rows[$pos][$this->par];
		if($this->par_id!=$id)
		{
			echo "<tr class='gtwname'><td colspan='".$this->colspan."'>";
			echo "".$this->getValue($pos,$this->colname)."</td></tr>\n";
			$this->par_id=$id;
			$this->siters=0;
			
		}
			
		$num=$this->getValue($pos,$this->rownum);
		$this->siters++;
 		$id=$this->rows[$pos][$this->id];
		$sides=0;$class='chk';
		if(count($this->sides)>0) {$sides=$this->sides[$pos];$class='chkd';}
		for($i=0;$i<$num;$i++)
		{
			if($sides>0) {if(!($sides & pow(2,$i))) continue;}
			echo "<tr onmouseover='omover(this)' onmouseout='omout(this)' ".($this->siters%2>0 ? "class='trodd'" : "class='treven'");
			$idx="".$id."_".$i;
			echo " id='tr$idx'>\n";
			echo ("<td><div class='$class' id='ch$idx' onclick='checkit(\"$idx\")'></div></td>\n");
			for($j=0;$j<sizeof($this->cont);$j++) echo ("".$this->getValue($pos,$this->cont[$j],$i,$i));
			echo "</tr>\n";
			$strout[]=$this->getValue($pos,$this->rownam,$i,$i);
		}
		$this->arr_coor[$id]=array('x'=>$this->rows[$pos][$this->coox],
									'y'=>$this->rows[$pos][$this->cooy],
									'name'=>$this->rows[$pos][$this->catname],
									's'=>$sides,
									'n'=>$strout,
									);
 }
	public function doscript() 
	{
			echo "<script type=\"text/javascript\">\n";
			echo "coors =[\n";
			$i=0;
			if(!count($this->arr_coor)>0) return;
			foreach($this->arr_coor as $key =>$value)
			{
				if($i!=0) echo ",";
				$i++;
		//		echo "[$key, \"".str_replace("\"","\\\"",$value['name'])."\", [".$value['x'].",".$value['y']."],[";
				echo "[$key, \"".str_replace("\"","\\\"",$value['name'])."\", [".$value['x'].",".$value['y']."],".$value['s'].",[";
			$arrlength=count($value['n']);
			for($x=0;$x<$arrlength;$x++)
			  {
			   if($x>0) echo ",";
			  echo "\"".$value['n'][$x]."\"";
			  }	
				echo "]]\n";
/**/			
			}
			echo "];\n</script>\n";

			//			echo "<div onclick='goshow()'>Покажика</div>";
		
	}
	public function run() 
	{
//		return;
		if (!(sizeof($this->pars)>0)) return;
		$this->_next=null;
		$this->_par=$this->pars[0];
		$this->lvl=0;
		$next=0;
		$par=0;
		$id=0;
		$cal=0;
		$this->siters=0;
		$this->iters=0;
		$this->par_id=0;
		
		echo ("<table id='gtw'>\n");
//		echo ("<thead><tr>\n");
//		for($j=0;$j<sizeof($this->titname);$j++) echo ("<th>".$this->titname[$j]."</th>\n");
		for($j=0;$j<sizeof($this->titname);$j++) echo ("<col width=\"".$this->titname[$j]."\">\n");
//		echo ("</tr></thead>\n");
		echo ("<tbody>\n");
		if($this->type==0)
		{
			while($cal<1000)
			{
				$cal++;
				if ($this->fetchRow())
				{
					$this->displayRow($this->position);
					$id=$this->rows[$this->position][$this->id];
					$next=$this->rows[$this->position][$this->next];
					$par=$this->rows[$this->position][$this->par];
					$this->_next=$id;
					$this->_par=$par;
				}
				else
				{
					$this->_next=null;
					if ($this->lvl<sizeof($this->pars)-1)
						$this->_par=$this->pars[++$this->lvl];
					else
						break;
		
				}
			}
		}
		else
		{
			for($ii=0;sizeof($this->rows)>$ii;$ii++)
			{
				$this->position=$ii;
				$this->displayRow($this->position);
			} 
		
		}
		echo ("</tbody>\n");
		echo ("</table>\n");
		$this->doscript();
     }


}