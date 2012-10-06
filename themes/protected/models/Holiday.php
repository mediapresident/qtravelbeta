<?php

/**
 * This is the model class for table "holiday".
 *
 * The followings are the available columns in table 'holiday':
 * @property integer $id
 * @property string $title
 * @property string $location
 * @property string $intro_text
 * @property string $full_text
 * @property string $whats_included
 * @property string $pdf
 * @property string $image
 * @property string $image2
 * @property string $image3
 * @property string $image4
 * @property integer $order
 */
class Holiday extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Holiday the static model class
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
		return 'holiday';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('order', 'numerical', 'integerOnly'=>true),
			array('title, location, intro_text', 'length', 'max'=>255),
			array('full_text, whats_included, pdf, image, image2, image3, image4', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, location, intro_text, full_text, whats_included, pdf, image, image2, image3, image4, order', 'safe', 'on'=>'search'),
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
			'location' => 'Location',
			'intro_text' => 'Intro Text',
			'full_text' => 'Full Text',
			'whats_included' => 'Whats Included',
			'pdf' => 'Pdf',
			'image' => 'Image',
			'image2' => 'Image2',
			'image3' => 'Image3',
			'image4' => 'Image4',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('intro_text',$this->intro_text,true);
		$criteria->compare('full_text',$this->full_text,true);
		$criteria->compare('whats_included',$this->whats_included,true);
		$criteria->compare('pdf',$this->pdf,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('image2',$this->image2,true);
		$criteria->compare('image3',$this->image3,true);
		$criteria->compare('image4',$this->image4,true);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}