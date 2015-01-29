<?php

/**
 * This is the model class for table "user_payment_methods".
 *
 * The followings are the available columns in table 'user_payment_methods':
 * @property integer $upm_id
 * @property integer $upm_payment_id
 * @property integer $upm_supplier_id
 */
class UserPaymentMethods extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_payment_methods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('upm_payment_id, upm_supplier_id', 'required'),
			array('upm_payment_id, upm_supplier_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('upm_id, upm_payment_id, upm_supplier_id', 'safe', 'on'=>'search'),
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
			"user_payment_methods"=>array(self::BELONGS_TO, 'Users', 'upm_supplier_id'),
			"payment_methods"=>array(self::BELONGS_TO, 'PaymentMethods', 'upm_payment_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'upm_id' => 'Upm',
			'upm_payment_id' => 'Upm Payment',
			'upm_supplier_id' => 'Upm Supplier',
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

		$criteria->compare('upm_id',$this->upm_id);
		$criteria->compare('upm_payment_id',$this->upm_payment_id);
		$criteria->compare('upm_supplier_id',$this->upm_supplier_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserPaymentMethods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
