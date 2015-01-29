<?php

/**
 * This is the model class for table "attribute_data".
 *
 * The followings are the available columns in table 'attribute_data':
 * @property integer $ad_id
 * @property integer $ad_attribute_id
 * @property string $ad_value
 * @property string $ad_is_default
 */
class AttributeData extends CActiveRecord
{
	public $ad_delete='';
	public $ad_new='';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'attribute_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ad_attribute_id, ad_value', 'required'),
			array('ad_attribute_id', 'numerical', 'integerOnly'=>true),
			array('ad_value', 'length', 'max'=>255),
			array('ad_is_default', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ad_id, ad_attribute_id, ad_value, ad_is_default', 'safe', 'on'=>'search'),
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
			"attribute_data"=>array(self::BELONGS_TO, 'Attributes', 'ad_attribute_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ad_id' => 'Ad',
			'ad_attribute_id' => 'Attribute Name',
			'ad_value' => 'Values',
			'ad_is_default' => 'Ad Is Default',
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

		$criteria->compare('ad_id',$this->ad_id);
		$criteria->compare('ad_attribute_id',$this->ad_attribute_id);
		$criteria->compare('ad_value',$this->ad_value,true);
		$criteria->compare('ad_is_default',$this->ad_is_default,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AttributeData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
