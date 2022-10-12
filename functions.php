<?php
/**
 * skyland functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package skyland
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'skyland_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function skyland_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on skyland, use a find and replace
		 * to change 'skyland' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'skyland', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'skyland' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'skyland_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'skyland_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skyland_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'skyland_content_width', 640 );
}
add_action( 'after_setup_theme', 'skyland_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skyland_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'skyland' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'skyland' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'skyland_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function skyland_scripts() {
	wp_enqueue_style( 'skyland-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'skyland-style', 'rtl', 'replace' );

	wp_enqueue_script( 'skyland-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skyland_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action( 'wp_enqueue_scripts', 'style_theme' );
add_action( 'wp_footer', 'scripts_theme' );
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
add_action( 'widgets_init', 'register_my_widgets' );

//--------------------------------------------------------------- SVG --------------------------------------------------------------
add_filter( 'upload_mimes', 'svg_upload_allow' );
# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	return $mimes;
}
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );
# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){
	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );
	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){
		// разрешим
		if( current_user_can('manage_options') ){
			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}
	}
	return $data;
}
//--------------------------------------------------------------- SVG --------------------------------------------------------------


//--------------------------------------------------------------- ACF --------------------------------------------------------------
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
	acf_add_options_sub_page('options');
}
//--------------------------------------------------------------- ACF --------------------------------------------------------------



add_action('init', 'my_custom_init');
function my_custom_init(){
	register_post_type('educational', array(
		'labels'             => array(
			'name'               => 'Образовательные направления', // Основное название типа записи
			'singular_name'      => 'Образовательное направление', // отдельное название записи типа Book
			'add_new'            => 'Добавить новое',
			'add_new_item'       => 'Добавить новое направление',
			'edit_item'          => 'Редактировать направление',
			'new_item'           => 'Новое образовательное направление',
			'view_item'          => 'Посмотреть образовательное направление',
			'search_items'       => 'Найти образовательное направление',
			'not_found'          => 'Образовательных направлений не найдено',
			'not_found_in_trash' => 'Не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Образовательные направления'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'supports'           => array('title')
	) );
	register_post_type('banner', array(
		'labels'             => array(
			'name'               => 'Баннеры', // Основное название типа записи
			'singular_name'      => 'Баннер', // отдельное название записи типа Book
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый баннер',
			'edit_item'          => 'Редактировать баннер',
			'new_item'           => 'Новый баннер',
			'view_item'          => 'Посмотреть баннер',
			'search_items'       => 'Найти баннер',
			'not_found'          => 'Баннеров не найдено',
			'not_found_in_trash' => 'Не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Баннеры'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array('title')
	) );
	register_post_type('social', array(
		'labels'             => array(
			'name'               => 'Социальные сети', // Основное название типа записи
			'singular_name'      => 'Социальная сеть', // отдельное название записи типа Book
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавить новую социальную сеть',
			'edit_item'          => 'Редактировать социальную сеть',
			'new_item'           => 'Новая социальная сеть',
			'view_item'          => 'Посмотреть социальную сеть',
			'search_items'       => 'Найти социальную сеть',
			'not_found'          => 'Социальных сетей не найдено',
			'not_found_in_trash' => 'Не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Социальные сети'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array('title')
	) );
}

function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Форма поиска',
		'id'            => "search_sidebar",
		'description'   => 'Форма поиска',
		'class'         => '',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => null ,
		'after_title'   => null,
		'before_sidebar' => '', // WP 5.6
		'after_sidebar'  => '', // WP 5.6
	) );
}

function theme_register_nav_menu() {
	register_nav_menu( 'top-index', 'Меню в шапке на главной странице' );
	register_nav_menu( 'top-inner', 'Меню в шапке на внутренних страницах' );
	register_nav_menu( 'side', 'Боковое меню в разделе "О НАС"' );
	register_nav_menu( 'pages', 'Ссылки на главной странице' );
	register_nav_menu( 'footer-1', 'Меню 1 в подвале' );
	register_nav_menu( 'footer-2', 'Меню 2 в подвале' );
	register_nav_menu( 'footer-3', 'Меню 3 в подвале' );
	register_nav_menu( 'footer-4', 'Меню 4 в подвале' );

	
	add_theme_support( 'post-thumbnails', array( 'post' ) ); 
	add_filter( 'excerpt_length', function(){
		return 20;
	} );
	add_filter('excerpt_more', function($more) {
		return ' ...';
	});
}

function style_theme() {
	wp_enqueue_style( 'style', get_stylesheet_uri());
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style( 'site-list', get_template_directory_uri() . '/assets/css/site-list.css' );
}

function scripts_theme() {
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js');
	wp_enqueue_script( 'form-mail', get_template_directory_uri() . '/assets/js/form-mail.js');
}
