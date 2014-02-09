<?php 

/* Template Name: blog */

get_header(); ?>
	
		<div class="content clearfix">
		<div class="wrap wide clearfix">
			
			<aside class="twocol last floatbox">
				<?php wp_list_categories('title_li=<h4>' . __('Categories') . '</h4>' ); ?>
			</aside>	
			<div class="tencol first clearfix">	
					<?php

			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			query_posts(array(
				'paged'          => $paged,
				'posts_per_page' => 5
			));

			if ( have_posts() ) : ?>

			<?php 	
				while ( have_posts() ) : the_post();
				$featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
			?>

				<article class="post-content clearfix">
					<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<div class="post-comments"><a href="<?php the_permalink(); ?>"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></div>
					<div class="post-img">
						<?php the_post_thumbnail( 'featured-thumb' ); ?>
						<div class="pinterest-pin">
							<a href="//www.pinterest.com/pin/create/button/?url=<?=the_permalink();?>&media=<?=$featuredImage?>&description=<?=the_title();?>" data-pin-do="buttonPin" data-pin-config="above"></a>						
						</div>
					</div>
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" class="text-link-frame">Read More</a>
				</article>
			<?php endwhile; ?>
				<nav class="post-nav"><?php posts_nav_link('', 'Newer', 'Older'); ?></nav>
			<?php endif; ?>
			</div>	
		</div>
		
	</div>
</section>
<section class="sign-up">
	<!-- Begin MailChimp Signup Form -->
	<form action="http://pillarandpeacock.us7.list-manage2.com/subscribe/post?u=add83d3f148f3e2acce69beaa&amp;id=2277dcc8c8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
		<label for="mce-EMAIL">Subscribe to our blog</label>
		<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="YOUR EMAIL ADDRESS" required>
		<input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe" class="button">
	</form>
	<!--End mc_embed_signup-->

<?php get_footer(); ?>