<?php 

/* Template Name: home  */

get_header(); 
?>
	
	<section class="content clearfix">
		<section class="wrap clearfix">
			
			<section class="twelvecol first clearfix">
				<h2 class="text-frame">Featured Spaces</h2>

				<section class="home-tiles">
					<article class="post">
						<img src="<?php bloginfo('template_url'); ?>/images/bed_horz.jpg">
						<!--div class="label-box clear fix"><span>Fairhope AL</span></div></a-->
					</article>
					<article class="post">
						<img src="<?php bloginfo('template_url'); ?>/images/shelves_vert.png">
						<!--div class="label-box clear fix"><span>Irvington VA</span></div></a-->
					</article>
					<article class="post">
						<img src="<?php bloginfo('template_url'); ?>/images/chair_vert.png">
						<!--div class="label-box clear fix"><span>Fairhope AL</span></div></a-->
					</article>
					<article class="post">
						<img src="<?php bloginfo('template_url'); ?>/images/chair_horz.jpg">
						<!--div class="label-box clear fix"><span>Irvington VA</span></div></a-->
					</article>
				</section>
			
			<a href="/portfolio" class="text-link-frame">More Spaces</a>
				
		</section>
	  </section>
	</section>

<?php get_footer(); ?>