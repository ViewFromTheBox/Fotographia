<?php
/**
* Sidebar.php
*
* @package Fotographia
* @author  Jacob Martella
* @version  1.3
*/
?>
<div id="sidebar1" class="sidebar large-4 medium-12 columns" role="complementary">
	<?php
		if ( is_author() ) { ?>
			<aside id="author-bio1" class="widget author-bio">
				<?php the_post(); ?>
					<h4 class="widgettitle"><?php echo esc_html( __( 'About ', 'fotographia' ) . get_the_author_meta( 'display_name' ) ); ?></h4>
					<div class="mugshot"><?php echo get_avatar( esc_url( get_the_author_meta( 'email' ) ), $size = 96 ); ?></div>
					<p class="bio"><?php echo get_the_author_meta( 'description' ); ?></p>
				<?php rewind_posts(); ?>
			</aside>
		<?php }
	?>
	<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar1' ); ?>
	<?php else : ?>
	<!-- This content shows up if there are no widgets defined in the backend. -->	
	<div class="alert help">
		<p><?php _e( 'Please activate some Widgets.', 'fotographia' );  ?></p>
	</div>
	<?php endif; ?>
</div>