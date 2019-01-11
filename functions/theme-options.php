<?php
/**
* Theme-options.php
*
* Theme options file, using the Customizer, for Fotographia
*
* @author Jacob Martella
* @package Fotographia
* @version 1.4
*/

//* Create the general settings section
function fotographia_general_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'general',
        array(
            'title' => __( 'Fotographia Settings', 'fotographia' ),
            'description' => __( 'These are the Fotographia theme options.', 'fotographia' ),
            'priority' => 35,
        )
    );

	//* Get the categories for the home page options
	$schemes[ 'light' ] = __( 'Light', 'fotographia' );
	$schemes[ 'dark' ] = __( 'Dark', 'fotographia' );

	//* Home Slider Category
	$wp_customize->add_setting(
		'fotographia-color-scheme',
		array(
			'default'           => 'None',
			'sanitize_callback' => 'fotographia_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'fotographia-color-scheme',
		array(
			'label'     => __( 'Color Scheme', 'fotographia' ),
			'section'   => 'general',
			'type'      => 'select',
			'choices'   => $schemes
		)
	);

    //* Get the categories for the home page options
    $cats = get_categories();
    $cat_args[ 'none' ] = __( 'None', 'fotographia' );
    foreach($cats as $cat) {
          $cat_args[$cat->term_id] = $cat->name;
    }

    //* Home Slider Category
    $wp_customize->add_setting(
        'fotographia-home-slider-cat',
        array(
            'default'           => 'None',
            'sanitize_callback' => 'fotographia_sanitize_category',
        )
    );

    $wp_customize->add_control(
        'fotographia-home-slider-cat',
        array(
            'label'     => __( 'Home Featured Category', 'fotographia' ),
            'section'   => 'general',
            'type'      => 'select',
            'choices'   => $cat_args
        )
    );

    //* Number of Home Slider Posts
    $wp_customize->add_setting(
        'fotographia-home-num',
        array(
            'default'           => '10',
            'sanitize_callback' => 'fotographia_sanitize_num',
        )
    );

    $wp_customize->add_control(
        'fotographia-home-num',
        array(
            'label'     => __( 'Number of Stories on the Homepage.', 'fotographia' ),
            'section'   => 'general',
            'type'      => 'text',
        )
    );

    //* Author Position
    $wp_customize->add_setting(
   		'fotographia-author-bio',
    	array(
        	'default'           => '',
        	'sanitize_callback' => 'fotographia_sanitize_checkbox',
    	)
	);

	$wp_customize->add_control(
    	'fotographia-author-bio',
    	array(
        	'label'     => __( 'Display the Author\'s Bio', 'fotographia' ),
        	'section'   => 'general',
        	'type'      => 'checkbox',
    	)
	);

    //* Facebook
    $wp_customize->add_setting(
        'fotographia-facebook',
        array(
            'default'           => '',
            'sanitize_callback' => 'fotographia_sanitize_link',
        )
    );

    $wp_customize->add_control(
        'fotographia-facebook',
        array(
            'label'     => __( 'Facebook Link', 'fotographia' ),
            'section'   => 'general',
            'type'      => 'text',
        )
    );

    //* Twitter
    $wp_customize->add_setting(
        'fotographia-twitter',
        array(
            'default'           => '',
            'sanitize_callback' => 'fotographia_sanitize_link',
        )
    );

    $wp_customize->add_control(
        'fotographia-twitter',
        array(
            'label'     => __( 'Twitter Link', 'fotographia' ),
            'section'   => 'general',
            'type'      => 'text',
        )
    );

    //* Google Plus
    $wp_customize->add_setting(
        'fotographia-google-plus',
        array(
            'default'           => '',
            'sanitize_callback' => 'fotographia_sanitize_link',
        )
    );

    $wp_customize->add_control(
        'fotographia-google-plus',
        array(
            'label'     => __( 'Google+ Link', 'fotographia' ),
            'section'   => 'general',
            'type'      => 'text',
        )
    );

    //* YouTube
    $wp_customize->add_setting(
        'fotographia-youtube',
        array(
            'default'           => '',
            'sanitize_callback' => 'fotographia_sanitize_link',
        )
    );

    $wp_customize->add_control(
        'fotographia-youtube',
        array(
            'label'     => __( 'YouTube Link', 'fotographia' ),
            'section'   => 'general',
            'type'      => 'text',
        )
    );

    //* Tumblr
    $wp_customize->add_setting(
        'fotographia-tumblr',
        array(
            'default'           => '',
            'sanitize_callback' => 'fotographia_sanitize_link',
        )
    );

    $wp_customize->add_control(
        'fotographia-tumblr',
        array(
            'label'     => __( 'Tumblr Link', 'fotographia' ),
            'section'   => 'general',
            'type'      => 'text',
        )
    );

    //* Instagram
    $wp_customize->add_setting(
        'fotographia-instagram',
        array(
            'default'           => '',
            'sanitize_callback' => 'fotographia_sanitize_link',
        )
    );

    $wp_customize->add_control(
        'fotographia-instagram',
        array(
            'label'     => __( 'Instagram Link', 'fotographia' ),
            'section'   => 'general',
            'type'      => 'text',
        )
    );

    //* RSS Feed
    $wp_customize->add_setting(
        'fotographia-rss-feed',
        array(
            'default'           => '',
            'sanitize_callback' => 'fotographia_sanitize_link',
        )
    );

    $wp_customize->add_control(
        'fotographia-rss-feed',
        array(
            'label'     => __( 'RSS Feed Link', 'fotographia' ),
            'section'   => 'general',
            'type'      => 'text',
        )
    );
    
}
add_action( 'customize_register', 'fotographia_general_customizer' );


//* Sanitize Links
function fotographia_sanitize_link( $input ) {
	return esc_url_raw( $input );
}

//* Sanitize Layout Option
function fotographia_sanitize_select( $input, $setting ) {
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

//* Sanitize Checkboxes
function fotographia_sanitize_checkbox( $input ) {
    return ( ( isset( $input ) && true == $input ) ? 1 : 0 );
}

//* Sanitize Category Options
function fotographia_sanitize_category( $input, $setting ) {
	$input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

//* Sanitize Numbers
function fotographia_sanitize_num( $input, $setting ) {
    $input = absint( $input );
    return ( $input ? $input : $setting->default );
}

//* Sanitize Text
function fotographia_sanitize_text( $input ) {
	return wp_filter_nohtml_kses( $input );
}
?>