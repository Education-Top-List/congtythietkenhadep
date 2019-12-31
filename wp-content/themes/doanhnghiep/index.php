<!-- silent is golden -->



	<?php 
			if ( is_search() ) {
				while(have_posts()) :the_post(); 
					get_template_part('search');		
				endwhile;

			}
			?>