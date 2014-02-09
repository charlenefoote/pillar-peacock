<?php 

//---- Enqueue Styles & Scripts ----//


function theme_styles()  
{ 
  wp_register_style( 'style', 
  	get_template_directory_uri() . '/css/style.css');
  wp_enqueue_style( 'style' );
}

add_action('wp_enqueue_scripts', 'theme_styles');

function theme_scripts() {
	
	wp_enqueue_script(
		'jquerylibrary',
		'//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js'
	);
	wp_enqueue_script(
		'modernizr',
		get_template_directory_uri() . '/js/modernizr.js',
		array( 'jquery' )
	);
	if( is_page('blog') || is_category() ) {
		wp_enqueue_script(
			'floatbox',
			get_template_directory_uri() . '/js/float-box.js',
			array( 'jquery' ),
			false,
			true
		);
	}
	wp_enqueue_script( 
		'jquery-masonry' );
	
	wp_enqueue_script(
		'scripts',
		get_template_directory_uri() . '/js/scripts.js',
		array( 'jquery' ),
		false,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );



//---- Register Menus ----//
register_nav_menus( array(
	'primary_menu' => 'Primary Menu'
) );

//---- Add Thumbnail Support ----//

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions   
}

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'featured-thumb', 860, 9999 ); //860 pixels wide (and unlimited height)
	add_image_size( 'portfolio-img', 600, 9999 ); //600 pixels wide (and unlimited height)
	add_image_size( 'homepage-thumb', 220, 180, true ); //(cropped)
	add_image_size( 'portfolio-thumb', 278, 9999 ); //
}


//---- Register Section Post Type ----//

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'portfolio_posts',
		array(
			'labels' => array(
				'name' => __( 'Portfolios' ),
				'singular_name' => __( 'Portfolio' )
			),
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		'has_archive' => true
		)
	);
}


//---- Register Sidebar in Footer ----//


if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Footer',
'before_widget' => '<li class="widget">',
'after_widget' => '</li>',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h3>',
));


//---- Customize Excerpt ----//
   
function custom_excerpt_length( $length ) {
	return 120;
}
	
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


//----- Comments -------//

function comment_form_update( $args = array(), $post_id = null ) {
if ( null === $post_id )
            $post_id = get_the_ID();
    else
            $id = $post_id;

    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    if ( ! isset( $args['format'] ) )
            $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = 'html5' === $args['format'];
	$fields   =  array(
			'author' => '<p class="comment-form-author">' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . __( 'YOUR NAME' ) . '" ' . $aria_req . ' /></p>',
			'email'  => '<p class="comment-form-email">' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="' . __( 'YOUR EMAIL' ) . '" ' . $aria_req . ' /></p>',
			'url'    => '<p class="comment-form-url"> <input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . __( 'URL (OPTIONAL)' ) . '" /></p>',
	);
	$required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );
	$defaults = array(
			'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" placeholder="' . _x( 'MESSAGE', 'noun' ) . '"></textarea></p>',
			'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'YOU MUST BE <a href="%s">LOGGED IN</a> TO POST A COMMENT.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
			'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'LOGGED IN AS <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">LOG OUT?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
			'comment_notes_before' => ' ',
			'comment_notes_after'  => ' ',
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'title_reply'          => __( 'LEAVE A COMMENT' ),
			'title_reply_to'       => __( 'LEAVE A COMMENT to %s' ),
			'cancel_reply_link'    => __( 'CANCEL COMMENT' ),
			'label_submit'         => __( 'COMMENT' ),
			'format'               => 'xhtml',
	);
	
	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );
	
	?>
	
	<?php if ( comments_open( $post_id ) ) : ?>
	                        <?php do_action( 'comment_form_before' ); ?>
	                        <div id="respond" class="comment-respond">
	                                <h3 id="reply-title" class="comment-reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h3>
	                                <?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
	                                        <?php echo $args['must_log_in']; ?>
	                                        <?php do_action( 'comment_form_must_log_in_after' ); ?>
	                                <?php else : ?>
	                                        <form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="comment-form"<?php echo $html5 ? ' novalidate' : ''; ?>>
	                                                <?php do_action( 'comment_form_top' ); ?>
	                                                <?php if ( is_user_logged_in() ) : ?>
	                                                        <?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
	                                                        <?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
	                                                <?php else : ?>
	                                                        <?php echo $args['comment_notes_before']; ?>
	                                                        <?php
	                                                        do_action( 'comment_form_before_fields' );
	                                                        foreach ( (array) $args['fields'] as $name => $field ) {
	                                                                echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
	                                                        }
	                                                        do_action( 'comment_form_after_fields' );
	                                                        ?>
	                                                <?php endif; ?>
	                                                <?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
	                                                <?php echo $args['comment_notes_after']; ?>
	                                                	<input name="submit" type="submit" class="post-nav" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
	                                                        <?php comment_id_fields( $post_id ); ?>
	                                                <?php do_action( 'comment_form', $post_id ); ?>
	                                        </form>
	                                <?php endif; ?>
	                        </div><!-- #respond -->
	                        <?php do_action( 'comment_form_after' ); ?>
	                <?php else : ?>
	                        <?php do_action( 'comment_form_comments_closed' ); ?>
	                <?php endif; ?>
	        <?php
	}

?>