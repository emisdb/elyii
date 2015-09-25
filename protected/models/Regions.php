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
       public function getRegionTree($model=null)
        {
            $issuesArray=array();
            if(is_null($model)) $issues=$this->regions_null;
            else $issues=$model->regions;
            foreach ($issues as $value) {
                $arr=array('name'=>$value->name,
							'id'=>$value->id,
							'next'=>$value->next,
							'position'=>$value->position,
                    );
                if(count($value->regions)>0) $arr['items']=$this->getRegionTree($value);
               $issuesArray[]=$arr; 
            }
            return $issuesArray;
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
			'region_id' => 'Region',
			'next' => 'Next',
			'position' => 'Отметки',
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