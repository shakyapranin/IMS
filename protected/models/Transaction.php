<?php

Yii::import('application.models._base.BaseTransaction');

class Transaction extends BaseTransaction
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}