<?php

/**
 * This is the model class for table "pics".
 *
 * The followings are the available columns in table 'pics':
 * @property integer $id
 * @property string $name
 * @property integer $side
 * @property integer $bb_id
 * @property string $ptype
 *
 * The followings are the available model relations:
 * @property Bb $bb
 */
class Pics extends CActiveRecord
{
 	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pics the static model class
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
		return 'pics';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, side, bb_id', 'required'),
			array('side, bb_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('ptype', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, side, bb_id, ptype', 'safe', 'on'=>'search'),
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
			'bb' => array(self::BELONGS_TO, 'Bb', 'bb_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Имя файла',
			'side' => 'Сторона',
			'bb_id' => 'Щит №',
			'ptype' => 'Тип',
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
		$criteria->compare('side',$this->side);
		$criteria->compare('bb_id',$this->bb_id);
		$criteria->compare('ptype',$this->ptype,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}