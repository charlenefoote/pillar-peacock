<div id="comments" class="comments-area">

	<?php 
				
		if ( have_comments() ) {
			wp_list_comments( array( 'style' => 'div' ) );
		}
	
		comment_form_update(); 
	?>

</div>