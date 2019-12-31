<?php 
get_header(); 
?>	
<div id="content">
	<div class="container">
		<div class="list_post">
			<?php 
			if(have_posts()): ?>
				<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$args = array(
					'posts_per_page' => 3,
					'paged'          => $paged
				);
				$the_query = new WP_Query( $args ); 
				?>
				
				<?php //$allsearch = new WP_Query("s=$s&showposts=0"); echo $allsearch ->found_posts.' results found.';?>
				<h2 class="title_header">Kết quả tìm kiếm : <strong><?php the_search_query(); ?></strong></h2>
				<?php	while($the_query->have_posts()):  $the_query->the_post(); 
					
					get_template_part('content');
				endwhile;
				get_template_part('includes/pagination');
				?>
				
				<?php
			else:
				echo '<p class="no_found_content"> Không tìm thấy nội dung bạn vừa nhập</p>';
			endif;
			wp_reset_postdata();
			?>
		</div>
		<!-- Add the pagination functions here. -->
	</div>
</div>
<?php get_footer(); ?>
