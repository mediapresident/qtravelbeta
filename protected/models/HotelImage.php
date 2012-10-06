<?php

/**
 * This is the model class for table "hotel_image".
 *
 * The followings are the available columns in table 'hotel_image':
 * @property string $id
 * @property integer $hotel_id
 * @property string $thumbnail_url
 * @property string $main_url
 * @property string $original_url
 * @property string $default_image
 * @property integer $order
 */
class HotelImage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HotelImage the static model class
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
		return 'hotel_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hotel_id, order', 'numerical', 'integerOnly'=>true),
			array('thumbnail_url, main_url, original_url', 'length', 'max'=>220),
			array('default_image', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, hotel_id, thumbnail_url, main_url, original_url, default_image, order', 'safe', 'on'=>'search'),
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
			'thumbnail_url' => 'Thumbnail Url',
			'main_url' => 'Main Url',
			'original_url' => 'Original Url',
			'default_image' => 'Default Image',
			'order' => 'Order',
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
		$criteria->compare('thumbnail_url',$this->thumbnail_url,true);
		$criteria->compare('main_url',$this->main_url,true);
		$criteria->compare('original_url',$this->original_url,true);
		$criteria->compare('default_image',$this->default_image,true);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}