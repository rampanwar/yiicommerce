<?php

/**
 * This is the model class for table "product_attributes_data".
 *
 * The followings are the available columns in table 'product_attributes_data':
 * @property integer $pad_id
 * @property integer $pad_product_id
 * @property integer $pad_attribute_id
 * @property integer $pad_unit_id
 * @property string $pad_data
 */
class ProductAttributesData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_attributes_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pad_id, pad_product_id, pad_attribute_id, pad_data', 'required'),
			array('pad_id, pad_product_id, pad_attribute_id, pad_unit_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pad_id, pad_product_id, pad_attribute_id, pad_unit_id, pad_data', 'safe', 'on'=>'search'),
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
			"product_attribute_data"=>array(self::BELONGS_TO, 'Products', 'pad_product_id'),
			"product_attribute"=>array(self::BELONGS_TO, 'Attributes', 'pad_attribute_id'),
			"product_attribute_unit"=>array(self::BELONGS_TO, 'AttributeUnits', 'pad_unit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pad_id' => 'Pad',
			'pad_product_id' => 'Pad Product',
			'pad_attribute_id' => 'Pad Attribute',
			'pad_unit_id' => 'Pad Unit',
			'pad_data' => 'Pad Data',
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

		$criteria->compare('pad_id',$this->pad_id);
		$criteria->compare('pad_product_id',$this->pad_product_id);
		$criteria->compare('pad_attribute_id',$this->pad_attribute_id);
		$criteria->compare('pad_unit_id',$this->pad_unit_id);
		$criteria->compare('pad_data',$this->pad_data,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductAttributesData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
