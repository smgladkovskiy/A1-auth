<?php defined('SYSPATH') or die('No direct access allowed.');?>
<?php echo Form::open()?>
	<?php echo Form::fieldset(__('auth.fieldset.change_pass'))?>

	<?php echo Form::label('password', __('auth.login.password'))?>
	<?php echo Form::input('password', NULL, array('id' => 'password'))?>

	<?php echo Form::label('password_confirm', __('auth.login.password_confirm'))?>
	<?php echo Form::input('password_confirm', NULL, array('id' => 'password_confirm'))?>

	<?php echo Form::button('login', __('auth.change'))?>
<?php echo Form::close()?>