<?php defined('SYSPATH') or die('No direct access allowed.');?>
<?php echo Form::open()?>
	<?php echo Form::fieldset(__('auth.fieldset.register'))?>

	<?php echo Form::label('email', __('auth.email'))?>
	<?php echo Form::input('email', NULL, array('id' => 'email'))?>

	<?php echo Form::label('username', __('auth.username'))?>
	<?php echo Form::input('username', NULL, array('id' => 'username'))?>

	<?php echo Form::label('password', __('auth.password'))?>
	<?php echo Form::input('password', NULL, array('id' => 'password'))?>

	<?php echo Form::button('login', __('auth.register'))?>
<?php echo Form::close()?>