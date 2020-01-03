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

           <div class="form_suggest">
               <div class="container">
                   <?php echo do_shortcode('[contact-form-7 id="21" title="Form yêu cầu tư vấn"]'); ?>
               </div>
           </div>
     
    </div>
</div>
</div>
<?php get_footer(); ?>
