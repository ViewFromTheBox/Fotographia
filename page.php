<?php
/**
* Page.php
*
* @package Fotographia
* @author  Jacob Martella
* @version  1.5
*/
?>
<?php get_header(); ?>		
			<div id="content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="featured-photo">
							<?php the_post_thumbnail( 'single' ); ?>
							<span class="page-photo-header">
								<h1 class="page-photo-title" itemprop="headline"><?php the_title(); ?></h1>
							</span>
						</div>
					<?php } else { ?>
						<div class="page-header">
							<h1 class="page-title"><?php the_title();?></h1>
						</div>
					<?php } ?>
				<div id="inner-content" class="row">
				    <main id="page-single" class="large-8 medium-12 columns" role="main">
							<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
								<section class="entry-content" itemprop="articleBody">
		    						<?php the_content(); ?>
		    						<?php wp_link_pages(); ?>
								</section> <!-- end article section -->
								<footer class="article-footer">
								</footer> <!-- end article footer -->
						    	<?php comments_template(); ?>
							</article> <!-- end article -->
						<?php endwhile; endif; ?>
    				</main> <!-- end #main -->
				    <?php get_sidebar(); ?>
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>