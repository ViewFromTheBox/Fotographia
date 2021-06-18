<?php
/**
 * The template for displaying all pages
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );
wp_rig()->print_styles( 'wp-rig-page' );

?>
	<main id="primary" class="site-main">
		<?php

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/page/entry', 'header' );
			?>

			<div class="main-content">
				<?php
				get_template_part( 'template-parts/page/entry', 'content' );

				get_template_part( 'template-parts/page/entry', 'footer' );
				?>
			</div>
			<?php
		}
		?>
	</main><!-- #primary -->
<?php
get_footer();
