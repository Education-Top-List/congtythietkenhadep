<div class="scrolltop">
	<i class="fa fa-angle-up" aria-hidden="true"></i>	
</div>
<div class="regis_fixed">
	<?php if(get_locale() == 'vi') { ?>
		<ul>
			<li><a href="<?php echo get_permalink(106);?>">Đăng ký tham quan</a></li>
			<li><a href="<?php echo get_permalink(100);?>">Đăng ký gian hàng</a></li>
		</ul>
	<?php }else{ ?>
		<ul>
			<li><a href="<?php echo get_permalink(147);?>">Registration Visitors</a></li>
			<li><a href="<?php echo get_permalink(104);?>">Booth Registration</a></li>
		</ul>
	<?php }?>
</div>
<footer class="footer">
	<div class="container">
		<?php
		$args = array(
			'post_type' => 'page',
          'post__in' => array(74) //list of page_ids
      );
		$page_query = new WP_Query( $args );
		if( $page_query->have_posts() ) :
        //print any general title or any header here//
			while( $page_query->have_posts() ) : $page_query->the_post();
				echo '<div class="page-on-page" id="page_id-' . $post->ID . '">';
				echo the_content();
				echo '</div>';
			endwhile;
		else:
        //optional text here is no pages found//
		endif;
		wp_reset_postdata();
		?>
	</div>
</footer>
<div id="loader" >
	<i class="fa fa-circle-o-notch fa-spin"></i>
</div>
<?php wp_footer(); ?>
<!-- MESSENGER -->
<script>      
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '1953938748210615',
			xfbml      : true,
			version    : 'v2.6'
		});
	};
	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));      
</script>
<!-- END  MESSENGER -->
<script src="<?php echo BASE_URL; ?>/js/wow.min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/slick.js"></script>
<script src="<?php echo BASE_URL; ?>/js/custom.js"></script>
</body>  
</html>
