<?php
/**
 * Mai Engine.
 *
 * @package   BizBudding\MaiEngine
 * @link      https://bizbudding.com
 * @author    BizBudding
 * @copyright Copyright © 2019 BizBudding
 * @license   GPL-2.0-or-later
 */

// Prevent direct file access.
defined( 'ABSPATH' ) || die;

return [

	/*
	|--------------------------------------------------------------------------
	| Genesis Settings
	|--------------------------------------------------------------------------
	|
	| Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque
	| venenatis augue eget lacinia. Suspendisse eros dui, fringilla si amet
	| ante et, fringilla tristique just. In interdum vitae metus ut fiat.
	|
	*/

	'genesis-settings' => [
		'avatar_size'               => 48,
		'blog_cat_num'              => 9,
		'breadcrumb_home'           => 0,
		'breadcrumb_front_page'     => 0,
		'breadcrumb_posts_page'     => 0,
		'breadcrumb_single'         => 0,
		'breadcrumb_page'           => 0,
		'breadcrumb_archive'        => 0,
		'breadcrumb_404'            => 0,
		'breadcrumb_attachment'     => 0,
		'content_archive'           => 'full',
		'content_archive_limit'     => 200,
		'content_archive_thumbnail' => 1,
		'image_size'                => 'featured',
		'image_alignment'           => 'alignnone',
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'narrow-content',
	],

	/*
	|--------------------------------------------------------------------------
	| Google Fonts
	|--------------------------------------------------------------------------
	|
	| Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque
	| venenatis augue eget lacinia. Suspendisse eros dui, fringilla si amet
	| ante et, fringilla tristique just. In interdum vitae metus ut fiat.
	|
	*/

	'google-fonts' => [
		'Source+Sans+Pro:400,600,700',
	],

	/*
	|--------------------------------------------------------------------------
	| Image Sizes
	|--------------------------------------------------------------------------
	|
	| Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque
	| venenatis augue eget lacinia. Suspendisse eros dui, fringilla si amet
	| ante et, fringilla tristique just. In interdum vitae metus ut fiat.
	|
	*/

	'image-sizes' => [
		'add'    => [
			'full'      => [ 1600, 900, true ],
			'landscape' => '4:3',
			'portfolio' => false,
			'square'    => false,
			'tiny'      => [ 80, 80, true ],
		],
		'remove' => [

		],
	],

	/*
	|--------------------------------------------------------------------------
	| Page Layouts
	|--------------------------------------------------------------------------
	|
	| Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque
	| venenatis augue eget lacinia. Suspendisse eros dui, fringilla si amet
	| ante et, fringilla tristique just. In interdum vitae metus ut fiat.
	|
	*/

	'page-layouts' => [
		'add'    => [
			[
				'id'    => 'narrow-content',
				'label' => __( 'Narrow Content', 'mai-engine' ),
				'img'   => mai_get_url() . 'assets/img/narrow-content.gif',
			],
		],
		'remove' => [
			'content-sidebar-sidebar',
			'sidebar-sidebar-content',
			'sidebar-content-sidebar',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Post Type Support
	|--------------------------------------------------------------------------
	|
	| Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque
	| venenatis augue eget lacinia. Suspendisse eros dui, fringilla si amet
	| ante et, fringilla tristique just. In interdum vitae metus ut fiat.
	|
	*/

	'post-type-support' => [
		'add'    => [
			'excerpt'                    => [ 'page' ],
			'genesis-layouts'            => [ 'product' ],
			'genesis-seo'                => [ 'product' ],
			'genesis-singular-images'    => [ 'page', 'post' ],
			'genesis-title-toggle'       => [ 'post', 'product' ],
			'genesis-adjacent-entry-nav' => [ 'post', 'product', 'portfolio' ],
			'page-header-single'         => [ 'page', 'post', 'product', 'portfolio' ],
			'page-header-archive'        => [ 'page', 'post', 'product', 'portfolio' ],
			'terms-filter'               => [ 'post', 'portfolio' ],
		],
		'remove' => [],
	],

	/*
	|--------------------------------------------------------------------------
	| Responsive Menu
	|--------------------------------------------------------------------------
	|
	| Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque
	| venenatis augue eget lacinia. Suspendisse eros dui, fringilla si amet
	| ante et, fringilla tristique just. In interdum vitae metus ut fiat.
	|
	*/

	'responsive-menu' => [
		'script' => [
			'mainMenu'         => sprintf(
				'<span class="menu-toggle-icon"> </span><span class="screen-reader-text">%s</span>',
				__( 'Menu', 'mai-engine' )
			),
			'menuIconClass'    => null,
			'subMenuIconClass' => null,
			'menuClasses'      => [
				'combine' => [
					'.nav-primary',
					'.nav-secondary',
				],
			],
			'menuAnimation'    => [
				'effect'   => 'fadeToggle',
				'duration' => 'fast',
				'easing'   => 'swing',
			],
			'subMenuAnimation' => [
				'effect'   => 'slideToggle',
				'duration' => 'fast',
				'easing'   => 'swing',
			],
		],
		'extras' => [
			'media_query_width' => mai_get_breakpoint( 'md' ),
			'css'               => '',
			'enable_AMP'        => true,
			'enable_non_AMP'    => true,
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Scripts and Styles
	|--------------------------------------------------------------------------
	|
	| Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque
	| venenatis augue eget lacinia. Suspendisse eros dui, fringilla si amet
	| ante et, fringilla tristique just. In interdum vitae metus ut fiat.
	|
	*/

	'scripts-and-styles' => [
		'add'    => [

			// Scripts.
			[
				'handle' => mai_get_handle() . '-editor',
				'src'    => mai_get_url() . 'assets/js/editor.js',
				'deps'   => [ 'jquery', 'wp-blocks' ],
				'editor' => true,
			],
			[
				'handle'    => mai_get_handle(),
				'src'       => mai_get_url() . 'assets/js/min/global.min.js',
				'deps'      => [],
				'condition' => function () {
					return ! genesis_is_amp() && ! genesis_is_in_dev_mode();
				},
			],

			// Dev scripts.
			[
				'handle'    => mai_get_handle() . '-filters',
				'src'       => mai_get_url() . 'assets/js/filters.js',
				'deps'      => [],
				'condition' => function () {
					return genesis_is_in_dev_mode();
				},
			],
			[
				'handle'    => mai_get_handle() . '-header',
				'src'       => mai_get_url() . 'assets/js/header.js',
				'deps'      => [],
				'condition' => function () {
					return genesis_is_in_dev_mode();
				},
			],
			[
				'handle'    => mai_get_handle() . '-menu',
				'src'       => mai_get_url() . 'assets/js/menu.js',
				'deps'      => [],
				'condition' => function () {
					return genesis_is_in_dev_mode();
				},
			],
			[
				'handle'    => mai_get_handle() . '-scroll',
				'src'       => mai_get_url() . 'assets/js/scroll.js',
				'deps'      => [],
				'condition' => function () {
					return genesis_is_in_dev_mode();
				},
			],
			[
				'handle'    => mai_get_handle() . '-toggle',
				'src'       => mai_get_url() . 'assets/js/toggle.js',
				'deps'      => [],
				'condition' => function () {
					return genesis_is_in_dev_mode();
				},
			],

			// Styles.
			[
				'handle' => mai_get_handle(),
				'src'    => mai_get_url() . 'assets/css/' . mai_get_active_theme() . '.css',
			],

		],
		'remove' => [
			'superfish',
			'simple-social-icons-font',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Simple Social Icons
	|--------------------------------------------------------------------------
	|
	| Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque
	| venenatis augue eget lacinia. Suspendisse eros dui, fringilla si amet
	| ante et, fringilla tristique just. In interdum vitae metus ut fiat.
	|
	*/

	'simple-social-icons' => [
		'alignment'              => 'alignleft',
		'background_color'       => '',
		'background_color_hover' => '',
		'border_radius'          => 3,
		'border_width'           => 0,
		'icon_color'             => mai_get_color( 'heading' ),
		'icon_color_hover'       => mai_get_color( 'primary' ),
		'size'                   => 40,
	],

	/*
	|--------------------------------------------------------------------------
	| Theme Support
	|--------------------------------------------------------------------------
	|
	| Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque
	| venenatis augue eget lacinia. Suspendisse eros dui, fringilla si amet
	| ante et, fringilla tristique just. In interdum vitae metus ut fiat.
	|
	*/

	'theme-support' => [
		'add'    => [

			// Genesis defaults.
			'menus',
			'post-thumbnails',
			'title-tag',
			'automatic-feed-links',
			'body-open',
			'genesis-inpost-layouts',
			'genesis-archive-layouts',
			'genesis-admin-menu',
			'genesis-seo-settings-menu',
			'genesis-import-export-menu',
			'genesis-readme-menu',
			'genesis-customizer-theme-settings',
			'genesis-customizer-seo-settings',
			'genesis-auto-updates',

			// Custom.
			'align-wide',
			'automatic-feed-links',
			'custom-header'            => [
				'header-selector'  => '.page-header',
				'default_image'    => mai_get_url() . 'assets/img/page-header.jpg',
				'header-text'      => false,
				'width'            => 1280,
				'height'           => 720,
				'flex-height'      => true,
				'flex-width'       => true,
				'uploads'          => true,
				'video'            => false,
				'wp-head-callback' => 'mai_custom_header',
			],
			'editor-styles',
			'editor-color-palette'     => mai_get_color_palette(),
			'front-page-widgets'       => 5,
			'genesis-accessibility'    => [
				'404-page',
				'drop-down-menu',
				'headings',
				'rems',
				'search-form',
				'skip-links',
			],
			'genesis-after-entry-widget-area',
			'genesis-custom-logo'      => [
				'height'      => 60,
				'width'       => 120,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => [
					'.site-title',
					'.site-description',
				],
			],
			'genesis-footer-widgets'   => 3,
			'genesis-menus'            => [
				'header-left'  => __( 'Header Left Menu', 'mai-engine' ),
				'header-right' => __( 'Header Right Menu', 'mai-engine' ),
				'below-header' => __( 'Below Header Menu', 'mai-engine' ),
				'footer'       => __( 'Footer Menu', 'mai-engine' ),
			],
			'genesis-structural-wraps' => [
				'header',
				'menu-below-header',
				'menu-footer',
				'page-header',
				'footer-widgets',
				'front-page-widgets',
			],
			'gutenberg'                => [
				'wide-images' => true,
			],
			'html5'                    => [
				'caption',
				'comment-form',
				'comment-list',
				'gallery',
				'search-form',
			],
			'post-thumbnails',
			'responsive-embeds',
			'woocommerce',
			'wc-product-gallery-zoom',
			'wc-product-gallery-lightbox',
			'wc-product-gallery-slider',
			'wp-block-styles',


			'page-header' => [],
			'layouts'     => [],


			'loop' => [
				'post'      => [
					'singular',
					'archives',
					'taxonomies' => [
						'category',
						'post_tag',
					],
				],
				'page'      => [],
				'product'   => [
					'product_cat',
				],
				'portfolio' => [
					'portfolio_cat',
				],
				'templates' => [
					'author',
					'search',
					'date',
				],
			],


			// Mai Settings - Panel
			// Styles
			// Colors
			// Typography
			// Spacing
			// Global
			// Site Header - (sticky/reveal/etc)
			// Navigation Menus
			// Page Header default
			// Site Footer - footer widgets
			// Single Post / Page
			// Default - Layout, Page Header, Order
			// Post - Edit post archive settings → // Layout, Page Header, Order
			// Page - Layout, Page Header, Order
			// Portfolio -
			// Blog / Archives
			// Default
			// Post
			// Category
			// Tags
			// Portfolio
			// Portfolio Categories


		],
		'remove' => [],
	],

	/*
	|--------------------------------------------------------------------------
	| Widget Areas
	|--------------------------------------------------------------------------
	|
	| Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque
	| venenatis augue eget lacinia. Suspendisse eros dui, fringilla si amet
	| ante et, fringilla tristique just. In interdum vitae metus ut fiat.
	|
	*/

	'widget-areas' => [
		'add'    => [
			[
				'id'          => 'before-header',
				'name'        => __( 'Before Header', 'mai-engine' ),
				'description' => __( 'The Before Header widget area.', 'mai-engine' ),
			],
			[
				'id'          => 'before-footer',
				'name'        => __( 'Before Footer', 'mai-engine' ),
				'description' => __( 'The Before Footer widget area.', 'mai-engine' ),
			],
		],
		'remove' => [
			'sidebar-alt',
		],
	],


];

