<?php

/**
 * This is the model base class for the table "tbl_producer".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Producer".
 *
 * Columns in table "tbl_producer" available as properties of the model,
 * followed by relations of table "tbl_producer" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property string $number
 * @property string $address
 *
 * @property Product[] $products
 */
abstract class BaseProducer extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tbl_producer';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Producer|Producers', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, number, address', 'required'),
			array('name', 'length', 'max'=>30),
			array('number', 'length', 'max'=>100),
			array('address', 'length', 'max'=>50),
			array('id, name, number, address', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'products' => array(self::HAS_MANY, 'Product', 'producer_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'number' => Yii::t('app', 'Number'),
			'address' => Yii::t('app', 'Address'),
			'products' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('number', $this->number, true);
		$criteria->compare('address', $this->address, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}