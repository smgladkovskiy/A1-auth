<?php defined('SYSPATH') or die('No direct access allowed.');?>
<?php echo Form::open()?>
	<?php echo Form::fieldset(__('auth.fieldset.login'))?>
	
	<?php echo Form::label('email', __('auth.email'))?>
	<?php echo Form::input('email', NULL, array('id' => 'email'))?>
	
	<?php echo Form::label('password', __('auth.password'))?>
	<?php echo Form::input('password', NULL, array('id' => 'password'))?>

	<?php echo Form::checkbox('remember', NULL, FALSE, array('id' => 'remember')); ?>
	<?php echo Form::label('remember', __('auth.remember')); ?>

	<?php echo Form::button('login', __('auth.enter'))?>
<?php echo Form::close()?>