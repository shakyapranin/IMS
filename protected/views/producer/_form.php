<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'producer-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model, 'number', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'number'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model, 'address', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'address'); ?>
		</div><!-- row -->
<!-- 
		<label><?php echo GxHtml::encode($model->getRelationLabel('products')); ?></label>
		<?php echo $form->checkBoxList($model, 'products', GxHtml::encodeEx(GxHtml::listDataEx(Product::model()->findAllAttributes(null, true)), false, true)); ?>
 -->
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->