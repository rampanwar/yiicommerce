<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $c_id
 * @property string $c_type
 * @property string $c_name
 * @property string $c_description
 * @property integer $c_parent_category_id
 * @property string $c_date_created
 * @property string $c_date_updated
 * @property string $c_deleted
 */
class Categories extends CActiveRecord
{
	public $parent_name = '';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('c_name', 'required'),
			array('c_parent_category_id', 'numerical', 'integerOnly'=>true),
			array('c_type, c_deleted', 'length', 'max'=>1),
			array('c_name', 'length', 'max'=>255),
			array('c_description, c_date_created, c_date_updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('c_id, c_type, c_name, c_description, c_parent_category_id, c_date_created, c_date_updated, c_deleted', 'safe', 'on'=>'search'),
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
			"sub_categories"=>array(self::HAS_MANY, 'Categories', 'c_parent_category_id'),
			"parent_category"=>array(self::BELONGS_TO, 'Categories', 'c_parent_category_id'),
			"child_categories"=>array(self::HAS_MANY, 'SubCategories', 'sc_category_id', 'condition'=>"c_parent_category_id > 0"),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'c_id' => 'Category ID',
			'c_type'=>'Parent OR Sub Category',
			'c_name'=>'Category Name',
			'c_description'=>'Category Description',
			'c_parent_category_id'=>'Parent Category',
			'c_date_created' => 'Date Created',
			'c_date_updated' => 'Date Updated',
			'c_deleted' => 'C Deleted',
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
		$criteria->select = array("t.*", "IF(t.c_type='1', 'SUB', 'PARENT') AS c_type", "IF(parent_category.c_id > 0, parent_category.c_name, NULL) AS parent_name");
		//$criteria->compare('c_id',$this->c_id);
		$criteria->compare('c_type',$this->c_type,true);
		$criteria->compare('c_name',$this->c_name,true);
		$criteria->compare('c_description',$this->c_description,true);
		//$criteria->compare('c_parent_category_id',$this->c_parent_category_id);
		$criteria->compare('c_date_created',$this->c_date_created,true);
		$criteria->compare('c_date_updated',$this->c_date_updated,true);
		//$criteria->compare('c_deleted',$this->c_deleted,true);
		//prd($_GET);
		$criteria->compare('parent_name',$this->parent_name);
		$criteria->with = array('parent_category');
		$criteria->condition = "t.c_deleted = '0' AND ( IF(t.c_parent_category_id > 0, parent_category.c_deleted='0', 1) )";
		$criteria->order = 't.c_id';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Categories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}