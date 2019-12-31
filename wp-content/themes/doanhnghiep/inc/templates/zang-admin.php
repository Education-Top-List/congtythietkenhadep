<div class="zang_sidebar_option  tg_ct_right_admin">
	<?php settings_errors(); ?>
	<?php 
	$address = esc_attr(get_option('address'));
	$address_en = esc_attr(get_option('address_en'));
	$phone = esc_attr(get_option('phone'));

	?>

	<form method="post" action="options.php" class="zang-general-form"> 
		<?php settings_fields('zang-settings-groups'); ?>
		<?php do_settings_sections('template_admin_zang');  ?>
		<?php submit_button('Save Changes','primary','btnSubmit'); ?>
	</form>

</div>

