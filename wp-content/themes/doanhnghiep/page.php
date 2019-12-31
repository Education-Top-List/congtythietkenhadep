<?php get_header(); ?>
<?php 
if(is_category()) {
	//get_template_part('includes/category_post.php');	
}
elseif(is_search()){
	get_template_part('search');
}
else{
	while (have_posts()) : the_post(); 
		?>	
		<div class="page-wrapper">
			<div class="container">
				<?php the_content();?> 
			</div>
		</div>
	<?php endwhile;
}
?>
<?php get_footer(); ?>