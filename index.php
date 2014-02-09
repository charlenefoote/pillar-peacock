<?php get_header(); ?>
	
	<section class="content clearfix">
		<section class="wrap clearfix">

			<section class="twelvecol first clearfix">
				<section class="image-tiles">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<article class="post">
								<?php the_post_thumbnail( 'featured-thumb' ); ?>
								<a href="<?php the_permalink(); ?>" class="text-link-block"><?php the_title(); ?></a>
						</article>
					<?php endwhile; endif; ?>	
				</section>
			</section>
			
			
		</section>
	</section>

<?php get_footer(); ?>