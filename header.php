<?php
/**
* Header.php
*
* @package Fotographia
* @author  Jacob Martella
* @version  1.3
*/
?>
<!doctype html>
	<html class="no-js"  <?php language_attributes(); ?>>
		<head>
			<meta charset="utf-8">
			<!-- Force IE to use the latest rendering engine available -->
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<!-- Mobile Meta -->
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>">
			<?php wp_head(); ?>
		</head>
		<body <?php body_class(); ?>>
			<div class="off-canvas-wrap" data-offcanvas>
				<div class="inner-wrap">
					<div id="container">
						<header class="header" role="banner">
							<div class="show-for-large-up contain-to-grid">
								<nav class="top-bar top-menu" data-topbar>	
									<div class="title-area">
										<?php if ( get_header_image() ) { ?>
							 				<a href="<?php echo esc_url( get_home_url() ); ?>"><img src="<?php echo esc_url( get_header_image() ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>'" alt="<?php echo esc_attr( get_bloginfo( 'name' ) . __( 'Header Image', 'fotographia' ) ); ?>" /></a>
							 			<?php } else { ?>
							 				<h1 class="site-title"><a href="<?php echo esc_url( get_home_url() ); ?>" style="<?php echo 'color: #' . get_header_textcolor(). ';'; ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
										<?php } ?>
									</div>
									<section class="top-bar-section left">
										<?php wp_nav_menu( array(
									        'container' 		=> false,
									        'container_class' 	=> '',           		// class of container
        									'menu' 				=> '',                  // menu name
									        'menu_class' 		=> 'top-bar-menu right',
									        'theme_location' 	=> 'main-nav',
									        'before' 			=> '',                  // before each link <a>
        									'after' 			=> '',                  // after each link </a>
        									'link_before' 		=> '',                  // before each link text
        									'link_after' 		=> '',                  // after each link text
									        'depth' 			=> 5,
									        'fallback_cb' 		=> false,
									        'walker' 			=> new Fotographia_Top_Bar_Walker(),
        								) );?>
									</section>
									<?php echo fotographia_social_links(); ?>
								</nav>
							</div>
							<div class="show-for-small-up hide-for-large-up">
								<nav class="tab-bar">
									<section class="middle tab-bar-section">
										<?php if ( get_header_image() ) { ?>
											<a href="<?php echo esc_url( get_home_url() ); ?>"><img src="<?php echo esc_url( get_header_image() ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>'" alt="<?php echo esc_attr( get_bloginfo( 'name' ) . __( 'Header Image', 'fotographia' ) ); ?>" /></a>
							 			<?php } else { ?>
											<h1 class="title"><a href="<?php echo esc_url( get_home_url() ); ?>" style="<?php echo 'color: #' . get_header_textcolor() . ';'; ?>"><?php esc_html( bloginfo( 'name' ) ); ?></a></h1>
										<?php } ?>
									</section>
									<section class="left-small">
										<a href="#" class="left-off-canvas-toggle menu-icon" ><span></span></a>
									</section>
								</nav>
							</div>
													
							<aside class="left-off-canvas-menu show-for-small-up hide-for-large-up">
								<ul class="off-canvas-list">
									<li><label><?php _e( 'Navigation', 'fotographia' ); ?></label></li>
										<?php wp_nav_menu( array(
									        'container' 		=> false,
									        'container_class' 	=> '',           		// class of container
        									'menu' 				=> '',                  // menu name
									        'menu_class' 		=> 'off-canvas-list',
									        'theme_location' 	=> 'main-nav',
									        'before' 			=> '',                  // before each link <a>
        									'after' 			=> '',                  // after each link </a>
        									'link_before' 		=> '',                  // before each link text
        									'link_after' 		=> '',                  // after each link text
									        'depth' 			=> 5,
									        'fallback_cb' 		=> false,
									        'walker' 			=> new Fotographia_Offcanvas_Walker(),
									    ) ); ?>
									<li><label><?php _e( 'Social Media Links', 'fotographia' ); ?></label></li>
										<?php echo wp_kses_post( fotographia_social_links() ); ?>
								</ul>
							</aside>
										
							<a class="exit-off-canvas"></a>							 	
													</header> <!-- end .header -->
