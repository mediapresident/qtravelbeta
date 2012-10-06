<?php

/**
 * This is the model class for table "region".
 *
 * The followings are the available columns in table 'region':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $thumbnail
 * @property integer $show_hp
 * @property string $meta_keywords
 * @property string $meta_description
 */
class Region extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Region the static model class
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
		return 'region';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('show_hp, meta_keywords, meta_description', 'required'),
			array('show_hp', 'numerical', 'integerOnly'=>true),
			array('name, title, meta_keywords, meta_description', 'length', 'max'=>220),
			array('description, thumbnail', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, thumbnail, show_hp, meta_keywords, meta_description, title', 'safe', 'on'=>'search'),
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
                    
                    'countries' => array(self::HAS_MANY, 'Country', 'region_id'),
                    'cities' => array(self::HAS_MANY, 'City', array('id' => 'country_id'), 'through' => 'countries'),
                    'hotels' => array(self::HAS_MANY, 'Hotel', array('id' => 'city_id'), 'through' => 'cities')
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
			'description' => 'Description',
			'thumbnail' => 'Thumbnail',
			'show_hp' => 'Show Hp',
			'meta_keywords' => 'Meta Keywords',
			'meta_description' => 'Meta Description',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('show_hp',$this->show_hp);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}