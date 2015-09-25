<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class FindForm extends CFormModel
{
	public $r_id;
	public $bb_id;	
	public $side_id;


	/**
	 * Declares the validation rules.
	 */
	public function valid()
	{
		if($this->validate())
		{
//			$criteria=new CDbCriteria;
//			$criteria->compare('num',''.$this->r_id.'.'.$this->bb_id,true);
//			$bb=Bb::model()->find($criteria); 
//			return $bb;
			$connection=Yii::app()->db; 
			$str="SELECT DISTINCTROW bb.id, sides.ord 
				FROM (bb_sides INNER JOIN bb ON bb_sides.id=bb.sides) INNER JOIN sides ON sides.bb_s_id =bb_sides.id
				WHERE (bb.num LIKE '".$this->r_id.'.'.$this->bb_id."%') AND (UPPER(sides.name) LIKE UPPER('".$this->side_id."'))";	
			$command=$connection->createCommand($str);
			$dataReader=$command->query();
			if(!is_null($dataReader))
				foreach ($dataReader as $row)
					return array($row['id'],$row['ord']);
			else
				return null;
		}
		return null;
			
	}
	
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('r_id, bb_id', 'required'),
			array('side_id', 'safe'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'r_id'=>'Рег.',
			'bb_id'=>'№',
			'side_id'=>'ст.',

		);
	}
}