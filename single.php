<?php
/**
* Single.php
*
* @package Fotographia
* @author  Jacob Martella
* @version  1.4
*/
?>
<?php get_header(); ?>			
			<div id="content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="featured-photo">
							<?php the_post_thumbnail( 'fotographia-single' ); ?>
							<span class="article-header">
								<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
								<h3 class="entry-meta"><?php _e( 'Written By: ', 'fotographia' ); the_author_posts_link();?> &bull; <?php the_date( get_option( 'date_format' ) ); ?></h3>
    						</span>
						</div>
					<?php } else { ?>
						<div class="single-header">
							<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
							<h3 class="single-meta"><?php _e( 'Written By: ', 'fotographia' ); the_author_posts_link();?> &bull; <?php the_date( get_option( 'date_format' ) ); ?></h3>
						</div>
					<?php } ?>
				<?php endwhile; endif; ?>
				<div id="inner-content" class="row">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<main id="post-single" class="large-12 medium-12 columns first" role="main">
	 	   						<section class="entry-content" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <!-- end article section -->
								<footer class="article-footer">
									<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'fotographia' ) . '</span> ', ', ', '' ); ?></p>
								</footer> <!-- end article footer -->
								<div class="row">
									<?php $prevPost = get_previous_post();?>
									<?php $nextPost = get_next_post();?>
									<?php if ($prevPost) { previous_post_link( '<div class="large-6 medium-6 columns"><div class="previous-post">' . get_the_post_thumbnail( $prevPost->ID ) . '<span class="paginate-title">&laquo;&laquo; %link</span></div></div>', '%title' ); } ?>
									<?php if ($nextPost) { next_post_link( '<div class="large-6 medium-6 columns"><div class="next-post">' . get_the_post_thumbnail( $nextPost->ID ) . '<span class="paginate-title">%link &raquo;&raquo;</span></div></div>', '%title' ); } ?>
								</div>
								<?php $show_bio = esc_attr( get_theme_mod( 'fotographia-author-bio' ) ); if ($show_bio == 1) { echo wp_kses_post( fotographia_author_bio() ); } ?>
								<?php comments_template(); ?>
							</main>
						</article> <!-- end article -->
					<?php endwhile; endif; ?>
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>