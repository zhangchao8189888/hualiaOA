<?php

/**
 * This is the model class for table "{{user_pro}}".
 *
 * The followings are the available columns in table '{{user_pro}}':
 * @property integer $id
 * @property integer $user_id
 * @property string $pro_id
 * @property integer $recommend_base_id
 * @property integer $credit_type
 * @property integer $money
 * @property integer $period
 * @property integer $urgent
 * @property integer $is_house
 * @property integer $house_location
 * @property integer $status
 * @property string $update_time
 */
class UserPro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user_pro}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('update_time', 'required'),
			array('user_id, recommend_base_id, credit_type, money, period, urgent, is_house, house_location, status', 'numerical', 'integerOnly'=>true),
			array('pro_id', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, pro_id, recommend_base_id, credit_type, money, period, urgent, is_house, house_location, status, update_time', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'pro_id' => 'Pro',
			'recommend_base_id' => 'Recommend Base',
			'credit_type' => 'Credit Type',
			'money' => 'Money',
			'period' => 'Period',
			'urgent' => 'Urgent',
			'is_house' => 'Is House',
			'house_location' => 'House Location',
			'status' => 'Status',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('pro_id',$this->pro_id,true);
		$criteria->compare('recommend_base_id',$this->recommend_base_id);
		$criteria->compare('credit_type',$this->credit_type);
		$criteria->compare('money',$this->money);
		$criteria->compare('period',$this->period);
		$criteria->compare('urgent',$this->urgent);
		$criteria->compare('is_house',$this->is_house);
		$criteria->compare('house_location',$this->house_location);
		$criteria->compare('status',$this->status);
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
	 * @return UserPro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
