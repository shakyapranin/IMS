<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('transaction_date')); ?>:
	<?php echo GxHtml::encode($data->transaction_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('sold_price')); ?>:
	<?php echo GxHtml::encode($data->sold_price); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('product_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->product)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('client_name')); ?>:
	<?php echo GxHtml::encode($data->client_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('client_number')); ?>:
	<?php echo GxHtml::encode($data->client_number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('client_email')); ?>:
	<?php echo GxHtml::encode($data->client_email); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('location_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->location)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('remarks')); ?>:
	<?php echo GxHtml::encode($data->remarks); ?>
	<br />
	*/ ?>

</div>