<?php

/**
 * This is the model class for table "sub_categories".
 *
 * The followings are the available columns in table 'sub_categories':
 * @property integer $sc_id
 * @property string $sc_name
 * @property string $sc_description
 * @property integer $sc_category_id
 * @property string $sc_date_created
 * @property string $sc_date_updated
 */
class SubCategories extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sub_categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sc_name, sc_description, sc_category_id', 'required'),
			array('sc_category_id', 'numerical', 'integerOnly'=>true),
			array('sc_name', 'length', 'max'=>255),
			array('sc_date_created, sc_date_updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sc_id, sc_name, sc_description, sc_category_id, sc_date_created, sc_date_updated', 'safe', 'on'=>'search'),
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
			"parent_category"=>array(self::BELONGS_TO, 'Categories', 'sc_category_id'),
			"product_category"=>array(self::HAS_MANY, 'Products', 'p_subcategory_id'),
			"category_attributes"=>array(self::HAS_MANY, 'CategoryAttributes', 'ca_subcategory_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sc_id' => 'Sc',
			'sc_name' => 'Child Category Name',
			'sc_description' => 'Child Category Description',
			'sc_category_id' => 'Parent Category',
			'sc_date_created' => 'Sc Date Created',
			'sc_date_updated' => 'Sc Date Updated',
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

		$criteria->compare('sc_id',$this->sc_id);
		$criteria->compare('sc_name',$this->sc_name,true);
		$criteria->compare('sc_description',$this->sc_description,true);
		$criteria->compare('sc_category_id',$this->sc_category_id);
		$criteria->compare('sc_date_created',$this->sc_date_created,true);
		$criteria->compare('sc_date_updated',$this->sc_date_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SubCategories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
