<?php
/**
 * mooi Theme Customizer.
 *
 * @package mooi
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mooi_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->remove_section( 'colors');
	$wp_customize->remove_section( 'header_image');
	$wp_customize->remove_section( 'background_image');
}
add_action( 'customize_register', 'mooi_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mooi_customize_preview_js() {
	wp_enqueue_script( 'mooi_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'mooi_customize_preview_js' );

/**
 * Add the theme configuration
 */
mooi_Kirki::add_config( 'mooi_theme', array(
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
) );

/**
 * Add the typography section
 */
mooi_Kirki::add_section( 'typography', array(
	'title'      => esc_attr__( 'Typography', 'mooi' ),
	'priority'   => 2,
	'capability' => 'edit_theme_options',
) );

/**
 * Add the paragraph-typography control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
	'type'        => 'typography',
	'settings'    => 'paragraph_typography',
	'label'       => esc_attr__( 'Paragraph Typography', 'mooi' ),
	'description' => esc_attr__( 'Select the main typography options for the paragraph text and lists on your site.', 'mooi' ),
	'help'        => esc_attr__( 'The typography options you set here apply to all the paragraph and list content on your site.', 'mooi' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Open Sans Condensed',
		'variant'        => '400',
		'font-size'      => '16px',
		'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		'color'          => '#ffffff',
	),
	'output' => array(
		array(
			'element' => array ('p', 'li' ),
		),
	),
) );

/**
 * Add the body-typography control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
	'type'        => 'typography',
	'settings'    => 'headers_typography',
	'label'       => esc_attr__( 'Headers Typography', 'mooi' ),
	'description' => esc_attr__( 'Select the typography options for your headers.', 'mooi' ),
	'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).', 'mooi' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Open Sans Condensed',
		'variant'        => '400',
		// 'font-size'      => '16px',
		// 'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		'color'          => '#fdd017',
	),
	'output' => array(
		array(
			'element' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.h1', '.h2', '.h3', '.h4', '.h5', '.h6' ),
		),
	),
) );

/**
 * Add the site title control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
	'type'        => 'typography',
	'settings'    => 'title_typography',
	'label'       => esc_attr__( 'Title Typography', 'mooi' ),
	'description' => esc_attr__( 'Select the typography options for your site title.', 'mooi' ),
	'help'        => esc_attr__( 'The typography options you set here apply to your site title.', 'mooi' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Open Sans Condensed',
		'variant'        => '400',
		//'font-size'      => '16px',
		'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		'color'          => '#fdd017',
	),
	'output' => array(
		array(
			'element' => array( '.site-title a'),
		),
	),
) );

/**
 * Add the navigation links control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
	'type'        => 'typography',
	'settings'    => 'navigation_typography',
	'label'       => esc_attr__( 'Navigation Typography', 'mooi' ),
	'description' => esc_attr__( 'Select the typography options for your menu .', 'mooi' ),
	'help'        => esc_attr__( 'The typography options you set here apply to your menu.', 'mooi' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Open Sans Condensed',
		'variant'        => '400',
		//'font-size'      => '16px',
		'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		'color'          => '#fdd017',
	),
	'output' => array(
		array(
			'element' => array( '.main-navigation a'),
		),
	),
) );

/**
 * Add the links control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
	'type'        => 'typography',
	'settings'    => 'links_typography',
	'label'       => esc_attr__( 'Links Typography', 'mooi' ),
	'description' => esc_attr__( 'Select the typography options for your links.', 'mooi' ),
	'help'        => esc_attr__( 'The typography options you set here apply to your links.', 'mooi' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Open Sans Condensed',
		'variant'        => '400',
		//'font-size'      => '16px',
		'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		'color'          => '#fdd017',
	),
	'output' => array(
		array(
			'element' => array( 'a' ),
		),
	),
) );

/**
 * Add the Background panel
 */
mooi_Kirki::add_panel( 'backgrounds', array(
	'priority'    => 10,
	'title'       => __( 'Backgrounds', 'mooi' ),
) );

/**
 * Add the header background section
 */
mooi_Kirki::add_section( 'header_background', array(
	'title'      => esc_attr__( 'Header Background', 'mooi' ),
	'priority'   => 2,
	'capability' => 'edit_theme_options',
	'panel'       => 'backgrounds',
) );

/**
 * Add the body background section
 */
mooi_Kirki::add_section( 'body_background', array(
	'title'      => esc_attr__( 'Body Background', 'mooi' ),
	'priority'   => 2,
	'capability' => 'edit_theme_options',
	'panel'       => 'backgrounds',
) );

/**
 * Add the footer background section
 */
mooi_Kirki::add_section( 'footer_background', array(
	'title'      => esc_attr__( 'Footer Background', 'mooi' ),
	'priority'   => 2,
	'capability' => 'edit_theme_options',
	'panel'       => 'backgrounds',
) );

/**
 * Add the header background control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
    'type'        => 'background',
    'settings'    => 'header_background',
    'label'       => esc_attr__( 'Choose your header background', 'mooi' ),
    'description' => esc_attr__( 'The header background you specify here will apply to the header area, including your menus and your branding.', 'mooi' ),
    'section'     => 'header_background',
    'default'     => array(
        'color'    => '#333333',
        'image'    => '',
        'repeat'   => 'no-repeat',
        'size'     => 'cover',
        'attach'   => 'fixed',
        'position' => 'left-top',
    ),
    'priority'    => 10,
    'output'      => '#masthead'
) );

/**
 * Add the main background control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
    'type'        => 'background',
    'settings'    => 'main_background',
    'label'       => esc_attr__( 'Choose your main background', 'mooi' ),
    'description' => esc_attr__( 'The background you specify here will apply to the main part of your page, where your content will be.', 'mooi' ),
    'section'     => 'body_background',
    'default'     => array(
        'color'    => '#333333',
        'image'    => '',
        'repeat'   => 'no-repeat',
        'size'     => 'cover',
        'attach'   => 'fixed',
        'position' => 'left-top',
    ),
    'priority'    => 10,
    'output'      => '#content'
) );

/**
 * Add the footer background control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
    'type'        => 'background',
    'settings'    => 'footer_background',
    'label'       => esc_attr__( 'Choose your footer background', 'mooi' ),
    'description' => esc_attr__( 'The background you specify here will apply to the footer of your theme.', 'mooi' ),
    'section'     => 'footer_background',
    'default'     => array(
        'color'    => '#333333',
        'image'    => '',
        'repeat'   => 'no-repeat',
        'size'     => 'cover',
        'attach'   => 'fixed',
        'position' => 'left-top',
    ),
    'priority'    => 10,
    'output'      => '#colophon'
) );

/**
 * Add the footer text section
 */
mooi_Kirki::add_section( 'footer_text', array(
	'title'      => esc_attr__( 'Footer', 'mooi' ),
	'priority'   => 110,
	'capability' => 'edit_theme_options',
) );

/**
 * Add the footer horizontal line color control
 */
Kirki::add_field( 'mooi_theme', array(
	'type'        => 'color',
	'settings'    => 'foot_line',
	'label'       => esc_attr__( 'Change the color of the horizontal line in the footer', 'mooi' ),
	'section'     => 'footer_text',
	'default'     => '#fdd017',
	'priority'    => 10,
	'output' => array(
		array(
			'element' => array( '.foot-line' ),
		),
	),
) );

/**
 * Add the footer text control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
	'type'        => 'text',
	'settings'    => 'footer_start_text',
	'label'       => esc_attr__( 'Enter some text', 'mooi' ),
	'description' => esc_attr__( 'This will replace the All rights reserved text in the footer.', 'mooi' ),
	'section'     => 'footer_text',
	'default'     => 'All rights reserved',
) );

/**
 * Add the footer year control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
	'type'        => 'number',
	'settings'    => 'footer_year',
	'label'       => esc_attr__( 'Enter a year', 'mooi' ),
	'description' => esc_attr__( 'This will be the year in your footer.', 'mooi' ),
	'section'     => 'footer_text',
	'default'     => 2016,
	'choices'     => array(
		'min'  => 1990,
		'max'  => 2100,
		'step' => 1,
	),
) );

/**
 * Add the footer_text-typography control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
	'type'        => 'typography',
	'settings'    => 'footer_typography',
	'label'       => esc_attr__( 'Footer Typography', 'mooi' ),
	'description' => esc_attr__( 'Select the typography options for the text in your footer.', 'mooi' ),
	'help'        => esc_attr__( 'The typography options you set here apply to the All rights reserved and date in your footer.', 'mooi' ),
	'section'     => 'footer_text',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Open Sans Condensed',
		'variant'        => '400',
		'font-size'      => '25px',
		// 'letter-spacing' => '0',
		'color'          => '#ffffff',
	),
	'output' => array(
		array(
			'element' => array ( '.footer_text' ),
		),
	),
) );

/**
 * Add the font awesome copyright icon control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
	'type'        => 'typography',
	'settings'    => 'fa_typography',
	'label'       => esc_attr__( 'Copyright Icon', 'mooi' ),
	'description' => esc_attr__( 'Select the font size and color for your copyright icon.', 'mooi' ),
	'help'        => esc_attr__( 'The typography options you set here will only apply to the font awesome copyright icon.', 'mooi' ),
	'section'     => 'footer_text',
	'priority'    => 10,
	'default'     => array(
		'variant'        => '700',
		'font-size'      => '28px',
		'line-height'    => '1.5',
		'color'          => '#fdd017',
	),
	'output' => array(
		array(
			'element' => array( '.icon' ),
		),
	),
) );

/**
 * Add the footer link control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
	'type'        => 'text',
	'settings'    => 'footer_link',
	'label'       => esc_attr__( 'Enter your website URL', 'mooi' ),
	'description' => esc_attr__( 'This is the link in the footer.', 'mooi' ),
	'section'     => 'footer_text',
	'default'     => 'http://lanigouws.co.za',
) );

/**
 * Add the footer name control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
	'type'        => 'text',
	'settings'    => 'footer_name',
	'label'       => esc_attr__( 'Enter your website/business name', 'mooi' ),
	'description' => esc_attr__( 'This will be the website name in the footer.', 'mooi' ),
	'section'     => 'footer_text',
	'default'     => 'Lani Gouws',
) );

/**
 * Add the footer link's name typography control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
	'type'        => 'typography',
	'settings'    => 'footer_name_typography',
	'label'       => esc_attr__( 'Footer Website Name', 'mooi' ),
	'description' => esc_attr__( 'Select the typography options for your website/business name link in the footer.', 'mooi' ),
	'help'        => esc_attr__( 'The typography options you set here will apply to only the link in the footer.', 'mooi' ),
	'section'     => 'footer_text',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Open Sans Condensed',
		'variant'        => '900',
		'font-size'      => '28px',
		'color'          => '#ffffff',
	),
	'output' => array(
		array(
			'element' => ('.footer_name'),
		),
	),
) );

/**
 * Add the footer toggle switch control
 */
Kirki::add_field( 'mooi_theme', array(
	'type'        => 'toggle',
	'settings'    => 'footer_toggle',
	'label'       => esc_attr__( 'Switch the default footer off', 'my_textdomain' ),
	'description' => esc_attr__( 'Switch this off to write your own text in the footer .', 'mooi' ),
	'section'     => 'footer_text',
	'default'     => '1',
	'priority'    => 10,
) );

/**
 * Add the footer textarea control
 */
Kirki::add_field( 'mooi_theme', array(
	'type'     => 'textarea',
	'settings' => 'footer_textarea',
	'label'    => __( 'Footer Textarea', 'my_textdomain' ),
	'section'  => 'footer_text',
	'default'  => esc_attr__( 'The text you write here will be displayed at the bottom of your footer.', 'my_textdomain' ),
	'priority' => 10,
) );

/**
 * Add the footer textarea's typography control
 */
mooi_Kirki::add_field( 'mooi_theme', array(
	'type'        => 'typography',
	'settings'    => 'footer_textarea_typography',
	'label'       => esc_attr__( 'Footer Textarea Typography', 'mooi' ),
	'description' => esc_attr__( 'Select the typography options for your footer textarea.', 'mooi' ),
	'help'        => esc_attr__( 'The typography options you set here will apply only if you have switched off your default footer and entered some text in the textarea.', 'mooi' ),
	'section'     => 'footer_text',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Open Sans Condensed',
		'variant'        => '400',
		'font-size'      => '22px',
		'color'          => '#ffffff',
	),
	'output' => array(
		array(
			'element' => ('.footer_textarea'),
		),
	),
) );


?>



