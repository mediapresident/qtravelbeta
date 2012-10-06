<?php

/**
 * This is the model class for table "continent".
 *
 * The followings are the available columns in table 'continent':
 * @property integer $id
 * @property string $slug
 * @property string $code
 * @property string $heading
 * @property string $title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $content
 */
class Continent extends CActiveRecord {
    
    const ACTIVE = 1;
    const DISABLED = 0;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Continent the static model class
     */
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'continent';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('code', 'required'),
            array('slug, heading', 'length', 'max' => 255),
            array('code', 'length', 'max' => 2),
            array('title, meta_keywords, meta_description, content, office_id,state', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, slug, code, heading, title, meta_keywords, meta_description, content', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'office' => array(self::BELONGS_TO, 'Office', 'office_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'slug' => 'Slug',
            'code' => 'Code',
            'heading' => 'Heading',
            'title' => 'Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'content' => 'Content',
            'office_id' => 'Office',
            'state' => 'State'
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
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('heading', $this->heading, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        $criteria->compare('content', $this->content, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }
    
    public function getStates(){
        return array(self::ACTIVE => 'Active', self::DISABLED => 'Disabled');
    }
}