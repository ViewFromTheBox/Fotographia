<?php
/**
* Header.php
*
* @package Fotographia
* @author  Jacob Martella
* @version  1.4
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
									<section class="top-bar-left">
										<?php wp_nav_menu( array(
                                            'container'	 		=> false,                           	// Remove nav container
                                            'menu_class' 		=> 'medium-horizontal menu',       		// Adding custom nav class
                                            'items_wrap' 		=> '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
                                            'theme_location' 	=> 'main-nav',        					// Where it's located in the theme
                                            'depth' 			=> 5,                                   // Limit the depth of the nav
                                            'fallback_cb' 		=> false,                         		// Fallback function (see below)
									        'walker' 			=> new Fotographia_Topbar_Menu_Walker(),
        								) );?>
									</section>
									<?php echo fotographia_social_links(); ?>
								</nav>
							</div>
							<div class="hide-for-large show-for-medium-down">
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

                            <div class="off-canvas position-right" id="off-canvas" data-off-canvas data-position="right">
                                <?php wp_nav_menu( array(
                                    'container'         => false,                           // Remove nav container
                                    'menu_class'        => 'vertical menu',                 // Adding custom nav class
                                    'items_wrap'        => '<ul id="%1$s" class="%2$s" data-accordion-menu>%3$s</ul>',
                                    'theme_location'    => 'main-nav',        			    // Where it's located in the theme
                                    'depth'             => 5,                               // Limit the depth of the nav
                                    'fallback_cb'       => false,                           // Fallback function (see below)
                                    'walker'            => new Fotographia_Off_Canvas_Menu_Walker()
                                ) ); ?>
                                <?php echo fotographia_social_links(); ?>
                            </div>
										
							<a class="exit-off-canvas"></a>							 	
													</header> <!-- end .header -->
