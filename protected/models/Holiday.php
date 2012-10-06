<?php

/**
 * This is the model class for table "holiday".
 *
 * The followings are the available columns in table 'holiday':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $url
 * @property integer $position
 */
class Holiday extends CActiveRecord {

    public function behaviors() {
        return array('CSaveRelationsBehavior' => array('class' => 'application.components.CSaveRelationsBehavior'));
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Holiday the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'holiday';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, description, image', 'required'),
            array('title', 'length', 'max' => 256),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id,heading, meta_keywords, meta_description,  title, description, image, url, position', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'map' => array(self::HAS_MANY, 'HolidayMap', 'holiday_id', 'order' => 'map.position ASC'),
            'hotels' => array(self::MANY_MANY, 'Hotel', 'holiday_map(holiday_id, hotel_id)')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'url' => 'External Link (optional)'
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

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('image', $this->image, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}