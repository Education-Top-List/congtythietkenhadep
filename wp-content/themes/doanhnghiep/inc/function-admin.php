<?php
/* 
@package zangTheme
	=================
		ADMIN PAGE
	=================
*/
	function zang_add_admin_page(){
		// Generate zang admin page
		add_menu_page('zang Theme Option','ZQ Framework' , 'manage_options' , 'template_admin_zang', 'zang_theme_create_page', 	get_template_directory_uri() . '/images/setting_icon.png', 110);
		// Generate Sunset Admin Sub pages
		add_submenu_page('template_admin_zang', 'Custom Text Header','Custom Text Header', 'manage_options' , 'template_admin_zang', 'zang_theme_create_page');
		add_submenu_page('template_admin_zang', 'Custom Text Footer', 'Custom Text Footer', 'manage_options' , 'template_custom_footer', 'zang_theme_cusfooter_page');
		// Activate custom setttings
		add_action('admin_init', 'zang_custom_settings');
	}
	add_action('admin_menu', 'zang_add_admin_page');
	function zang_custom_settings(){
		// Sidebar Options
		register_setting('zang-settings-groups', 'address');
		register_setting('zang-settings-groups', 'address_en');
		register_setting('zang-settings-groups', 'phone');
		

		add_settings_section('zang-sidebar-options','Custom content header','zang_sidebar_options','template_admin_zang');
		add_settings_field('address-hd','Address Header', 'zang_sidebar_address','template_admin_zang', 'zang-sidebar-options');
		add_settings_field('phone-hd','Phone', 'zang_sidebar_phone','template_admin_zang', 'zang-sidebar-options');



		//Custom footer
		register_setting('zang-custom-footer','address_ft');
		register_setting('zang-custom-footer','address_ft_en');
		register_setting('zang-custom-footer','phone_ft');
		register_setting('zang-custom-footer','fax_ft');
		register_setting('zang-custom-footer','email_ft');
		add_settings_section('zang-customft-option','Custom content footer','zang_customft_option','template_custom_footer');
		add_settings_field('address-ft','Address Footer', 'zang_sidebar_address_ft','template_custom_footer', 'zang-customft-option');
		add_settings_field('phone-ft','Phone Footer', 'zang_sidebar_phone_ft','template_custom_footer', 'zang-customft-option');
		add_settings_field('fax-ft','Fax Footer', 'zang_sidebar_fax_ft','template_custom_footer', 'zang-customft-option');
		add_settings_field('email-ft','Email Footer', 'zang_sidebar_email_ft','template_custom_footer', 'zang-customft-option');
	}

	function zang_sidebar_options(){
		echo '';
	}

	function zang_customft_option(){
		echo '';
	}

	function zang_sidebar_address(){
		$address = esc_attr(get_option('address'));
		$address_en = esc_attr(get_option('address_en'));
		echo '<input type="text" class="iptext_adm" name="address" value="'.$address.'" placeholder="Vietnamese">';
		echo '<input type="text" class="iptext_adm" name="address_en" value="'.$address_en.'" placeholder="English">';
	}
	function zang_sidebar_phone(){
		$phone = esc_attr(get_option('phone'));
		echo '<input type="text" class="iptext_adm" name="phone" value="'.$phone.'" placeholder="">';
	}
	function zang_sidebar_address_ft(){
		$address_ft = esc_attr(get_option('address_ft'));
		$address_ft_en = esc_attr(get_option('address_ft_en'));
		echo '<input type="text" class="iptext_adm" name="address_ft" value="'.$address_ft.'" placeholder="Vietnamese">';
		echo '<input type="text" class="iptext_adm" name="address_ft_en" value="'.$address_ft_en.'" placeholder="English">';
	}
	function zang_sidebar_phone_ft(){
		$phone_ft = esc_attr(get_option('phone_ft'));
		echo '<input type="text" class="iptext_adm" name="phone_ft" value="'.$phone_ft.'" placeholder="">';
	}
	function zang_sidebar_fax_ft(){
		$fax = esc_attr(get_option('fax_ft'));
		echo '<input type="text" class="iptext_adm" name="fax_ft" value="'.$fax.'" placeholder="">';
	}
	function zang_sidebar_email_ft(){
		$email = esc_attr(get_option('email_ft'));
		echo '<input type="text" class="iptext_adm" name="email_ft" value="'.$email.'" placeholder="">';
	}

	function zang_theme_create_page(){
		require_once(get_template_directory().'/inc/templates/zang-admin.php');
	}

	function zang_theme_cusfooter_page(){
		require_once(get_template_directory().'/inc/templates/custom-footer.php');
	}