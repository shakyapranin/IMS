<?php

/**
 * This is the model base class for the table "tbl_product_list".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ProductList".
 *
 * Columns in table "tbl_product_list" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $name
 * @property string $product_ids
 *
 */
abstract class BaseProductList extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tbl_product_list';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'ProductList|ProductLists', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, product_ids', 'required'),
			array('name', 'length', 'max'=>100),
			array('id, name, product_ids', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
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
			'product_ids' => Yii::t('app', 'Product Ids'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('product_ids', $this->product_ids, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}