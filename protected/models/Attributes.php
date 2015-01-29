<?php

/**
 * This is the model class for table "attributes".
 *
 * The followings are the available columns in table 'attributes':
 * @property integer $a_id
 * @property string $a_name
 * @property string $a_selection
 * @property string $a_date_created
 * @property string $a_date_updated
 */
class Attributes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'attributes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('a_name, a_selection', 'required'),
			array('a_name', 'length', 'max'=>255),
			array('a_selection', 'length', 'max'=>1),
			array('a_date_created, a_date_updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('a_id, a_name, a_selection, a_date_created, a_date_updated', 'safe', 'on'=>'search'),
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
			"attribute_units"=>array(self::HAS_MANY, 'AttributeUnits', 'au_attribute_id'),
			"attribute_data"=>array(self::HAS_MANY, 'AttributeData', 'ad_attribute_id'),
			"attributes_category"=>array(self::HAS_MANY, 'CategoryAttributes', 'ca_attribute_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'a_id' => 'A',
			'a_name' => 'Attribute Name',
			'a_selection' => 'Attribute Type',
			'a_date_created' => 'A Date Created',
			'a_date_updated' => 'A Date Updated',
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

		$criteria->compare('a_id',$this->a_id);
		$criteria->compare('a_name',$this->a_name,true);
		$criteria->compare('a_selection',$this->a_selection,true);
		$criteria->compare('a_date_created',$this->a_date_created,true);
		$criteria->compare('a_date_updated',$this->a_date_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Attributes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
