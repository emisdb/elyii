<?php

/**
 * This is the model class for table "regions".
 *
 * The followings are the available columns in table 'regions':
 * @property integer $id
 * @property string $name
 * @property integer $region_id
 * @property integer $next
 *
 * The followings are the available model relations:
 * @property Bb[] $bbs
 * @property Plan[] $plans
 * @property Regions $region
 * @property Regions[] $regions
 * @property Regions $next0
 * @property Regions[] $regions1
 */
class Regions extends CActiveRecord
{
	private $_dep = null;
	private $_next = null;
	public function getNextname(){
		if ($this->_next === null && $this->next0 !== null)
		{
			$this->_next = $this->next0->name;
		}
		return $this->_next;
	}
	public function setNextname($value){
		$this->_next = $value;
	}
	public function getParentname(){
		if ($this->_dep === null && $this->region !== null)
		{
			$this->_dep = $this->region->name;
		}
		return $this->_dep;
	}
	public function setParentname($value){
		$this->_dep = $value;
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Regions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'regions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('region_id, next', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, region_id, next, parentname', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'bbs' => array(self::HAS_MANY, 'Bb', 'region_id'),
			'plans' => array(self::HAS_MANY, 'Plan', 'region_id'),
			'region' => array(self::BELONGS_TO, 'Regions', 'region_id'),
			'regions' => array(self::HAS_MANY, 'Regions', 'region_id'),
			'regions_null' => array(self::HAS_MANY, 'Regions', 'region_id','condition'=>'region_id IS NULL'),
			'next0' => array(self::BELONGS_TO, 'Regions', 'next'),
			'regions1' => array(self::HAS_MANY, 'Regions', 'next'),
		);
	}
	private function donext($id)// change nextof  true: my leader's x-follower; use in after save
	{
                  $criteria=new CDbCriteria;
                  if((is_null($id))||(trim($id)==''))
		{
                  $criteria->addCondition('next IS NULL');  
                   $criteria->addCondition('region_id='.$this->region_id);  
 		} 
                else{
                   $criteria->addCondition('next='.$id);  
              }
                     $criteria->addCondition('NOT(id='.$this->id.")");  
   			$next=self::find($criteria);
			if(!is_null($next)){
                            $next->next=$this->id;
                            $next->save();
                        }

	}
	private function domynext($id)// change next of   my  x-follower; use in before save
	{
            $next=self::find('next=:postID', array(':postID'=>$this->id));
                if(!is_null($next)){
                    $next->next=$id;
                    $next->save();
            }
	}
       protected function beforeSave()
        {
            if(parent::beforeSave())
            {
  //              if($this->isNewRecord)
                                 return true;
            }
            else
                return false;
        }
                protected function afterSave()
	{
		parent::afterSave();
                 if($this->isNewRecord) $this->donext($this->next);
	}
	public function act($comm)
    {
		if($comm->a=="ma")
                {
                    $next=self::find('id=:postID', array(':postID'=>$comm->e));
                     if($this->next==$next->id) return false;
                   $this->domynext($this->next); //change my xfollower
                     $this->donext($comm->e);
                    $this->next=$comm->e;
                    $this->region_id=$next->region_id;
                    $this->save();
                }
		elseif($comm->a=="mb")
                {
                    $next=self::find('id=:postID', array(':postID'=>$comm->e));
                    if($this->id==$next->next) return false;
                    $this->domynext($this->next); //change my xfollower
                    $this->next=$next->next;
                    $this->region_id=$next->region_id;
                    $this->save();
                    $next->next=$this->id;
                    $next->save();
               }
		elseif($comm->a=="mi")
                {
                    $next=self::find('id=:postID', array(':postID'=>$comm->e));
                    if(!is_null($next->region_id)) return false;
                    if($this->id==$next->next) return false;
                    $this->domynext($this->next); //change my xfollower
                     $criteria=new CDbCriteria;
                    $criteria->addCondition('region_id='.$comm->e);  
                    $criteria->addCondition('next is NULL');  
                    $into=self::find($criteria);
                    if($into){
                        $into->next=$this->id;
                        $into->save();
                     $this->setAttribute('next', null);
                    $this->region_id=$next->id;
                    $this->save();
                   }
                      $this->setAttribute('next', null);
                    $this->region_id=$next->id;
                    $this->save();
            }
            else {return true;}
                return false;
	}
	private function createTree(&$list, $parent){
	   $tree = array();
	   $ordered=array();
	   $arr=array();
	  
	   foreach ($parent as $k=>$value){
				$link=chtml::link("x",array('regions/update','id'=>$value->id));
				$pos=strpos($link,"href=");
				$link=  substr($link,$pos+6, strpos($link,"\"",$pos+6)-$pos-6);
			   $arr=array('name'=>$value->name,
							'link'=>$link,
							'id'=>$value->id,
							'next'=>$value->next,
//							'position'=>$value->position,
                    );
		   if(isset($list[$value['id']])){
			   $arr['items'] = $this->createTree($list, $list[$value['id']]);
		   }
		   if(is_null($value['next']))  {
			   $ordered[]=$arr;
		   }
			 else {
				 $tree[]=$arr;
		   }
	   }
	   if(count($ordered)==0) return null;
	   $res=true;
	   $poi=$ordered[0]['id'];
	   while($res){
		  $res=false;
		  foreach ($tree as $value){
			  if($value['next']==$poi)
			  {
				  $res=true;
				  $ordered[]=$value;
				  $poi=$value['id'];
				  break;
			  }
		 }
	   }
	   return $ordered;
   }
	public function getRegionTree()
        {
	           $regArray=array();
			   
				$arri=new CActiveDataProvider($this, array('pagination'=>false));
				$arr=$arri->getData();
				$new = array();
				foreach ($arr as $a){
					$new[$a['region_id']][] = $a;
				}
				$tree = $this->createTree($new, $new['']); // changed
	
			   return $tree;
 	   
	   }
 
       public function getRegionMap()
        {
           $arr=array();
 		   $criteria=new CDbCriteria();
		   $criteria->condition="position IS NOT NULL";
		   $issues=$this->findAll($criteria);
            foreach ($issues as $value) {
                $arr[]=array('name'=>$value->name,
							'id'=>$value->id,
							'position'=>json_decode($value->position),
                    );
             }
            return $arr;
        }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Наименование',
			'region_id' => 'Регион',
			'next' => 'Идет после',
			'position' => 'Отметки',
			'nextname' => 'Идет после',
			'parentname' => 'Регион',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('region.name',$this->parentname);
		$criteria->compare('next',$this->next);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>25,),		)
	
		);
	}

}