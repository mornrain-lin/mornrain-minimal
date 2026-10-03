<?php
/**
 * MornRain Minimal functions and definitions.
 *
 * @package MornRain_Minimal
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'MORNRAIN_MINIMAL_VERSION' ) ) {
	define( 'MORNRAIN_MINIMAL_VERSION', '1.0.0' );
}

if ( ! function_exists( 'mornrain_minimalsetup' ) ) :
	/**
	 * Register theme defaults and WordPress feature support.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function mornrain_minimalsetup() {
		load_theme_textdomain( 'mornrain-minimal', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
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
				'navigation-widgets',
			)
		);
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 64,
				'width'       => 240,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'mornrain-minimal' ),
				'footer'  => __( 'Footer Menu', 'mornrain-minimal' ),
			)
		);

		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/main.css' );
	}
endif;
add_action( 'after_setup_theme', 'mornrain_minimalsetup' );

if ( ! function_exists( 'mornrain_minimalscripts' ) ) :
	/**
	 * Enqueue front-end styles and scripts.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function mornrain_minimalscripts() {
		wp_enqueue_style(
			'mornrain-minimal',
			get_stylesheet_uri(),
			array(),
			MORNRAIN_MINIMAL_VERSION
		);

		wp_enqueue_style(
			'mornrain-minimal-main',
			get_template_directory_uri() . '/assets/css/main.css',
			array( 'mornrain-minimal' ),
			MORNRAIN_MINIMAL_VERSION
		);

		wp_enqueue_script(
			'mornrain-minimal-main',
			get_template_directory_uri() . '/assets/js/main.js',
			array(),
			MORNRAIN_MINIMAL_VERSION,
			true
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'mornrain_minimalscripts' );

if ( ! function_exists( 'mornrain_minimalexcerpt_length' ) ) :
	/**
	 * Filter the excerpt length.
	 *
	 * @since 1.0.0
	 * @param int $length Default excerpt length in words.
	 * @return int
	 */
	function mornrain_minimalexcerpt_length( $length ) {
		return 40;
	}
endif;
add_filter( 'excerpt_length', 'mornrain_minimalexcerpt_length' );

if ( ! function_exists( 'mornrain_minimalexcerpt_more' ) ) :
	/**
	 * Filter the excerpt "read more" suffix.
	 *
	 * @since 1.0.0
	 * @return string
	 */
	function mornrain_minimalexcerpt_more() {
		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'mornrain_minimalexcerpt_more' );

if ( ! function_exists( 'mornrain_minimalpingback_header' ) ) :
	/**
	 * Add the pingback link to the document head when needed.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function mornrain_minimalpingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
endif;
add_action( 'wp_head', 'mornrain_minimalpingback_header' );
