<?php

/**
 * This is the model class for table "offer".
 *
 * The followings are the available columns in table 'offer':
 * @property string $id
 * @property integer $hotel_id
 * @property string $offer
 * @property string $expiry
 * @property integer $position
 * @property integer $live
 */
class Offer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Offer the static model class
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
		return 'offer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('position, live', 'required'),
			array('hotel_id, position, live', 'numerical', 'integerOnly'=>true),
			array('expiry', 'length', 'max'=>10),
			array('offer', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, hotel_id, offer, expiry, position, live', 'safe', 'on'=>'search'),
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
			'hotel_id' => 'Hotel',
			'offer' => 'Offer',
			'expiry' => 'Expiry',
			'position' => 'Position',
			'live' => 'Live',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('hotel_id',$this->hotel_id);
		$criteria->compare('offer',$this->offer,true);
		$criteria->compare('expiry',$this->expiry,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('live',$this->live);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}