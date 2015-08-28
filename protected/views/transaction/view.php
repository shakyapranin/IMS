<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'transaction_date',
'sold_price',
array(
			'name' => 'product',
			'type' => 'raw',
			'value' => $model->product !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->product)), array('product/view', 'id' => GxActiveRecord::extractPkValue($model->product, true))) : null,
			),
'client_name',
'client_number',
'client_email',
array(
			'name' => 'location',
			'type' => 'raw',
			'value' => $model->location !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->location)), array('location/view', 'id' => GxActiveRecord::extractPkValue($model->location, true))) : null,
			),
'remarks',
	),
)); ?>

