<?php

Yii::import('application.models._base.BaseProduct');

class Product extends BaseProduct
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

		public function rules() {
		return array(
			array('name, type, quality, height, width, producer_id, price, status, acquisition_date', 'required'),
			array('height, width, producer_id, price', 'numerical', 'integerOnly'=>true),
			array('name, type, image', 'length', 'max'=>30),
			array('quality, status', 'length', 'max'=>10),
			array('id, name, type, quality, height, width, producer_id, price, status, image, remarks, acquisition_date', 'safe', 'on'=>'search'),
		);
	}
	public static function representingColumn() {
		return 'id';
	}
}