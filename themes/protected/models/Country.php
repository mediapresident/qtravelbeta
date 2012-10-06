<?php

/**
 * This is the model class for table "country".
 *
 * The followings are the available columns in table 'country':
 * @property string $id
 * @property string $name
 * @property integer $region_id
 * @property string $thumbnail
 * @property string $description
 * @property string $meta_keywords
 * @property string $meta_description
 */
class Country extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Country the static model class
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
		return 'country';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('thumbnail, description, meta_keywords, meta_description', 'required'),
			array('region_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>220),
			array('thumbnail, meta_keywords, meta_description', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, region_id, thumbnail, description, meta_keywords, meta_description, title', 'safe', 'on'=>'search'),
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
                    'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
                    'cities' => array(self::HAS_MANY, 'City', 'country_id'),
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
			'region_id' => 'Region',
			'thumbnail' => 'Thumbnail',
			'description' => 'Description',
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
		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}