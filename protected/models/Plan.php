<?php

/**
 * This is the model class for table "plan".
 *
 * The followings are the available columns in table 'plan':
 * @property integer $id
 * @property double $coox
 * @property double $cooy
 * @property integer $region_id
 * @property integer $next
 * @property string $ptype
 *
 * The followings are the available model relations:
 * @property Regions $region
 * @property Plan $next0
 * @property Plan[] $plans
 */
class Plan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Plan the static model class
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
		return 'plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coox, cooy, region_id', 'required'),
//			array('region_id', 'numerical', 'integerOnly'=>true),
			array('region_id, next', 'numerical', 'integerOnly'=>true),
			array('coox, cooy', 'numerical'),
			array('ptype', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, coox, cooy, region_id, next, ptype', 'safe', 'on'=>'search'),
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
			'region' => array(self::BELONGS_TO, 'Regions', 'region_id'),
			'next0' => array(self::BELONGS_TO, 'Plan', 'next'),
			'plans' => array(self::HAS_MANY, 'Plan', 'next'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '№',
			'coox' => 'X(долгота)',
			'cooy' => 'Y(широта)',
			'region_id' => 'регион',
			'next' => 'родитель',
			'ptype' => 'тип',
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
		$criteria->compare('coox',$this->coox);
		$criteria->compare('cooy',$this->cooy);
		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('next',$this->next);
		$criteria->compare('ptype',$this->ptype,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>25,),		)
		);
	}
/*	public function behaviors()
	{
	    return array(
			'nestedSetBehavior'=>array(
				'class'=>'ext.NestedSetBehavior',
				'leftAttribute'=>'next',
			 ),
		);
	
	}
	*/
}