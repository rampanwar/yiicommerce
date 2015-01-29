<?php

/**
 * This is the model class for table "attribute_units".
 *
 * The followings are the available columns in table 'attribute_units':
 * @property integer $au_id
 * @property integer $au_attribute_id
 * @property string $au_name
 */
class AttributeUnits extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'attribute_units';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('au_id, au_attribute_id, au_name', 'required'),
			array('au_id, au_attribute_id', 'numerical', 'integerOnly'=>true),
			array('au_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('au_id, au_attribute_id, au_name', 'safe', 'on'=>'search'),
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
			"attribute_units"=>array(self::BELONGS_TO, 'Attributes', 'au_attribute_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'au_id' => 'Au',
			'au_attribute_id' => 'Au Attribute',
			'au_name' => 'Au Name',
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

		$criteria->compare('au_id',$this->au_id);
		$criteria->compare('au_attribute_id',$this->au_attribute_id);
		$criteria->compare('au_name',$this->au_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AttributeUnits the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
