<?php get_header(); ?>
	
	<div class="content clearfix">
		<div class="wrap wide clearfix">
			<aside class="twocol last floatbox">
				<?php wp_list_categories('title_li=<h4>' . __('Categories') . '</h4>' ); ?>
			</aside>	
			
			<div class="tencol first clearfix">	
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article class="post-content clearfix">
							<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>					
							<div class="post-comments">
								<a href="<?php the_permalink(); ?>"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a>
							</div>							
							<div class="post-img">
								<?php the_post_thumbnail( 'featured-thumb' ); ?>
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

<?php get_footer(); ?>