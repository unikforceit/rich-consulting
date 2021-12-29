<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

if ( ! function_exists( 'richconsulting_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function richconsulting_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change 'rich-consulting' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rich-consulting', get_template_directory() . '/languages' );

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
        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo');
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'rich-consulting' ),
		) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
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
			'script',
			'style'
		) );
        // Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'richconsulting_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'richconsulting_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function richconsulting_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'richconsulting_content_width', 640 );
}
add_action( 'after_setup_theme', 'richconsulting_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function richconsulting_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rich-consulting' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rich-consulting' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Services Sidebar', 'rich-consulting' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'rich-consulting' ),
		'before_widget' => '<div id="%1$s" class="sr-sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'richconsulting_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function richconsulting_scripts() {

	wp_enqueue_style('richconsulting-Montserrat',  'https://fonts.googleapis.com/css?family=Montserrat:100,300,400,600,700');
	wp_enqueue_style('richconsulting-Roboto',  'https://fonts.googleapis.com/css?family=Open+Sans:400,400i');
	wp_enqueue_style('richconsulting-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('richconsulting-fontawesome', get_template_directory_uri() . '/assets/css/all.min.css');
    wp_enqueue_style('richconsulting-main', get_template_directory_uri() . '/assets/css/unit.css');
    wp_enqueue_style('richconsulting-default', get_template_directory_uri() . '/assets/css/default.css');
	wp_enqueue_style('richconsulting-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' ); 
	}
	wp_enqueue_script('richconsulting-bootstrap',get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), richconsulting_theme_version(), true);
	wp_enqueue_script('richconsulting-script',get_template_directory_uri() . '/assets/js/unit.js', array('jquery'), richconsulting_theme_version(), true);
	wp_enqueue_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'richconsulting_scripts');

function richconsulting_admin_css() {
    wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/assets/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'richconsulting_admin_css' );

function richconsulting_theme_version(){
    $richconsultingtheme = wp_get_theme();
    $richconsulting_version = esc_html($richconsultingtheme->get( 'Version' ));
    return $richconsulting_version;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Functions which loaded from plugin.
 */
require get_template_directory() . '/inc/plug-dependent.php';

/**
 * Load plugin recommendation.
 */
 
require_once get_template_directory() . '/inc/plugin-recommendations.php';

