<?php

/**
 * This is the model class for table "category_attributes".
 *
 * The followings are the available columns in table 'category_attributes':
 * @property integer $ca_id
 * @property integer $ca_subcategory_id
 * @property integer $ca_attribute_id
 */
class CategoryAttributes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category_attributes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ca_subcategory_id, ca_attribute_id', 'required'),
			array('ca_subcategory_id, ca_attribute_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ca_id, ca_subcategory_id, ca_attribute_id', 'safe', 'on'=>'search'),
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
			"category_attributes"=>array(self::BELONGS_TO, 'SubCategories', 'ca_subcategory_id'),
			"attributes_category"=>array(self::BELONGS_TO, 'Attributes', 'ca_attribute_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ca_id' => 'Ca',
			'ca_subcategory_id' => 'Ca Category',
			'ca_attribute_id' => 'Ca Attribute',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ca_id',$this->ca_id);
		$criteria->compare('ca_subcategory_id',$this->ca_subcategory_id);
		$criteria->compare('ca_attribute_id',$this->ca_attribute_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoryAttributes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
