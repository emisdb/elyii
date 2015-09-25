<?php

/**
 * This is the model class for table "sides".
 *
 * The followings are the available columns in table 'sides':
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property integer $bb_s_id
 * @property integer $ord
 *
 * The followings are the available model relations:
 * @property BbSides $bbS
 */
class Sides extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sides the static model class
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
		return 'sides';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, text, bb_s_id, ord', 'required'),
			array('bb_s_id, ord', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>8),
			array('text', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, text, bb_s_id, ord', 'safe', 'on'=>'search'),
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
			'bbS' => array(self::BELONGS_TO, 'BbSides', 'bb_s_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'text' => 'Text',
			'bb_s_id' => 'Bb S',
			'ord' => 'Ord',
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
		$criteria->compare('text',$this->text,true);
		$criteria->compare('bb_s_id',$this->bb_s_id);
		$criteria->compare('ord',$this->ord);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}