<?php
/**
* Index.php
*
* @package Fotographia
* @author  Jacob Martella
* @version  1.4
*/
/**
* To change the archive pages, edit the archives.php template. 
*/
?>
<?php get_header(); ?>
<div id="content" class="archive">
	<?php if ( have_posts() ) : the_post(); ?>
	<div class="archive-page-header">
		<h1 class="archive-page-title"><?php the_archive_title();?></h1>
	</div>
	<?php endif; ?>
	<?php rewind_posts(); ?>
	<div id="inner-content" class="row index">
		<main id="main" class="large-8 medium-12 columns first" role="main">
			<?php $count = 1; if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if ( $count == 1 or $count == 2 ) { ?><div class="row"><?php } ?>
				<?php if ( $count == 1 ) { $class = 'large-12 medium-12 columns'; } else { $class = 'large-6 medium-6 columns'; } ?>
				<div class="<?php echo esc_attr( $class ); ?>">
					<article <?php post_class( array( 'story' ) ); ?>>
						<a href="<?php the_permalink(); ?>">
							<div class="story-wrap">
								<?php the_post_thumbnail( 'fotographia-archive' ); ?>
							</div>
							<div class="photo-wrap">
								<?php wp_kses_post( fotographia_story_slideshow( get_the_ID() ) ); ?>
							</div>
					                    <span class="article-header">
					                      <?php if ( ! is_category() ) { ?><h5 class="category"><?php $cat = get_the_category(); echo esc_html( $cat[0]->name ); ?></h5><?php } ?>
						                    <h3 class="title"><?php the_title(); ?></h3>
					                    </span>
						</a>
					</article>
				</div>
				<?php if ( $count == 1 or $count == 3 ) { ?></div><?php } ?>
				<?php $count += 1; if ( $count == 4 ) { $count = 1; } endwhile; if ( $count == 3 ) { ?> </div> <?php } the_posts_pagination(); endif; ?>
	</main> <!-- end #main -->
	<?php get_sidebar(); ?>
</div> <!-- end #inner-content -->
</div> <!-- end #content -->
<?php get_footer(); ?>
