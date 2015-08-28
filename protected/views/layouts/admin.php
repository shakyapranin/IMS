<?php /* @var $this Controller */ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="viewport" content="width=device-width" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
<?php Yii::app()->bootstrap->register(); ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<?php
	$saveBreakScript = '
		$(document).ready(function(){
			$("input[type=submit]").val("save").before("<div class='."clearfix".'></div>");
		});
	';

Yii::app()->clientScript->registerScript("saveBreakScript",$saveBreakScript);
?>

<body>

<div class="container" id="page">

	<!--<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	
	<?php 

$logged_user=User::getCurrentUser();
if($logged_user){
//var_dump(($logged_user->login!=''?'true':'false'),$logged_user);
$this->widget('bootstrap.widgets.TbNavbar', array(
    'brandLabel' => 'Inventory Management System',
    'collapse' => true,
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => array(
			
						  array('label'=>'Home', 'url'=>array('/site/index')),
						//=========== Client Menu ===========

						array('label'=>"Users", 'url'=>array('/UserAdmin/user/admin'), 'visible'=>User::checkRole('isSuperAdmin'),
						
						'items'=>array(
						
									array('label'=>"Users", 'url'=>array('/UserAdmin/user/admin')),
							 		array('label'=>"Roles", 'url'=>array('/UserAdmin/userRole/admin')),
									array('label'=>"Tasks", 'url'=>array('/UserAdmin/userTask/admin')),
							)
							 ), 

						//=========== Menu for processing ===================

						array('label'=>"Processing", 'url'=>array('#'), 'visible'=>true,
						
						'items'=>array(
						
									array('label'=>"Create Product", 'url'=>array('/product/create')),
									array('label'=>"Manage Product", 'url'=>array('/product/admin')),
							 		array('label'=>"Create Transaction", 'url'=>array('/transaction/create')),
									array('label'=>"Manage Transaction", 'url'=>array('/transaction/admin')),
							)
							 ), 
						//=========== Menu for processing ===================



						//=========== Menu for processing ===================

						array('label'=>"Miscellenous", 'url'=>array('#'), 'visible'=>true,
						
						'items'=>array(
						
									array('label'=>"Create Producer", 'url'=>array('/producer/create')),
									array('label'=>"Manage Producer", 'url'=>array('/producer/admin')),
							 		array('label'=>"Create Location", 'url'=>array('/location/create')),
									array('label'=>"Manage Location", 'url'=>array('/location/admin')),
							)
							 ), 
						//=========== Menu for processing ===================

							 
					    //=========== Login, logout, registration, profile ===========

						array(
						  'label'=>$logged_user->login,
						  'url'=>array('#'),'visible'=>($logged_user->login!=''?'1':'0'),
						  'items'=>array(
								array('label'=>"Login", 'url'=>array('/UserAdmin/auth/login'), 'visible'=>($logged_user->login!=''?'0':'1')),
								array('label'=>"Logout", 'url'=>array('/UserAdmin/auth/logout'),'visible'=>($logged_user->login!=''?'1':'0'),'id' => 'D283e'),
								array('label'=>"Profile", 'url'=>array('/UserAdmin/profile/personal'),'visible'=>($logged_user->login!=''?'1':'0')),		
						  ),
						),	







            ),
        ),)

)); 

}?>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Praneen Shakya.<br/>
		All Rights Reserved.<br/>
		<?php //echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
