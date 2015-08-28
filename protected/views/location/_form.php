<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'location-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textArea($model, 'name'); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->

		<!-- <label><?php echo GxHtml::encode($model->getRelationLabel('transactions')); ?></label>
		<?php echo $form->checkBoxList($model, 'transactions', GxHtml::encodeEx(GxHtml::listDataEx(Transaction::model()->findAllAttributes(null, true)), false, true)); ?>
 -->
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->