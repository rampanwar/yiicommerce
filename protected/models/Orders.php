<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $o_id
 * @property integer $o_customer_id
 * @property integer $o_product_id
 * @property integer $o_supplier_id
 * @property integer $o_payment_id
 * @property integer $o_shipper_id
 * @property string $o_order_placed
 * @property string $o_order_shipped
 * @property string $o_order_completed
 * @property string $o_status
 * @property string $o_price
 * @property integer $o_qty
 * @property string $o_discount
 * @property integer $o_total
 */
class Orders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('o_customer_id, o_product_id, o_supplier_id, o_payment_id, o_price, o_qty, o_total', 'required'),
			array('o_customer_id, o_product_id, o_supplier_id, o_payment_id, o_shipper_id, o_qty, o_total', 'numerical', 'integerOnly'=>true),
			array('o_status', 'length', 'max'=>1),
			array('o_price', 'length', 'max'=>11),
			array('o_discount', 'length', 'max'=>5),
			array('o_order_placed, o_order_shipped, o_order_completed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('o_id, o_customer_id, o_product_id, o_supplier_id, o_payment_id, o_shipper_id, o_order_placed, o_order_shipped, o_order_completed, o_status, o_price, o_qty, o_discount, o_total', 'safe', 'on'=>'search'),
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
			"customer_orders"=>array(self::BELONGS_TO, 'Users', 'o_customer_id'),
			"supplier_orders"=>array(self::BELONGS_TO, 'Users', 'o_supplier_id'),
			"order_product"=>array(self::BELONGS_TO, 'Products', 'o_product_id'),
			"order_payment"=>array(self::BELONGS_TO, 'PaymentMethods', 'o_payment_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'o_id' => 'O',
			'o_customer_id' => 'O Customer',
			'o_product_id' => 'O Product',
			'o_supplier_id' => 'O Supplier',
			'o_payment_id' => 'O Payment',
			'o_shipper_id' => 'O Shipper',
			'o_order_placed' => 'O Order Placed',
			'o_order_shipped' => 'O Order Shipped',
			'o_order_completed' => 'O Order Completed',
			'o_status' => 'O Status',
			'o_price' => 'O Price',
			'o_qty' => 'O Qty',
			'o_discount' => 'O Discount',
			'o_total' => 'O Total',
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

		$criteria->compare('o_id',$this->o_id);
		$criteria->compare('o_customer_id',$this->o_customer_id);
		$criteria->compare('o_product_id',$this->o_product_id);
		$criteria->compare('o_supplier_id',$this->o_supplier_id);
		$criteria->compare('o_payment_id',$this->o_payment_id);
		$criteria->compare('o_shipper_id',$this->o_shipper_id);
		$criteria->compare('o_order_placed',$this->o_order_placed,true);
		$criteria->compare('o_order_shipped',$this->o_order_shipped,true);
		$criteria->compare('o_order_completed',$this->o_order_completed,true);
		$criteria->compare('o_status',$this->o_status,true);
		$criteria->compare('o_price',$this->o_price,true);
		$criteria->compare('o_qty',$this->o_qty);
		$criteria->compare('o_discount',$this->o_discount,true);
		$criteria->compare('o_total',$this->o_total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
