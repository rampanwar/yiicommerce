<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $p_id
 * @property integer $p_subcategory_id
 * @property integer $p_supplier_id
 * @property string $p_name
 * @property string $p_description
 * @property integer $p_manufacturer_id
 * @property string $p_manufacturere_part_number
 * @property string $p_price
 * @property integer $p_qty
 * @property string $p_discount
 * @property string $p_date_created
 * @property string $p_date_updated
 * @property string $p_deleted
 */
class Products extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('p_subcategory_id, p_supplier_id, p_name, p_description, p_manufacturer_id, p_manufacturere_part_number, p_used, p_price, p_qty, p_country, p_state, p_city', 'required'),
			array('p_subcategory_id, p_supplier_id, p_manufacturer_id, p_qty, p_country, p_state, p_city', 'numerical', 'integerOnly'=>true),
			array('p_name, p_sku', 'length', 'max'=>255),
			array('p_manufacturere_part_number', 'length', 'max'=>45),
			array('p_price', 'length', 'max'=>11),
			array('p_discount', 'length', 'max'=>5),
			array('p_used, p_deleted', 'length', 'max'=>1),
			array('p_date_created, p_date_updated', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('p_id, p_subcategory_id, p_supplier_id, p_name, p_description, p_manufacturer_id, p_manufacturere_part_number, p_price, p_qty, p_discount, p_date_created, p_date_updated, p_deleted', 'safe', 'on'=>'search'),
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
			"product_supplier"=>array(self::BELONGS_TO, 'Users', 'p_supplier_id'),
			"product_category"=>array(self::BELONGS_TO, 'SubCategories', 'p_subcategory_id'),
			"order_product"=>array(self::HAS_MANY, 'Orders', 'o_product_id'),
			"product_attribute_data"=>array(self::HAS_MANY, 'ProductAttributesData', 'pad_product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'p_id' => 'P',
			'p_subcategory_id' => 'SubCategory',
			'p_supplier_id' => 'Supplier',
			'p_name' => 'Name',
			'p_description' => 'Description',
			'p_sku' => 'Sku',
			'p_manufacturer_id' => 'Manufacturer',
			'p_manufacturere_part_number' => 'Manufacturere Part Number',
			'p_used'=> 'Status',
			'p_price' => 'Price',
			'p_qty' => 'Qty',
			'p_discount' => 'Discount',
			'p_country' => 'Product Country',
			'p_state' => 'Product State',
			'p_city' => 'Product City',
			'p_date_created' => 'P Date Created',
			'p_date_updated' => 'P Date Updated',
			'p_deleted' => 'P Deleted',
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

		$criteria->compare('p_id',$this->p_id);
		$criteria->compare('p_subcategory_id',$this->p_subcategory_id);
		$criteria->compare('p_supplier_id',$this->p_supplier_id);
		$criteria->compare('p_name',$this->p_name,true);
		$criteria->compare('p_description',$this->p_description,true);
		$criteria->compare('p_manufacturer_id',$this->p_manufacturer_id);
		$criteria->compare('p_manufacturere_part_number',$this->p_manufacturere_part_number,true);
		$criteria->compare('p_price',$this->p_price,true);
		$criteria->compare('p_qty',$this->p_qty);
		$criteria->compare('p_discount',$this->p_discount,true);
		$criteria->compare('p_date_created',$this->p_date_created,true);
		$criteria->compare('p_date_updated',$this->p_date_updated,true);
		$criteria->compare('p_deleted',$this->p_deleted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
