<?php

/**
 * This is the model class for table "users".
 *
 */
class Users extends CActiveRecord
{
	public $user_name = '';
	public $u_pass_confirm = '';
	public $captcha_code = '';
	public $reset_password=0;
	public $u_code="";
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('u_email, u_pass, u_pphone, u_address_main, u_main_country, u_main_state, u_main_city', 'required'),
			array('u_main_country, u_main_state, u_main_city', 'numerical', 'integerOnly'=>true),
			array('u_email, u_fname, u_lname, u_organization_name, u_main_landmark, u_billing_landmark, u_shipping_landmark', 'length', 'max'=>255),
			array('u_email', 'email'),
			array('u_email', 'unique', 'criteria'=>array('condition'=>"u_deleted='0'"), 'message'=>"Email already exists."),
			array('u_gender', 'length', 'max'=>1),
			array('u_role, u_type', 'required', 'on'=>'register', 'message'=>"Select your account type."),
			array('u_role', 'match', 'pattern'=>"/(buyer|supplier)/", 'message'=>"Select your account type."),
			
			array('u_pass, u_pass_confirm', 'length', 'max'=>20, 'min'=>8),
			array('u_salt', 'length', 'max'=>512),
			array('u_pass_confirm', 'required', 'on'=>'register'),
			array('u_pass_confirm', 'compare', 'compareAttribute'=>'u_pass', 'on'=>'register'),
			array('u_pass, u_pass_confirm', 'match', 'pattern'=>"/(?=.*\d)(?=.*[A-z]).{8,}/", 'message'=>"Password must contain atleast 1 numeber, 1 upper case and one lower case letter."),
			
			array('captcha_code', 'required', 'on'=>'register'),
			array('captcha_code', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'register'),
			
			array('u_pphone, u_sphone', 'length', 'max'=>10),
			array('u_pphone, u_sphone', 'numerical', 'integerOnly'=>true),
			array('u_main_pin, u_billing_pin, u_shipping_pin', 'length', 'max'=>25),
			array('u_date_created, u_date_updated', 'safe'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('u_id, u_email, u_role, u_fname, u_pass, u_lname, u_organization_name, u_gender, u_pphone, u_sphone, u_address_main, u_main_landmark, u_main_country, u_main_state, u_main_city, u_main_pin, u_address_billing, u_billing_landmark, u_billing_country, u_billing_state, u_billing_city, u_billing_pin, u_address_shipping, u_shipping_landmark, u_shipping_country, u_shipping_state, u_shipping_city, u_shipping_pin, u_date_created, u_date_updated, u_deleted', 'safe', 'on'=>'search'),
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
			"user_payment_methods"=>array(self::HAS_MANY, 'UserPaymentMethods', 'upm_supplier_id'),
			"product_supplier"=>array(self::HAS_MANY, 'Products', 'p_supplier_id'),
			"customer_orders"=>array(self::HAS_MANY, 'Orders', 'o_customer_id'),
			"supplier_orders"=>array(self::HAS_MANY, 'Orders', 'o_supplier_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'u_id' => 'U',
			'u_email' => 'User Email',
			'u_role' => 'I am a',
			'u_fname' => 'Contact Name',
			'u_pass' => 'Password',
			'u_pass_confirm' => 'Confirm Password',
			'u_lname' => 'Last Name',
			'u_organization_name' => 'Organization',
			'u_gender' => 'Gender',
			'u_pphone' => 'Mobile Phone',
			'u_sphone' => 'Alternate Phone',
			'u_address_main' => 'Primary Address',
			'u_main_landmark' => 'Landmark',
			'u_main_country' => 'Country',
			'u_main_state' => 'State',
			'u_main_city' => 'City',
			'u_main_pin' => 'Pin Code',
			'u_address_billing' => 'Billing Address',
			'u_billing_landmark' => 'Landmark',
			'u_billing_country' => 'Country',
			'u_billing_state' => 'State',
			'u_billing_city' => 'City',
			'u_billing_pin' => 'Pin Code',
			'u_address_shipping' => 'Shipping Address',
			'u_shipping_landmark' => 'Landmark',
			'u_shipping_country' => 'Country',
			'u_shipping_state' => 'State',
			'u_shipping_city' => 'City',
			'u_shipping_pin' => 'Pin Code',
			'u_date_created' => 'U Date Created',
			'u_date_updated' => 'U Date Updated',
			'u_deleted' => 'U Deleted',
			'u_code' => 'Enter Code',
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

		$criteria->compare('u_id',$this->u_id);
		$criteria->compare('u_email',$this->u_email,true);
		$criteria->compare('u_role',$this->u_role,true);
		$criteria->compare('u_fname',$this->u_fname,true);
		$criteria->compare('u_pass',$this->u_pass,true);
		$criteria->compare('u_lname',$this->u_lname,true);
		$criteria->compare('u_organization_name',$this->u_organization_name,true);
		$criteria->compare('u_gender',$this->u_gender,true);
		$criteria->compare('u_pphone',$this->u_pphone,true);
		$criteria->compare('u_sphone',$this->u_sphone,true);
		$criteria->compare('u_address_main',$this->u_address_main,true);
		$criteria->compare('u_main_landmark',$this->u_main_landmark,true);
		$criteria->compare('u_main_country',$this->u_main_country);
		$criteria->compare('u_main_state',$this->u_main_state);
		$criteria->compare('u_main_city',$this->u_main_city);
		$criteria->compare('u_main_pin',$this->u_main_pin,true);
		$criteria->compare('u_address_billing',$this->u_address_billing,true);
		$criteria->compare('u_billing_landmark',$this->u_billing_landmark,true);
		$criteria->compare('u_billing_country',$this->u_billing_country);
		$criteria->compare('u_billing_state',$this->u_billing_state);
		$criteria->compare('u_billing_city',$this->u_billing_city);
		$criteria->compare('u_billing_pin',$this->u_billing_pin,true);
		$criteria->compare('u_address_shipping',$this->u_address_shipping,true);
		$criteria->compare('u_shipping_landmark',$this->u_shipping_landmark,true);
		$criteria->compare('u_shipping_country',$this->u_shipping_country);
		$criteria->compare('u_shipping_state',$this->u_shipping_state);
		$criteria->compare('u_shipping_city',$this->u_shipping_city);
		$criteria->compare('u_shipping_pin',$this->u_shipping_pin,true);
		$criteria->compare('u_date_created',$this->u_date_created,true);
		$criteria->compare('u_date_updated',$this->u_date_updated,true);
		$criteria->compare('u_deleted',$this->u_deleted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function afterFind()
	{
		if($this->u_type=='1'){
			$this->user_name = $this->u_organization_name;
		}else{
			$this->user_name = $this->u_fname. ' '. $this->u_lname;
		}
	}
	protected function beforeSave()
	{
		if($this->isNewRecord || $this->reset_password===1) {
//			pr($this->u_pass);
			$this->u_salt = md5(rand(8,20));
//			pr($this->u_salt);
			$this->u_pass = md5($this->u_pass.$this->u_salt);
//			pr($this->u_pass);
		}
		return parent::beforeSave();
	}
	
}