<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('type')); ?>:
	<?php echo GxHtml::encode($data->type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('quality')); ?>:
	<?php echo GxHtml::encode($data->quality); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('height')); ?>:
	<?php echo GxHtml::encode($data->height); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('width')); ?>:
	<?php echo GxHtml::encode($data->width); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('producer_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->producer)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('price')); ?>:
	<?php echo GxHtml::encode($data->price); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('image')); ?>:
	<?php echo GxHtml::encode($data->image); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('remarks')); ?>:
	<?php echo GxHtml::encode($data->remarks); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('acquisition_date')); ?>:
	<?php echo GxHtml::encode($data->acquisition_date); ?>
	<br />
	*/ ?>

</div>