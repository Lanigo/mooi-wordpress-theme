<?php
/**
 * mooi functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mooi
 */

if ( ! function_exists( 'mooi_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mooi_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mooi, use a find and replace
	 * to change 'mooi' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mooi', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'mooi' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mooi_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'mooi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mooi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mooi_content_width', 640 );
}
add_action( 'after_setup_theme', 'mooi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mooi_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mooi' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mooi' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

/*
* The left footer sidebar
*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Left', 'mooi' ),
		'id'            => 'footer-left',
		'description'   => esc_html__( 'Widgets you add here will appear in the left column of the footer.', 'mooi' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

/*
* The middle footer sidebar
*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Middle', 'mooi' ),
		'id'            => 'footer-middle',
		'description'   => esc_html__( 'Widgets you add here will appear in the middle column of the footer.', 'mooi' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

/*
* The right footer sidebar
*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Right', 'mooi' ),
		'id'            => 'footer-right',
		'description'   => esc_html__( 'Widgets you add here will appear in the right column of the footer.', 'mooi' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mooi_widgets_init' );

/**
* Create Logo Setting and Upload Control
*/
function mooi_new_customizer_settings($wp_customize) {
	// add a setting for the site logo
	$wp_customize->add_setting('mooi_logo');
	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mooi_logo',
		array(
			'label' => 'Upload Logo',
			'section' => 'title_tagline',
			'settings' => 'mooi_logo',
	) ) );
}
add_action('customize_register', 'mooi_new_customizer_settings');

/**
* Register the social menu
*/

add_action( 'init', 'mooi_register_nav_menus' );

function mooi_register_nav_menus() {
	register_nav_menu( 'social', __( 'Social', 'mooi' ) );
}

/**
 * Enqueue scripts and styles.
 */
function mooi_scripts() {
	wp_enqueue_style( 'mooi-style', get_stylesheet_uri() );

	// Here we enqueue Font Awesome properly
	wp_enqueue_style( 'mooi-fa-css', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '' );	

	// Here we enqueue the Bootstrap style
	wp_enqueue_style( 'mooi-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '' );

	// Here we enqueue the Bootstrap JavaScript
	wp_enqueue_script( 'mooi-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );

	// Here we enqueue our default Google font
	wp_enqueue_style( 'mooi-google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300italic,400italic,700italic,400,700,300', false );
	
	wp_enqueue_script( 'mooi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mooi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mooi_scripts' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Recommend the Kirki plugin
 */
require get_template_directory() . '/inc/include-kirki.php';

/**
 * Load the Kirki Fallback class
 */
require get_template_directory() . '/inc/kirki-fallback.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';