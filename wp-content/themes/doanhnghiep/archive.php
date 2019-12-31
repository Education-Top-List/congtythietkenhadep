<?php 
get_header(); 
if(have_posts()) :
	?>	
	<div id="wrap">
		<div class="g_content">
	<?php 
		// Get the current category ID, e.g. if we're on a category archive page
		$postcat = get_the_category( $post->ID );
		//var_dump($postcat);
		if ( ! empty( $postcat ) ) {
			//echo esc_html( $postcat[0]->cat_ID );  
    // Get the image ID for the category
			$category_image_id = $postcat[0]->term_id;
			$image_id = get_term_meta ( $category_image_id, 'category-image-id', true );
			$src_image = wp_get_attachment_image_src( $image_id , 'full');
		?>
		<div class="img_category_single" style="background:url('<?php echo $src_image[0]; ?>">
			
		</div>
		<?php }?>
			<div class="container">
				<div class="row">
					<div class="col-sm-12  content_left">
						<?php 
						if(is_category()){
							//echo '<h3 class="title_archives">' . single_cat_title() . '</h3>';
							echo '';
						}
						else if(is_tag()){
							echo '<h3 class="title_archives"><strong>' . single_tag_title() . '/<strong></h3>';
						}
						else if(is_author()){
							the_post();
							echo '<h3 class="title_archives">Author Archives : <strong> ' . get_the_author() . '</strong></h3>';
							rewind_posts();
						}
						else if(is_day()){
							echo '<h3 class="title_archives">Day Archives : <strong>' . get_the_date() . '</strong></h3>';
						}
						else if(is_month()){
							echo '<h3 class="title_archives">Monthly Archives : <strong>' . get_the_date('F Y') . '</strong></h3>';
						}
						else if(is_year()){
							echo '<h3 class="title_archives">Yearly Archives : <strong>' . get_the_date('Y') . '</strong></h3>';
						}
						else{
							echo 'archive';
						}
						?>
						<?php 
						$args = array(
							'parent' => get_queried_object_id(),
						); 
						$terms = get_terms( 'category', $args );
						$term_ids = wp_list_pluck( $terms, 'term_id' );
						$categories = get_categories( $args );
						?>
						<ul class="list_categories">	
							<?php 
							if($cat || is_wp_error($cat)){
								echo '<li class="parent_cat">' . get_category_parents( $cat, true, '' ) .  '</li>' ;
							}
							foreach($categories as $category) { 
								echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a></li> ';
							}
							?>
						</ul>
						<div class="list_post_categories">
							<?php 
							$list_post_arg = array(
								'posts_per_page' => 5,
								'orderby' => 'post_date',
								'order' => 'DESC',
								'post_type' => 'post',
								'post_status' => 'publish'
							);
							$list_post_q = new WP_Query();
							$list_post_q->query($list_post_arg);
							while($list_post_q->have_posts()): $list_post_q->the_post();
								get_template_part('includes/frontend/loop/loop_post');
							endwhile;
							get_template_part('includes/frontend/pagination/pagination');
							?>
						</div>
						<?php
					else:
					endif;
					wp_reset_postdata();
					?>
				</div>
		
				
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
