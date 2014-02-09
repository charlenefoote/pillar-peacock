<?php 

/* Template Name: contact */

get_header(); ?>
	
		<section class="content clearfix">
		<section class="wrap clearfix">
			
			<section class="twelvecol first clearfix">
				
				
				<section class="contact clearfix">
					<article>
						<img src="<?php bloginfo('template_url'); ?>/images/nashville-flight.jpg" height="223" width="229" />
					</article>
					
					<article>
						<img src="<?php bloginfo('template_url'); ?>/images/virginia-flight.jpg" height="222" width="230" />
					</article>
					
					<article>
						<p>We’re located in two different zip codes but travel frequently. We’ll come to you for your big projects. Just drop us a line or give either of us a call and we’ll talk.</p>
						<p>Adrianne 804-306-3275</p>
						<p>Brandeis 615-663-6295</p>
					</article>
				</section>
				
				
				<article class="post-content clearfix">	
					<h3 class="post-title">SEND US A MESSAGE</h3>
					<?php echo do_shortcode( '[contact-form-7 id="104" title="Contact form 1"]' ); ?>
				</article>

			</section>
		</section>
		</section>	

<?php get_footer(); ?>