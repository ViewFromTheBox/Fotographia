<?php
/**
* Front-page.php
*
* @package Fotographia
* @author  Jacob Martella
* @version  1.3
*/
?>
<?php get_header(); ?>
<?php
	if ( 'posts' == get_option( 'show_on_front' ) ) {
        include( get_home_template() );
	} else {
?>
	<div class="row top-posts">
	    <?php
	      $top_cat = esc_attr( get_theme_mod( 'fotographia-home-slider-cat' ) ); if ( $top_cat ) { $cat = esc_attr( get_theme_mod( 'fotographia-home-slider-cat' ) ); } else { $cat = 'none'; }
	      $slide_args = array(
	        'cat' 				=> $cat,
	        'posts_per_page' 	=> 5,
	        'orderby' 			=> 'date',
	        'order' 			=> 'DESC'
	      );
	      $slide = new WP_Query( $slide_args );
	      $count = 1;
	      if ( $slide->have_posts() ) : while ( $slide->have_posts() ) : $slide->the_post(); $do_not_duplicate[] = $post->ID;
	    ?>
	      <div id="top-post-<?php echo $count; ?>" class="top-post">
	        <a href="<?php the_permalink(); ?>">
	          <?php the_post_thumbnail( 'fotographia-home-top' ); ?>
	          <span class="slide-title-area">
	            <h3 class="category"><?php $cat = get_the_category(); echo esc_html( $cat[0]->name ); ?></h3>
	            <h1 class="title"><?php the_title(); ?></h1>
	          </span>
	        </a>
	      </div>
	    <?php $count += 1; endwhile; endif; ?>
	</div>
	<div class="row home-posts">
	  <div class="large-8 columns">
	    <?php
	      $number_posts = esc_attr( get_theme_mod( 'fotographia-home-num') ); if ( $number_posts ) { $home_num = esc_attr( get_theme_mod( 'fotographia-home-num' ) ); } else { $home_num = 11; }
	      $args = array(
	        'showposts' 			=> $home_num,
	        'ignore_sticky_posts' 	=> true,
	        'post__not_in' 			=> $do_not_duplicate,
	        'orderby' 				=> 'date',
	        'order' 				=> 'DESC'
	      );
	      $home = new WP_Query( $args );
	      $count = 1;
	      if ( $home->have_posts() ) : while ( $home->have_posts() ) : $home->the_post();
	    ?>
	        <?php if ( $count == 1 or $count == 2 ) { ?><div class="row"><?php } ?>
	            <?php if ( $count == 1 ) { $class = 'large-12 medium-12 columns'; } else { $class = 'large-6 medium-6 columns'; } ?>
	            <div class="<?php echo esc_attr( $class ); ?>">
	              <article <?php post_class( array( 'story' ) ); ?>>
	                  <a href="<?php the_permalink(); ?>">
	                    <div class="story-wrap">
	                      <?php the_post_thumbnail( 'fotographia-home' ); ?>
	                    </div>
	                    <div class="photo-wrap">
	                      <?php fotographia_story_slideshow( get_the_ID() ); ?>
	                    </div>
	                    <span class="title-area">
	                      <h5 class="category"><?php $cat = get_the_category(); echo esc_html( $cat[0]->name ); ?></h5>
	                      <h3 class="title"><?php the_title(); ?></h3>
	                    </span>
	                  </a>
	              </article>
	            </div>
	        <?php if ( $count == 1 or $count == 3 ) { ?></div><?php } ?>
	    <?php $count += 1; if ( $count == 4 ) { $count = 1; } endwhile; endif; ?>
	    <?php if ( $count == 3 ) { ?> </div> <?php } ?>
	  </div>
	  <?php get_sidebar(); ?>
	</div>
<?php } ?>
<?php get_footer(); ?>