<?php 
get_header(); 
?>	
<div id="wrap">
	<div class="g_content">
		<?php 
		wpb_set_post_views(get_the_ID());
				if(have_posts()) :
					while(have_posts()) : the_post(); 
			 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
		?>
		<div class="img_category_single" style="background:url('<?php echo $image[0]; ?>">
				<div class="single_post_info">
									<h2><?php the_title(); ?></h2>
									<p><?php the_time('d/m/Y');?> 
										| Luợt xem : <?php echo wpb_get_post_views(get_the_ID()); ?>
									</p>
								</div>
		</div>
		
		<div class="container">
			<div class="row">
						<div class="col-sm-12  content_left">
							<article class="content_single_post">
							
								<div class="post_avt">
									<div class="wrap_post_avt">
										<?php //the_post_thumbnail();?>
									</div>
								</div>
								<div class="text_content">
									<?php  the_content(); ?>
								</div>
							</article>
				 
							</div>
						<!-- <div class="col-md-3 col-sm-3 sidebar">
							<?php dynamic_sidebar('sidebar1'); ?> 
						</div> -->
					<?php endwhile;
				else:
				endif;
				wp_reset_postdata();
				?>
			</div>
			
		</div>
		
	</div>
</div>
<?php get_footer(); ?>
