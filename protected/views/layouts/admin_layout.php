<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/admin'); ?>
<div class="span-5" style="float:none">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();

	?>

	</div><!-- sidebar -->
	</div>
<div class="container-liquid">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>

</div>
<?php $this->endContent(); ?>