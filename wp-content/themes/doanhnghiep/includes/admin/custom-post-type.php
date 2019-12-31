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
			'name' 				=> 'Đối tác quảng cáo',
			'singular_name' 	=> 'Đối tác quảng cáo',
			'menu_name'			=> 'Đối tác quảng cáo',
			'name_admin_bar'	=> 'Đối tác quảng cáo'
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
	add_action( 'init', 'baotrott_contact_custom_post_type' );
	add_filter('manage_baotrott_posts_columns','baotrott_set_contact_columns');
	add_action('manage_baotrott_posts_custom_column','baotrott_contact_custom_column',10,2);
	/* BAO TRO THONG TIN */
	function baotrott_contact_custom_post_type() {
		$labels = array(
			'name' 				=> 'Bảo trợ thông tin ',
			'singular_name' 	=> 'Bảo trợ thông tin',
			'menu_name'			=> 'Bảo trợ thông tin',
			'name_admin_bar'	=> 'Bảo trợ thông tin'
		);
		$args = array(
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_in_menu'		=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'menu_position'		=> 27,
			'menu_icon'			=> 'dashicons-businessman',
			'supports'			=> array( 'title', 'thumbnail' , 'excerpt' )
		);
		register_post_type( 'baotrott', $args );
	}
	function baotrott_set_contact_columns($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}
	function baotrott_contact_custom_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}
	/* DOI TAC NUOC NGOAI */
	add_action( 'init', 'doitacnn_contact_custom_post_type' );
	add_filter('manage_doitacnn_posts_columns','doitacnn_set_contact_columns');
	add_action('manage_doitacnn_posts_custom_column','doitacnn_contact_custom_column',10,2);
	function doitacnn_contact_custom_post_type() {
		$labels = array(
			'name' 				=> 'Đối tác nước ngoài',
			'singular_name' 	=> 'Đối tác nước ngoài',
			'menu_name'			=> 'Đối tác nước ngoài',
			'name_admin_bar'	=> 'Đối tác nước ngoài'
		);
		$args = array(
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_in_menu'		=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'menu_position'		=> 28,
			'menu_icon'			=> 'dashicons-businessman',
			'supports'			=> array( 'title', 'thumbnail' , 'excerpt' )
		);
		register_post_type( 'doitacnn', $args );
	}
	function doitacnn_set_contact_columns($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}
	function doitacnn_contact_custom_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}
	/* CHU TRI VA CHI DAO */
	add_action( 'init', 'chutri_contact_custom_post_type' );
	add_filter('manage_chutri_posts_columns','chutri_set_contact_columns');
	add_action('manage_chutri_posts_custom_column','chutri_contact_custom_column',10,2);
	function chutri_contact_custom_post_type() {
		$labels = array(
			'name' 				=> 'Chủ trì',
			'singular_name' 	=> 'Chủ trì',
			'menu_name'			=> 'Chủ trì',
			'name_admin_bar'	=> 'Chủ trì'
		);
		$args = array(
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_in_menu'		=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'menu_position'		=> 29,
			'menu_icon'			=> 'dashicons-businessman',
			'supports'			=> array( 'title', 'thumbnail' , 'excerpt' )
		);
		register_post_type( 'chutri', $args );
	}
	function chutri_set_contact_columns($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}
	function chutri_contact_custom_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}
		/* DON VI TO THUC */
	add_action( 'init', 'donvitc_contact_custom_post_type' );
	add_filter('manage_donvitc_posts_columns','donvitc_set_contact_columns');
	add_action('manage_donvitc_posts_custom_column','donvitc_contact_custom_column',10,2);
	function donvitc_contact_custom_post_type() {
		$labels = array(
			'name' 				=> 'Đơn vị tổ chức',
			'singular_name' 	=> 'Đơn vị tổ chức',
			'menu_name'			=> 'Đơn vị tổ chức',
			'name_admin_bar'	=> 'Đơn vị tổ chức'
		);
		$args = array(
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_in_menu'		=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'menu_position'		=> 29,
			'menu_icon'			=> 'dashicons-businessman',
			'supports'			=> array( 'title', 'thumbnail' , 'excerpt' )
		);
		register_post_type( 'donvitc', $args );
	}
	function donvitc_set_contact_columns($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}
	function donvitc_contact_custom_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}