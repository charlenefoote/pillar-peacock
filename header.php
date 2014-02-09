<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />

	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' ); 
	?></title>
	
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
	

</head>


<body <?php body_class(); ?>>
		
	<section class="wrap">

			<header class="site-header clearfix">			
				
				<h1 id="logo"><a href="/"><?php include('images/logo.svg'); ?></a></h1>
				
				<nav class="main-menu clearfix" role="navigation">
					<?php wp_nav_menu( array( 'container' => '', 'menu' => 'primary_menu' ) ); ?>
					<ul class="social-icons twelvecol">
						<li><a href="mailto:interiors@pillarandpeacock.com"><i class="icon-envelope icon-large"></i></a></li>
						<li><a href="https://www.facebook.com/pages/Pillar-Peacock/356655867681657"><i class="icon-facebook icon-large"></i></a></li>
						<li><a href="http://pinterest.com/pillarpeacock/"><i class="icon-pinterest icon-large"></i></a></li>
					</ul>
				</nav>
				
				<h2 id="tagline">When structure and beauty merge.</h2>
				
			</header>