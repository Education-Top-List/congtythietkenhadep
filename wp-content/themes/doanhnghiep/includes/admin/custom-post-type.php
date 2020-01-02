<?php
/*
	
@package sunsettheme
	
	========================
		THEME CUSTOM POST TYPES
	========================
*/
	add_action( 'init', 'sunset_contact_custom_post_type' );
	add_filter('manage_partners_posts_columns','sunset_set_contact_columns');
	add_action('manage_partners_posts_custom_column','sunset_contact_custom_column',10,2);
	/* CONTACT CPT */
	function sunset_contact_custom_post_type() {
		$labels = array(
			'name' 				=> 'Đối tác',
			'singular_name' 	=> 'Đối tác',
			'menu_name'			=> 'Đối tác',
			'name_admin_bar'	=> 'Đối tác'
		);
		$args = array(
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_in_menu'		=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'menu_position'		=> 26,
			'menu_icon'			=> 'dashicons-businessman',
			'supports'			=> array( 'title', 'thumbnail' , 'excerpt' )
		);
		register_post_type( 'partners', $args );
	}
	function sunset_set_contact_columns($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}
	function sunset_contact_custom_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}
	