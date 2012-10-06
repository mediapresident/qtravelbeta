<?php

/**
 * This is the model class for table "city".
 *
 * The followings are the available columns in table 'city':
 * @property string $id
 * @property string $name
 * @property integer $country_id
 * @property string $description
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $title
 * @property string $heading
 */
class City extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return City the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'city';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('country_id, description, meta_keywords, meta_description, title, heading', 'safe'),
            array('country_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 220),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, country_id, description, meta_keywords, meta_description, title, heading', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
            'hotels' => array(self::HAS_MANY, 'Hotel', 'city_id', 'condition' => 'hotels.status = "active"')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'country_id' => 'Country',
            'description' => 'Description',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'title' => 'Title',
            'heading' => 'Heading',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('country_id', $this->country_id);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('heading', $this->heading, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}