<?php
/**
* 404.php
*
* @package Fotographia
* @author  Jacob Martella
* @version  1.5
*/
?>
<?php get_header(); ?>
			<div id="content">
				<div class="post-404-header">
					<h1 class="post-title" itemprop="headline"><?php _e( '404 - Article Not Found', 'fotographia' ); ?></h1>
					<h3 class="post-meta"><?php _e( 'The article you were looking for was not found.', 'fotographia' ); ?></h3>
				</div>
				<div id="inner-content" class="row">
					<main id="post-404" class="large-8 medium-12 columns" role="main">
						<article id="content-not-found">
							<section class="entry-content">
								<p><?php get_search_form(); ?></p>
							</section> <!-- end article section -->
							<section class="search">
							    <p></p>
							</section> <!-- end search section -->
						</article> <!-- end article -->
					</main> <!-- end #main -->
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>