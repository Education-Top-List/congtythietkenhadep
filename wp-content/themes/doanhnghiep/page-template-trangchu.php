<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	
<div class="page-wrapper">
	<div id="content">
		<div class="g_content">
            <div class="content_post_admin">
             <?php 
             $content_post = get_post($my_postid);
             $content = $content_post->post_content;
             $content = apply_filters('the_content', $content);
             $content = str_replace(']]>', ']]&gt;', $content);
             echo $content;
             ?>
         </div>	
         <div class="loop_building">
            <div class="container">
                <div class="list_building_idx">
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
                            <div class="item_list_building_idx">
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
        
    </div><!-- item_list_building_idx -->
                     <?php } // end if
                     wp_reset_postdata();
                 }
                 ?>
             </div>  <!-- list_building_idx -->
         </div>  <!-- container -->
     </div>	

 </div>
</div>
</div>
<?php get_footer(); ?>
