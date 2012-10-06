<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property string $title
 * @property string $heading
 * @property string $url
 * @property string $keywords
 * @property string $template
 * @property string $description
 * @property string $content
 * @property integer $editable
 * @property integer $navigation
 * @property integer $parent
 * @property integer $ordering
 * @property integer $status
 * @property string $dateCreated
 */
class Page extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pages the static model class
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
		return 'page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('editable, navigation, parent, ordering, status', 'numerical', 'integerOnly'=>true),
			array('title, url, template', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, heading, url, keywords, template, description, content, editable, navigation, parent, ordering, status, dateCreated', 'safe', 'on'=>'search'),
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
			'heading' => 'Heading',
			'url' => 'Url',
			'keywords' => 'Keywords',
			'template' => 'Template',
			'description' => 'Description',
			'content' => 'Content',
			'editable' => 'Editable',
			'navigation' => 'Navigation',
			'parent' => 'Parent',
			'ordering' => 'Ordering',
			'status' => 'Status',
			'dateCreated' => 'Date Created',
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
		$criteria->compare('heading',$this->heading,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('template',$this->template,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('editable',$this->editable);
		$criteria->compare('navigation',$this->navigation);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('ordering',$this->ordering);
		$criteria->compare('status',$this->status);
		$criteria->compare('dateCreated',$this->dateCreated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}