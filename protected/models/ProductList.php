<?php

Yii::import('application.models._base.BaseProductList');

class ProductList extends BaseProductList
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public static function label($n = 1) {
		return Yii::t('app', 'Product List|Product Lists', $n);
	}
}