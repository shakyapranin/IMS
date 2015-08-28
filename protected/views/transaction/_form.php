<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'transaction-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'transaction_date'); ?>
		<?php if($model->isNewRecord=='1'){$model->transaction_date = date('Y-m-d');}?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'transaction_date',
			'value' => $model->transaction_date,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'transaction_date'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'sold_price'); ?>
		<?php echo $form->textField($model, 'sold_price',array('placeholder'=>'in Rs.')); ?>
		<?php echo $form->error($model,'sold_price'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'product_id'); ?>
		<?php echo $form->dropDownList($model, 'product_id', GxHtml::listDataEx(Product::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'product_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'client_name'); ?>
		<?php echo $form->textField($model, 'client_name', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'client_name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'client_number'); ?>
		<?php echo $form->textField($model, 'client_number', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'client_number'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'client_email'); ?>
		<?php echo $form->textField($model, 'client_email', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'client_email'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'location_id'); ?>
		<?php echo $form->dropDownList($model, 'location_id', GxHtml::listDataEx(Location::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'location_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model, 'remarks'); ?>
		<?php echo $form->error($model,'remarks'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->