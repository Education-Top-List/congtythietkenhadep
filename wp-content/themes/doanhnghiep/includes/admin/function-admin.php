<?php
add_action('admin_menu', 'ch_essentials_admin');
function ch_essentials_admin() {
	register_setting('zang-settings-header', 'email_hd');
	register_setting('zang-settings-header', 'phone_hd');
	register_setting('zang-settings-socials', 'footer_fb');
	register_setting('zang-settings-socials', 'footer_twitter');
	register_setting('zang-settings-socials', 'footer_ggplus');
	register_setting('zang-settings-socials', 'footer_insta');
	/* Base Menu */
	add_menu_page('Zang Theme Option','ZQ Framework','manage_options','template_admin_zang','zang_theme_create_page',get_template_directory_uri() . '/images/setting_icon.png',110);
}
add_action('admin_init', 'zang_custom_settings');
function zang_custom_settings() { 

	/* Header Options Section */
	add_settings_section('zang-header-options', 'Chỉnh sửa header','zang_header_options_callback','zang-settings-header' );
	add_settings_field('email_hd','Email Header', 'zang_email_hd','zang-settings-header', 'zang-header-options');
	add_settings_field('phone_hd','Phone Header', 'zang_phone_hd','zang-settings-header', 'zang-header-options');

	/* Social Options Section */
	add_settings_section('zang-social-options','Chỉnh sửa social','zang_social_options_callback','zang-settings-socials' );
	add_settings_field('facebook','Facebook Link', 'zang_footer_fb','zang-settings-socials', 'zang-social-options');
	add_settings_field('twitter','Twitter Link', 'zang_footer_twitter','zang-settings-socials', 'zang-social-options');
	add_settings_field('ggplus','Google Plus Link', 'zang_footer_ggplus','zang-settings-socials', 'zang-social-options');
	add_settings_field('insta','Instagram Link', 'zang_footer_insta','zang-settings-socials', 'zang-social-options');

}

function zang_header_options_callback(){
	echo '';
}

function zang_social_options_callback(){
	echo '';
}

function zang_commit_options_callback(){
	echo '';
}

function zang_email_hd(){
	$email_hd = esc_attr(get_option('email_hd'));
	echo '<input type="text" class="iptext_adm" name="email_hd" value="'.$email_hd.'" >';
}
function zang_phone_hd(){
	$phone_hd = esc_attr(get_option('phone_hd'));
	echo '<input type="text" class="iptext_adm" name="phone_hd" value="'.$phone_hd.'">';
}
function zang_footer_fb(){
	$footer_fb = esc_attr(get_option('footer_fb'));
	echo '<input type="text" class="iptext_adm" name="footer_fb" value="'.$footer_fb.'" placeholder="" ';
}
function zang_footer_twitter(){
	$footer_twitter = esc_attr(get_option('footer_twitter'));
	echo '<input type="text" class="iptext_adm" name="footer_twitter" value="'.$footer_twitter.'" placeholder="" ';
}
function zang_footer_ggplus(){
	$footer_ggplus = esc_attr(get_option('footer_ggplus'));
	echo '<input type="text" class="iptext_adm" name="footer_ggplus" value="'.$footer_ggplus.'" placeholder="" ';
}
function zang_footer_insta(){
	$footer_insta = esc_attr(get_option('footer_insta'));
	echo '<input type="text" class="iptext_adm" name="footer_insta" value="'.$footer_insta.'" placeholder="" ';
}

function myshortcode(){
	ob_start();
	if(get_option('footer_fb') || get_option('footer_twitter') || get_option('footer_ggplus') || get_option('footer_insta') ){
		?>
		<ul class="social_ft">
			<?php if(get_option('footer_fb')){ ?>
				<li class="fb_ft"><a href="<?php echo get_option('footer_fb'); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<?php }?>
			<?php if(get_option('footer_twitter')){ ?>
				<li class="twitter"><a href="<?php echo get_option('footer_twitter'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></i></a></li>
			<?php }?>
			<?php if(get_option('footer_ggplus')){ ?>
				<li class="ggplus"><a href="<?php echo get_option('footer_ggplus'); ?>" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a></li>
			<?php }?>
			<?php if(get_option('footer_insta')){ ?>
				<li class="instagram"><a href="<?php echo get_option('footer_insta'); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			<?php }?>
		</ul>	
		<?php
	}
	return ob_get_clean();
}
add_shortcode('social_ft','myshortcode');

function sc_loop_building(){
	ob_start();
	?>
	<div class="loop_building">
		<div class="list_building_idx">
			<?php    
			$parent  = get_categories(array('parent'=>0)); 
			foreach ( $parent as $category ) {
				$args = array(
					'cat' => $category->term_id,
					'post_type' => 'post',
					'posts_per_page' => '4',
					'category__not_in' => array(18)
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) { ?>
					<div class="item_list_building_idx">
						<div class="container">
							<?php  $catgory_id = get_cat_ID($category->name);
							$category_link = get_category_link( $catgory_id );
							?>
							<div class="list_subcat">
								<h2><a href="<?php echo esc_url( $category_link ); ?>" ><?php echo $category->name; ?></a></h2>
								<?php  
								$get_children_cats = array(
                    'child_of' => $catgory_id  //get children of this parent using the catID variable from earlier
                );
                $child_cats = get_categories( $get_children_cats );//get children of parent category
                ?>
                <ul>
                	<?php
                	foreach( $child_cats as $child_cat ){
                        //for each child category, get the ID
                		$childID = $child_cat->cat_ID;
                        //for each child category, give us the link and name
                		echo '<li data-tab="tab-'. $child_cat->cat_ID .'"><a href=" ' . get_category_link( $childID ) . ' ">' . $child_cat->name . '</a></li>';
                	}
                	?>
                </ul>
            </div>
            <div class="tabs_toggle">
            	<?php
            	foreach( $child_cats as $child_cat ){
                        //for each child category, get the ID
            		$childID = $child_cat->cat_ID;
            		?>
            		<div id="tab-<?php echo $childID; ?>" class="tab-content">
            			<ul class="row">
            				<?php
            				$query = new WP_Query( array( 'cat'=> $childID, 'posts_per_page'=>4 ) );
            				?>
            				<?php
            				while( $query->have_posts() ):$query->the_post();
            					?>
            					<li class="col-sm-3">
            						<div class="product_inner">
            							<div class="wrap_thumb">
            								<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>
            								<figure class="thumbnail" style="background:url('<?php echo $image[0]; ?>');"> 
            									<a href="<?php the_permalink();?>"></a>
            								</figure>
            							</div>
            							<div class="post_meta">

            							</div>
            							<h4><a href="<?php get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4> 
            						</div>

            					</li>
            					<?php 
            				endwhile;
            				?>
            			</ul>
            		</div>
            	<?php } ?>
            </div>
        </div>
    </div><!-- item_list_building_idx -->
                     <?php } // end if
                     wp_reset_postdata();
                 }
                 ?>
             </div>  <!-- list_building_idx -->

         </div>	
         <?php
         return ob_get_clean();
     }
     add_shortcode('loop_bd_sc','sc_loop_building');

function sc_news(){ 
	ob_start();
	?>
	      <?php 
           $argsQuery = array(
            'posts_per_page' => 3,
            'cat' => 18,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish'
        );?>
        <ul>
            <?php
            $wp_query = new WP_Query(); $wp_query->query($argsQuery);
            if(have_posts()): 
                while($wp_query->have_posts()) : $wp_query->the_post(); 
                    ?> 
                    <li class="list_post_item pw">
                        <?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>
                        <figure class="thumbnail" style="background:url('<?php echo $image[0]; ?>');"><a href="<?php the_permalink(); ?>"><?php //the_post_thumbnail();?></a> </figure>
                        <h2 class="post_title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>   
                    </li>
                    <?php   
                endwhile;
            else:
            endif;
            ?>
            <?php wp_reset_postdata();?>
        </ul>
	   <?php
         return ob_get_clean();
}

add_shortcode('news_sc','sc_news');
/* Display Page
-----------------------------------------------------------------*/
function zang_theme_create_page() {
	?>
	<div class="wrap">  
		<?php settings_errors(); ?>  

		<?php  
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'header_page_options';  
		?>  

		<ul class="nav-tab-wrapper"> 
			<li><a href="?page=template_admin_zang&tab=header_page_options" class="nav-tab <?php echo $active_tab == 'header_page_options' ? 'nav-tab-active' : ''; ?>">Header</a> </li>
			<li><a href="?page=template_admin_zang&tab=social_page_options" class="nav-tab <?php echo $active_tab == 'social_page_options' ? 'nav-tab-active' : ''; ?>">Social Footer</a></li>
		</ul>  

		<form method="post" action="options.php">  
			<?php 
			if( $active_tab == 'header_page_options' ) {  
				settings_fields( 'zang-settings-header' );
				do_settings_sections( 'zang-settings-header' ); 
			} else if( $active_tab == 'social_page_options' ) {
				settings_fields( 'zang-settings-socials' );
				do_settings_sections( 'zang-settings-socials' ); 
			}
			?>             
			<?php submit_button(); ?>  
		</form> 

	</div> 
	<?php
}

