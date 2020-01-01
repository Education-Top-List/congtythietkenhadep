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


				<?php    
				$parent  = get_categories(array('parent'=>0)); 
				foreach ( $parent as $category ) {
					$args = array(
						'cat' => $category->term_id,
						'post_type' => 'post',
						'posts_per_page' => '4',
					);
					$query = new WP_Query( $args );

					if ( $query->have_posts() ) { ?>

						<div class="listing">
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
                <?php
                foreach( $child_cats as $child_cat ){
                        //for each child category, get the ID
                	$childID = $child_cat->cat_ID;
                	?>
                	<div id="tab-<?php echo $childID; ?>" class="tab-content">
                		<ul>
                			<?php
                			$query = new WP_Query( array( 'cat'=> $childID, 'posts_per_page'=>2 ) );
                			?>

                			<?php
                			while( $query->have_posts() ):$query->the_post();
                				echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
                			endwhile;
                			?>
                		</ul>
                	</div>
                <?php } ?>
            </div>
        </div>
                     <?php } // end if
                     wp_reset_postdata();
                 }
                 ?>




             </div><!-- content_left -->
         </div>
     </div>
 </div>
 <?php get_footer(); ?>
