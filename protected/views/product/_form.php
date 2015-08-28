<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'product-form',
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
		<?php echo $form->labelEx($model,'type'); ?>
		<?php


		$options = array('Figure'=>'Figure','Mandala'=>'Mandala','Lap'=>'Lap','Jhyas'=>'Jhyas');

		 echo $form->dropDownList($model, 'type', $options);


		  ?>
		<?php echo $form->error($model,'type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'quality'); ?>
		<?php
		$options = array('High'=>'High','Medium'=>'Medium','Low'=>'Low');

		if($model->isNewRecord=='1'){$model->quality='Medium';}

		 echo $form->dropDownList($model, 'quality', $options);

		  ?>
		<?php echo $form->error($model,'quality'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'height'); ?>
		<?php echo $form->textField($model, 'height',array('placeholder'=>'in inches')); ?>
		<?php echo $form->error($model,'height'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'width'); ?>
		<?php echo $form->textField($model, 'width',array('placeholder'=>'in inches')); ?>
		<?php echo $form->error($model,'width'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'producer_id'); ?>
		<?php echo $form->dropDownList($model, 'producer_id', GxHtml::listDataEx(Producer::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'producer_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model, 'price',array('placeholder'=>'in Rs.')); ?>
		<?php echo $form->error($model,'price'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php
		$options = array('Available'=>'Available','Booked'=>'Booked','Sold'=>'Sold');
		 echo $form->dropDownList($model, 'status',$options);

		  ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
<!-- 		<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model, 'image', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'image'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model, 'remarks'); ?>
		<?php echo $form->error($model,'remarks'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'acquisition_date'); ?>

		<?php if($model->isNewRecord=='1'):
		$model->acquisition_date=date('Y-m-d');
			endif;
		?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'acquisition_date',
			'value' => $model->acquisition_date,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'acquisition_date'); ?>
		</div><!-- row -->
<!-- 
		<label><?php echo GxHtml::encode($model->getRelationLabel('transactions')); ?></label>
		<?php echo $form->checkBoxList($model, 'transactions', GxHtml::encodeEx(GxHtml::listDataEx(Transaction::model()->findAllAttributes(null, true)), false, true)); ?>
 -->
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->