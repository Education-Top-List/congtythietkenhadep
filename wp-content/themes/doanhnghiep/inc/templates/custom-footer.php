<div class="zang_sidebar_option  tg_ct_right_admin">
	<?php settings_errors(); ?>
	<?php 
	$phone_ft = esc_attr(get_option('phone_ft'));
	$address_ft = esc_attr(get_option('address_ft'));
	$fax = esc_attr(get_option('fax_ft'));
	$email = esc_attr(get_option('email_ft'));
	?>

	<form method="post" action="options.php" class="zang-general-form"> 
		<?php settings_fields('zang-custom-footer'); ?>
		<?php do_settings_sections('template_custom_footer');  ?>
		<?php submit_button('Save Changes','primary','btnSubmit'); ?>
	</form>

</div>

