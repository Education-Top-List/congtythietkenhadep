<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	
<div class="page-wrapper">
	<div id="content">
		<div class="g_content">
			<div class="content_left">
				<div class="content_post_admin">
					<?php 
		$content_post = get_post($my_postid);
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		echo $content;
		?>
	</div>		

	<div class="our_products">
		<div class="container">
			<?php 
			if(get_locale() == 'en_US'){?> 
				<h2 class="title_tg_top"><?php echo get_cat_name('15');?></h2>
		<?php }  else if(get_locale() == 'vi'){ ?><h2 class="title_tg_top"><?php echo get_cat_name('13');?></h2> <?php } ?>
		<div class="row">
			<?php 
			$arg_cmt_post_q = array(
				'posts_per_page' => 6,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'post_type' => 'post',
				'post_status' => 'publish',
				'cat' => 13
			);
			$cmt_post_q = new WP_Query();
			$cmt_post_q->query($arg_cmt_post_q);
			?>
			<?php if(have_posts()) : ?>
				<ul>
					<?php
					while ($cmt_post_q->have_posts()) : $cmt_post_q->the_post(); ?>
						<li class="col-sm-4">
							<div class="post_cmt_wrapper ">
								<div class="wrap_thumb">
									<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>
									<figure class="thumbnail" style="background:url('<?php echo $image[0]; ?>');"> 
										<a href="<?php the_permalink();?>"></a>
									</figure>	
								</div>
								<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> </h3>

							</div>
						</li>
					<?php endwhile; ?>
				<?php endif; ?> 
			</ul>
		</div>
	</div>
</div>
</div><!-- content_left -->
</div>
</div>
</div>
<?php get_footer(); ?>
