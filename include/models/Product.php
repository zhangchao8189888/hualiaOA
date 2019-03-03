<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $id
 * @property string $name
 * @property integer $business_id
 * @property integer $loan_type
 * @property integer $star
 * @property integer $city
 * @property integer $mortgage_type
 * @property integer $money_least
 * @property integer $money_max
 * @property integer $period_least
 * @property integer $period_max
 * @property integer $month_rate_type
 * @property integer $month_rate_least
 * @property integer $month_rate_max
 * @property string $service_cost
 * @property integer $lend_day
 * @property string $apply_condition
 * @property string $need_info
 * @property integer $identity_type
 * @property integer $income_type
 * @property integer $salary
 * @property integer $cur_work_duration
 * @property integer $social_and_fund
 * @property integer $business_location
 * @property integer $business_year
 * @property integer $credit_type
 * @property integer $is_house
 * @property integer $is_car
 * @property string $create_time
 * @property string $update_time
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('loan_type, star, create_time, update_time', 'required'),
			array('business_id, loan_type, star, city, mortgage_type, money_least, money_max, period_least, period_max, month_rate_type, month_rate_least, month_rate_max, lend_day, identity_type, income_type, salary, cur_work_duration, social_and_fund, business_location, business_year, credit_type, is_house, is_car', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>150),
			array('service_cost', 'length', 'max'=>200),
			array('apply_condition, need_info', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, business_id, loan_type, star, city, mortgage_type, money_least, money_max, period_least, period_max, month_rate_type, month_rate_least, month_rate_max, service_cost, lend_day, apply_condition, need_info, identity_type, income_type, salary, cur_work_duration, social_and_fund, business_location, business_year, credit_type, is_house, is_car, create_time, update_time', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => 'Name',
			'business_id' => 'Business',
			'loan_type' => 'Loan Type',
			'star' => 'Star',
			'city' => 'City',
			'mortgage_type' => 'Mortgage Type',
			'money_least' => 'Money Least',
			'money_max' => 'Money Max',
			'period_least' => 'Period Least',
			'period_max' => 'Period Max',
			'month_rate_type' => 'Month Rate Type',
			'month_rate_least' => 'Month Rate Least',
			'month_rate_max' => 'Month Rate Max',
			'service_cost' => 'Service Cost',
			'lend_day' => 'Lend Day',
			'apply_condition' => 'Apply Condition',
			'need_info' => 'Need Info',
			'identity_type' => 'Identity Type',
			'income_type' => 'Income Type',
			'salary' => 'Salary',
			'cur_work_duration' => 'Cur Work Duration',
			'social_and_fund' => 'Social And Fund',
			'business_location' => 'Business Location',
			'business_year' => 'Business Year',
			'credit_type' => 'Credit Type',
			'is_house' => 'Is House',
			'is_car' => 'Is Car',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('business_id',$this->business_id);
		$criteria->compare('loan_type',$this->loan_type);
		$criteria->compare('star',$this->star);
		$criteria->compare('city',$this->city);
		$criteria->compare('mortgage_type',$this->mortgage_type);
		$criteria->compare('money_least',$this->money_least);
		$criteria->compare('money_max',$this->money_max);
		$criteria->compare('period_least',$this->period_least);
		$criteria->compare('period_max',$this->period_max);
		$criteria->compare('month_rate_type',$this->month_rate_type);
		$criteria->compare('month_rate_least',$this->month_rate_least);
		$criteria->compare('month_rate_max',$this->month_rate_max);
		$criteria->compare('service_cost',$this->service_cost,true);
		$criteria->compare('lend_day',$this->lend_day);
		$criteria->compare('apply_condition',$this->apply_condition,true);
		$criteria->compare('need_info',$this->need_info,true);
		$criteria->compare('identity_type',$this->identity_type);
		$criteria->compare('income_type',$this->income_type);
		$criteria->compare('salary',$this->salary);
		$criteria->compare('cur_work_duration',$this->cur_work_duration);
		$criteria->compare('social_and_fund',$this->social_and_fund);
		$criteria->compare('business_location',$this->business_location);
		$criteria->compare('business_year',$this->business_year);
		$criteria->compare('credit_type',$this->credit_type);
		$criteria->compare('is_house',$this->is_house);
		$criteria->compare('is_car',$this->is_car);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->h_db;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
