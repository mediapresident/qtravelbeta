<?php

/**
 * This is the model class for table "press".
 *
 * The followings are the available columns in table 'press':
 * @property integer $id
 * @property string $title
 * @property string $sub_title
 * @property string $thumbnail
 * @property string $main_image
 * @property integer $orders
 * @property integer $month
 * @property integer $year
 */
class Press extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Press the static model class
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
		return 'press';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('month, year', 'required'),
			array('orders, month, year', 'numerical', 'integerOnly'=>true),
			array('title, sub_title, thumbnail, main_image', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, sub_title, thumbnail, main_image, orders, month, year', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'sub_title' => 'Sub Title',
			'thumbnail' => 'Thumbnail',
			'main_image' => 'Main Image',
			'orders' => 'Orders',
			'month' => 'Month',
			'year' => 'Year',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('sub_title',$this->sub_title,true);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('main_image',$this->main_image,true);
		$criteria->compare('orders',$this->orders);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function beforeSave(){
            if($this->main_image)$this->thumbnail = dirname($this->main_image).'/thumb/'.basename($this->main_image);
            return true;
        }
}