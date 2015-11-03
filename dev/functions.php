<?php
/**
 * dev functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dev
 */

if ( ! function_exists( 'dev_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dev_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on dev, use a find and replace
	 * to change 'dev' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dev', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'dev' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dev_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // dev_setup
add_action( 'after_setup_theme', 'dev_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dev_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dev_content_width', 640 );
}
add_action( 'after_setup_theme', 'dev_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dev_widgets_init() {
	// Full Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Full Sidebar', 'dev' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s col-1-1">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	// Half Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Half Sidebar', 'dev' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s col-1-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'dev_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dev_scripts() {
	wp_enqueue_style( 'dev-style', get_stylesheet_uri() );

	wp_enqueue_script( 'dev-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'dev-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dev_scripts' );

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Make pull-quote shortcode and quicktag.
 */

// Add Pull-quote
function pullquote_shortcode( $atts , $content = null ) {

    return '<aside class="pullquote" role="note">' . '<h6 class="screen-reader-text">Quoted Text</h6>'. $content . '</aside>';

}
add_shortcode( 'pullquote', 'pullquote_shortcode' );

// Add Divider
function divider_shortcode( $atts , $content = null ) {

    return '<div class="divider">' . $content . '</div>';

}
add_shortcode( 'divider', 'divider_shortcode' );

// Add Quicktags
function custom_quicktags() {

    if ( wp_script_is( 'quicktags' ) ) {
    ?>
    <script type="text/javascript">
    QTags.addButton( 'pull_quote', 'pull-quote', '[pullquote]', '[/pullquote]', 'b', 'Special Quote', 1 );
    QTags.addButton( 'credit', 'credit', '<span>', '</span>', '', 'credit', 2 );
    QTags.addButton( 'divider', 'divider', '[divider]', '[/divider]', '', 'Divider', 3 );
    </script>
    <?php
    }

}
add_action( 'admin_print_footer_scripts', 'custom_quicktags' );

