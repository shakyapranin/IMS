<?php

Yii::import('application.models._base.BaseProducer');

class Producer extends BaseProducer
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

		public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'number' => Yii::t('app', 'Phone Number'),
			'address' => Yii::t('app', 'Address'),
			'products' => null,
		);
	}

		public function rules() {
		return array(
			array('name, number', 'required'),
			array('name', 'length', 'max'=>30),
			array('number', 'length', 'max'=>100),
			array('address', 'length', 'max'=>50),
			array('id, name, number, address', 'safe', 'on'=>'search'),
		);
	}
}