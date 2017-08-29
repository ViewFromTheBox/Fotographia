<?php
/**
* functions.php
*
* @package Fotographia
* @author Jacob Martella
* @version 1.4
*/
/**
* Table of Contents
* I. General Functions
* II. Header Functions
* III. Home Functions
* IV. Footer Functions
* V. Single Post Functions
* VI. Archive Functions
* VII. Author Functions
* VIII. Comments Functions
* IX. Other Functions
*/
/**
******************** I. General Functions ********************************* 
*/
/**
* Enqueue the necessary scripts
*/
function fotographia_scripts_and_styles() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  if (!is_admin()) {
    $theme_version = wp_get_theme()->Version;

    // Modernizr from bower_components
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/bower_components/foundation/js/vendor/modernizr.js', array(), '2.8.3', true );

    //* Load What-Input files in footer
    wp_enqueue_script( 'what-input', get_template_directory_uri() . '/vendor/what-input/what-input.min.js', array(), '', true );

    //* Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/foundation.min.js', array( 'jquery' ), '6.0', true );

    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/js/min/scripts.js', array( 'jquery' ), '', true );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

    //* Load the Fonts
    wp_enqueue_style( 'lato', '//fonts.googleapis.com/css?family=Lato:100,300,400,700' );
    wp_enqueue_style( 'oswald', '//fonts.googleapis.com/css?family=Oswald:400,700,300' );
    wp_enqueue_style( 'source-sans', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' );
    wp_enqueue_style( 'playfair', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700' );

    //* Load the scripts for the homepage slider
    wp_enqueue_script( 'liquid-slider', get_template_directory_uri() . '/js/jquery.liquid-slider.js' );
    wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.min.js' );
	wp_enqueue_script( 'touchSwipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js' );
    wp_enqueue_script( 'fotographia-home-slider', get_template_directory_uri() . '/js/fotographia-home-slider.js' );
    wp_enqueue_style( 'liquid-slider-css', get_template_directory_uri() . '/css/liquid-slider.css' );
	wp_enqueue_style( 'editor-style', get_template_directory_uri() . '/css/editor-style.css' );

	// Register main stylesheet
    wp_enqueue_style( 'fotographia-style', get_stylesheet_uri() );

    //* Load the script for the rotating slideshows on archive and home pages
    wp_enqueue_script( 'fotographia-cycle', get_template_directory_uri() . '/js/fotographia-cycle.js' );
    wp_enqueue_script( 'fotographia-hide-show', get_template_directory_uri() . '/js/fotographia-show-hide.js' );

    if ( get_theme_mod( 'fotographia-color-scheme' ) == 'dark' ) {
	  wp_enqueue_style( 'fotographia-dark-style', get_template_directory_uri() . '/css/dark.css' );
	}
  }
}
add_action( 'wp_enqueue_scripts', 'fotographia_scripts_and_styles', 999 );
// Adding WP Functions & Theme Support
function fotographia_theme_support() {

	// Add WP Thumbnail Support
	add_theme_support('post-thumbnails');
	
	// Add Image Sizes
	add_image_size( 'fotographia-home-top', 4000, 3000, true );
	add_image_size( 'fotographia-home', 2000, 1500, true );
	add_image_size( 'fotographia-archive', 2000, 1500, true );
	add_image_size( 'fotographia-single', 5000, 3333, true );

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );

	// Add Support for WP Menus
	add_theme_support( 'menus' );
	
	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );
	
	// Add HTML5 Support
	add_theme_support( 'html5', 
	         array( 
	         	'comment-list', 
	         	'comment-form', 
	         	'search-form', 
	         ) 
	);

	//* Add support for custom background
	$args = array(
		'default-color' => '999999',
	);
	add_theme_support( 'custom-background', $args );

	//* Add Support for Custom Header
	$args = array(
		'flex-width' 			=> true,
		'width'					=> 200,
		'flex-height'			=> true,
		'height'				=> 50,
		'default-image' 		=> '',
		'default-text-color' 	=> '777777',
		'upload'				=> true,
	);
	add_theme_support( 'custom-header', $args );

	//* Add the Editor Stylesheet
	add_editor_style( 'css/editor-style.css' );

	if ( ! isset( $content_width ) ) $content_width = 900;

	//* Add in theme support for custom logo
	add_theme_support( 'custom-logo' );

	//* Add in the text domain
	load_theme_textdomain( 'fotographia', get_template_directory() . '/languages' );
	
}
add_action( 'after_setup_theme','fotographia_theme_support', 16 );
/**
* Include custom functions
*/
require( 'functions/menu-walkers.php' );
require( 'functions/theme-options.php' );
/**
* Register Menus
*/
register_nav_menus(
	array(
		'top-nav' 		=> __( 'Top Menu', 'fotographia' ),   // Main nav in header
		'main-nav' 		=> __( 'Main Menu', 'fotographia' ),   // Main nav in header
		'footer-links' 	=> __( 'Footer Links', 'fotographia' ) // Secondary nav in footer
	)
);
//* Register the sidebar(s)
function fotographia_register_sidebars() {
	register_sidebar(array(
		'id' 			=> 'sidebar1',
		'name' 			=> __( 'Sidebar', 'fotographia' ),
		'description' 	=> __( 'The first (primary) sidebar.', 'fotographia' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4 class="widgettitle">',
		'after_title' 	=> '</h4>',
	));
}
add_action( 'widgets_init', 'fotographia_register_sidebars' );
/**
******************** II. Header Functions ********************************* 
*/
/**
* Returns the HTML to social media links and images.
*
* @return string, HTML of social media images and links
*/
if ( ! function_exists( 'fotographia_social_links' ) ) {
	function fotographia_social_links() {
		$html = '<div class="social-links">';
		$fotographia_facebook = get_theme_mod( 'fotographia-facebook' );
		if ( $fotographia_facebook ) {
			$html .= '<div class="social-link facebook"><a href="' . esc_url( $fotographia_facebook ) . '" target="_blank"><img src="' . esc_url( get_template_directory_uri() . '/images/facebook.png' ) . '" /></a></div>';
		}
		$fotographia_twitter = get_theme_mod( 'fotographia-twitter' );
		if ( $fotographia_twitter ) {
			$html .= '<div class="social-link twitter"><a href="' . esc_url( $fotographia_twitter ) . '" target="_blank"><img src="' . esc_url( get_template_directory_uri() . '/images/twitter.png' ) . '" /></a></div>';
		}
		$fotographia_google_plus = get_theme_mod( 'fotographia-google-plus' );
		if ( $fotographia_google_plus ) {
			$html .= '<div class="social-link google-plus"><a href="' . esc_url( $fotographia_google_plus ) . '" target="_blank"><img src="' . esc_url( get_template_directory_uri() . '/images/googleplus.png' ) . '" /></a></div>';
		}
		$fotographia_youtube = get_theme_mod( 'fotographia-youtube' );
		if ( $fotographia_youtube ) {
			$html .= '<div class="social-link youtube"><a href="' . esc_url( $fotographia_youtube ) . '" target="_blank"><img src="' . esc_url( get_template_directory_uri() . '/images/youtube.png' ) . '" /></a></div>';
		}
		$fotographia_tumblr = get_theme_mod( 'fotographia-tumblr');
		if ( $fotographia_tumblr ) {
			$html .= '<div class="social-link tumblr"><a href="' . esc_url( $fotographia_tumblr ) . '" target="_blank"><img src="' . esc_url( get_template_directory_uri() . '/images/tumblr.png' ) . '" /></a></div>';
		}
		$fotographia_instagram = get_theme_mod( 'fotographia-instagram' );
		if ( $fotographia_instagram ) {
			$html .= '<div class="social-link instagram"><a href="' . esc_url( $fotographia_instagram ) . '" target="_blank"><img src="' . esc_url( get_template_directory_uri() . '/images/instagram.png' ) . '" /></a></div>';
		}
		$fotographia_rss_feed = get_theme_mod( 'fotographia-rss-feed' );
		if ( $fotographia_rss_feed ) {
			$html .= '<div class="social-link rss"><a href="' . esc_url( $fotographia_rss_feed ) . '" target="_blank"><img src="' . esc_url( get_template_directory_uri() . '/images/rss.png' ) . '" /></a></div>';
		}
		$html .= '</div>';

		return $html;
	}
}
/**
******************** III. Home Functions ********************************* 
*/
/**
* Returns HTML for the photo slideshow to show up on hover on the homepage and archive pages
*
* @param int $the_id the post id to grab the images
*/
if ( ! function_exists( 'fotographia_story_slideshow' ) ) {
	function fotographia_story_slideshow( $the_id ) {
		$media = get_attached_media( 'image', $the_id );
		foreach ( $media as $image ) {
			echo '<img src="' . esc_url( $image->guid ) . '" />';
		}
	}
}
/**
******************** IV. Footer Functions ********************************* 
*/
/**
******************** V. Single Post Functions ********************************* 
*/
/**
* Returns the HTML for the author bio area on the single post
*
* @return string, HTML for the author bio area
*/
if ( ! function_exists( 'fotographia_author_bio' ) ) {
	function fotographia_author_bio() {
		$html = '<section class="author-bio clearfix">';
		if ( get_avatar( esc_url( get_the_author_meta( 'email' ) ) ) ) {
			$html .= '<div class="mug-shot">' . get_avatar( esc_url( get_the_author_meta( 'email' ) ), $size = 96 ) . '</div>';
		}
		if ( esc_attr( get_theme_mod( 'giornalismo-author-position' ) ) ) {
			$position = ', ' . esc_html( get_the_author_meta( 'author-position' ) );
		} else {
			$position = '';
		}
		$html .= '<h3 class="title">' . __( 'About ', 'fotographia' ) . esc_html( get_the_author_meta( 'display_name' ) ) . $position . '</h3>';
		$html .= '<p class="bio">' . esc_html( get_the_author_meta( 'description' ) ) . '</p>';
		$html .= '</section>';

		return $html;
	}
}
/**
******************** VI. Archive Functions ********************************* 
*/
/**
******************** VII. Author Functions ********************************* 
*/
/**
******************** VIII. Comments Functions ********************************* 
*/
//* Comment Layout
if ( ! function_exists('fotographia_comments' ) ) {
	function fotographia_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class( 'panel' ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix large-12 columns">
			<header class="comment-author">
				<div class="author-mug"><?php echo get_avatar( $comment, $size = '70' ); ?></div>
				<?php
				// create variable
				$bgauthemail = get_comment_author_email();
				?>
				<h3 class="comment-header"><?php echo get_comment_author_link() ?><br/>
					<time datetime="<?php echo comment_time( 'Y-m-j' ); ?>"><a
								href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time( __( 'g:ia, F jS, Y', 'fotographia' ) ); ?> </a>
					</time>
					<?php edit_comment_link( __( '(Edit)', 'fotographia' ), '  ', '' ) ?></h3>
			</header>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'fotographia' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link( array_merge( $args, array( 'depth'     => $depth,
			                                                     'max_depth' => $args['max_depth']
			) ) ) ?>
		</article>
		<!-- </li> is added by WordPress automatically -->
		<?php
	}
}
/**
******************** IX. Other Functions ********************************* 
*/

?>