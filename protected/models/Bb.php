<?php

/**
 * This is the model class for table "bb".
 *
 * The followings are the available columns in table 'bb':
 * @property integer $id
 * @property string $name
 * @property integer $sides
 * @property integer $dir
 * @property double $coox
 * @property double $cooy
 * @property integer $pic
 * @property integer $region_id
 * @property integer $next
 * @property string $num
 *
 * The followings are the available model relations:
 * @property Bb $next0
 * @property Bb[] $bbs
 * @property BbSides $sides0
 * @property Regions $region
 * @property Pics[] $pics
 */
class Bb extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bb the static model class
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
		return 'bb';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sides, region_id', 'required'),
			array('sides, dir, pic, region_id, next', 'numerical', 'integerOnly'=>true),
			array('coox, cooy', 'numerical'),
			array('name', 'length', 'max'=>128),
			array('num', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, sides, dir, coox, cooy, pic, region_id, next, num', 'safe', 'on'=>'search'),
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
			'next0' => array(self::BELONGS_TO, 'Bb', 'next'),
			'bbs' => array(self::HAS_MANY, 'Bb', 'next'),
			'bbsides' => array(self::BELONGS_TO, 'BbSides', 'sides'),
			'region' => array(self::BELONGS_TO, 'Regions', 'region_id'),
			'pics' => array(self::HAS_MANY, 'Pics', 'bb_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'адрес',
			'sides' => 'тип',
			'dir' => 'Dir',
			'coox' => 'X(долгота)',
			'cooy' => 'Y(широта)',
			'pic' => 'Pic',
			'region_id' => 'регион',
			'next' => 'родитель',
			'num' => 'Код',
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
		$criteria->compare('sides',$this->sides);
		$criteria->compare('dir',$this->dir);
		$criteria->compare('coox',$this->coox);
		$criteria->compare('cooy',$this->cooy);
		$criteria->compare('pic',$this->pic);
		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('next',$this->next);
		$criteria->compare('num',$this->num,true);
 
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
		public function getValuesForType()
	{
			$arr=BbSides::model()->findAll();
			$list = CHtml::listData($arr ,'id','name'); 
			return $list;
	}

}