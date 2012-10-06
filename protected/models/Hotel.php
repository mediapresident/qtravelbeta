<?php

/**
 * This is the model class for table "hotel".
 *
 * The followings are the available columns in table 'hotel':
 * @property string $id
 * @property string $name
 * @property integer $holiday_group
 * @property integer $city_id
 * @property string $description
 * @property string $key_points
 * @property string $created
 * @property string $last_updated
 * @property string $status
 * @property string $meta_keywords
 * @property string $meta_description
 */
class Hotel extends CActiveRecord {

    public function behaviors() {
        return array('CSaveRelationsBehavior' => array('class' => 'application.components.CSaveRelationsBehavior'));
    }
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Hotel the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'hotel';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('city_id','required'),
        array('holiday_group, city_id', 'numerical', 'integerOnly' => true),
        array('name, meta_keywords, meta_description', 'length', 'max' => 220),
        array('status', 'length', 'max' => 8),
        array('description, created, last_updated', 'safe'),
        // The following rule is used by search().
        // Please remove those attributes that should not be searched.
        array('id, name, holiday_group, city_id, description, key_points, created, last_updated, status, meta_keywords, meta_description, holiday_group, key_points', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.

        return array(
            'images' => array(self::HAS_MANY, 'HotelImage', 'hotel_id'),
            'featuredImage' => array(self::HAS_ONE, 'HotelImage', 'hotel_id', 'on' => 'default_image = "y"'),
            'image' => array(self::HAS_ONE, 'HotelImage', 'hotel_id'),
            'city' => array(self::BELONGS_TO, 'City', 'city_id'),
            'travelPoints' => array(self::HAS_MANY, 'TravelKeyPoints', 'hotel_id'),
            'map' => array(self::HAS_MANY, 'HolidayMap', 'hotel_id',  'order' => 'position ASC')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'holiday_group' => 'Holiday Group',
            'city_id' => 'City',
            'description' => 'Description',
            'key_points' => 'Key Points',
            'created' => 'Created',
            'last_updated' => 'Last Updated',
            'status' => 'Status',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
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
        $criteria->compare('LOWER(name)', strtolower($this->name), true);
        $criteria->compare('holiday_group', $this->holiday_group);
        $criteria->compare('city_id', $this->city_id);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('key_points', $this->key_points, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('last_updated', $this->last_updated, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}