<?php

/**
 * This is the model class for table "holiday_map".
 *
 * The followings are the available columns in table 'holiday_map':
 * @property integer $id
 * @property integer $holiday_id
 * @property integer $hotel_id
 * @property integer $position
 * @property integer $description
 */
class HolidayMap extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HolidayMap the static model class
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
		return 'holiday_map';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, holiday_id, hotel_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, holiday_id, hotel_id, position, description', 'safe'),
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
                    'holiday' => array(self::BELONGS_TO, 'Holiday', 'holiday_id'),
                    'hotel' => array(self::BELONGS_TO, 'Hotel', 'hotel_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'holiday_id' => 'Holiday',
			'hotel_id' => 'Hotel',
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
		$criteria->compare('holiday_id',$this->holiday_id);
		$criteria->compare('hotel_id',$this->hotel_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}