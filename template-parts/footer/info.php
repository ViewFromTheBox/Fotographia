<?php
/**
 * Template part for displaying the footer info
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="site-info">
	<p>
	&copy; <?php echo esc_html( date( 'Y' ) ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html( bloginfo( 'name' ) ); ?></a>
	<span class="sep"> | </span>
	<a href="<?php echo esc_url( 'http://www.jacobmartella.com/wordpress/wordpress-theme/fotographia-wordpress-theme' ); ?>"><?php esc_html_e( 'Fotographia', 'wp-rig' ); ?></a>
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '<span class="sep"> | </span>' );
	}
	?>
	</p>
</div><!-- .site-info -->
