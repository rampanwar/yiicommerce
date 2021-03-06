<?php

/**
 * This is the model class for table "regions".
 *
 * The followings are the available columns in table 'regions':
 * @property integer $regionID
 * @property string $regionName
 * @property string $shortRegion
 * @property integer $countryID
 */
class Regions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'regions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('regionID, countryID', 'numerical', 'integerOnly'=>true),
			array('regionName', 'length', 'max'=>35),
			array('shortRegion', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('regionID, regionName, shortRegion, countryID', 'safe', 'on'=>'search'),
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

				"regions"=>array(self::BELONGS_TO, 'Countries', 'countryID'),
				"cities"=>array(self::HAS_MANY,'Cities','regionID'),
				);

	}


	/**

	 * @return array customized attribute labels (name=>label)

	 */

	public function attributeLabels()
	{
		return array(
			'regionID' => 'Region',
			'regionName' => 'Region Name',
			'shortRegion' => 'Short Region',
			'countryID' => 'Country',
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

		$criteria->compare('regionID',$this->regionID);
		$criteria->compare('regionName',$this->regionName,true);
		$criteria->compare('shortRegion',$this->shortRegion,true);
		$criteria->compare('countryID',$this->countryID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Regions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
