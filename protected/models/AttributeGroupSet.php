<?php

/**
 * This is the model class for table "attribute_group_set".
 *
 * The followings are the available columns in table 'attribute_group_set':
 * @property integer $ags_id
 * @property integer $ags_category_id
 * @property integer $ags_group_id
 * @property integer $ags_attribute_id
 */
class AttributeGroupSet extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'attribute_group_set';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ags_category_id, ags_group_id, ags_attribute_id', 'required'),
			array('ags_category_id, ags_group_id, ags_attribute_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ags_id, ags_category_id, ags_group_id, ags_attribute_id', 'safe', 'on'=>'search'),
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
			'ags_id' => 'Ags',
			'ags_category_id' => 'Ags Category',
			'ags_group_id' => 'Ags Group',
			'ags_attribute_id' => 'Ags Attribute',
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

		$criteria->compare('ags_id',$this->ags_id);
		$criteria->compare('ags_category_id',$this->ags_category_id);
		$criteria->compare('ags_group_id',$this->ags_group_id);
		$criteria->compare('ags_attribute_id',$this->ags_attribute_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AttributeGroupSet the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
