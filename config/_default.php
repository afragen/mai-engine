<?php
/**
 * Mai Engine.
 *
 * @package   BizBudding\MaiEngine
 * @link      https://bizbudding.com
 * @author    BizBudding
 * @copyright Copyright © 2020 BizBudding
 * @license   GPL-2.0-or-later
 */

return [

	/*
	|--------------------------------------------------------------------------
	| Global Styles
	|--------------------------------------------------------------------------
	|
	| Default global styles controlled by the theme.
	*/

	'global-styles' => [
		'breakpoint'     => 1200,
		'colors'         => [
			'black'      => '#000000',
			'white'      => '#ffffff',
			'background' => '#ffffff',
			'alt'        => '#f8f9fa', // Background alt.
			'body'       => '#6c747d',
			'heading'    => '#343a40',
			'link'       => '#007bff',
			'primary'    => '#007bff', // Button primary.
			'secondary'  => '#6c747d', // Button secondary.
		],
		'fonts'          => [
			'body'    => 'sans-serif:400',
			'heading' => 'sans-serif:600',
		],
		'font-sizes'     => [
			'base' => 16,
		],
		'font-scale'     => 1.25,
		'contrast-limit' => 160,
	],

	/*
	|--------------------------------------------------------------------------
	| Genesis Settings
	|--------------------------------------------------------------------------
	|
	| Genesis default settings.
	*/

	'genesis-settings' => [
		'avatar_size'           => 48,
		'blog_cat_num'          => 12,
		'breadcrumb_home'       => 0,
		'breadcrumb_front_page' => 0,
		'breadcrumb_posts_page' => 0,
		'breadcrumb_single'     => 0,
		'breadcrumb_page'       => 0,
		'breadcrumb_archive'    => 0,
		'breadcrumb_404'        => 0,
		'breadcrumb_attachment' => 0,
	],

	/*
	|--------------------------------------------------------------------------
	| Image Sizes
	|--------------------------------------------------------------------------
	|
	| Image sizes. When adding or modifying 'landscape', 'portrait', or 'square'
	| you must use an aspect ratio, not actual dimensions.
	*/

	'image-sizes' => [
		'add'    => [
			'cover'     => [ 1600, 900, true ],
			'landscape' => '4:3',
			'tiny'      => [ 80, 80, true ],
		],
		'remove' => [],
	],

	/*
	|--------------------------------------------------------------------------
	| Page Layouts
	|--------------------------------------------------------------------------
	|
	| Available page layouts.
	*/

	'page-layouts' => [
		'add'    => [
			[
				'id'      => 'standard-content',
				'label'   => __( 'Standard Content', 'mai-engine' ),
				'img'     => mai_get_url() . 'assets/img/standard-content.gif',
				'type'    => [ 'site' ],
				'default' => true,
			],
			[
				'id'    => 'narrow-content',
				'label' => __( 'Narrow Content', 'mai-engine' ),
				'img'   => mai_get_url() . 'assets/img/narrow-content.gif',
				'type'  => [ 'site' ],
			],
			[
				'id'    => 'wide-content',
				'label' => __( 'Wide Content', 'mai-engine' ),
				'img'   => GENESIS_ADMIN_IMAGES_URL . '/layouts/c.gif',
				'type'  => [ 'site' ],
			],
			[
				'id'    => 'content-sidebar',
				'label' => __( 'Content, Sidebar', 'mai-engine' ),
				'img'   => GENESIS_ADMIN_IMAGES_URL . '/layouts/cs.gif',
				'type'  => [ 'site' ],
			],
			[
				'id'    => 'sidebar-content',
				'label' => __( 'Sidebar, Content', 'mai-engine' ),
				'img'   => GENESIS_ADMIN_IMAGES_URL . '/layouts/sc.gif',
				'type'  => [ 'site' ],
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
	| Site Layouts
	|--------------------------------------------------------------------------
	|
	| Default site layouts. These can be overidden by via Customizer > Site Layouts,
	| but these defaults are used when first activating the theme.
	*/

	'site-layouts' => [
		'default' => [
			'site'    => 'standard-content',
			'archive' => 'wide-content',
			'single'  => '',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Post Type Support
	|--------------------------------------------------------------------------
	|
	| Add/remove post type support for various post types.
	*/

	'post-type-support' => [
		'add'    => [
			'excerpt'         => [ 'page' ],
			'genesis-layouts' => [ 'product' ],
			'genesis-seo'     => [ 'product' ],
		],
		'remove' => [],
	],

	/*
	|--------------------------------------------------------------------------
	| Required Plugins
	|--------------------------------------------------------------------------
	|
	| Required plugins to be installed during the plugins step in the setup wizard.
	*/

	'plugins' => [],

	/*
	|--------------------------------------------------------------------------
	| Scripts and Styles
	|--------------------------------------------------------------------------
	|
	| All of the scripts and styles to be added or removed.
	*/

	'scripts-and-styles' => [
		'add'    => [

			// Scripts.
			[
				'handle' => mai_get_handle() . '-global',
				'src'    => mai_get_asset_url( 'global.js' ),
				'async'  => true,
			],
			[
				'handle'   => mai_get_handle() . '-menus',
				'src'      => mai_get_asset_url( 'menus.js' ),
				'async'    => true,
				'localize' => [
					'name' => 'maiMenuVars',
					'data' => [
						'ariaLabel'     => __( 'Mobile Menu', 'mai-engine' ),
						'menuToggle'    => sprintf(
							'<span class="menu-toggle-icon"></span><span class="screen-reader-text">%s</span>',
							__( 'Menu', 'mai-engine' )
						),
						'subMenuToggle' => sprintf(
							'<span class="sub-menu-toggle-icon"></span><span class="screen-reader-text">%s</span>',
							__( 'Sub Menu', 'mai-engine' )
						),
						'searchIcon'    => mai_get_svg_icon( 'search', 'regular', [
							'class' => 'search-toggle-icon',
						] ),
						'searchBox'     => ! defined( 'STYLESHEETPATH' ) ?:
							get_search_form(
								[
									'aria_label' => esc_html__( 'Menu Search', 'mai-engine' ),
									'echo'       => false,
								]
							),
					],
				],
			],
			[
				'handle'    => mai_get_handle() . '-header',
				'src'       => mai_get_asset_url( 'header.js' ),
				'async'     => true,
				'condition' => function () {
					return mai_has_sticky_header() || mai_has_transparent_header();
				},
			],

			// Customizer scripts.
			[
				'handle'   => mai_get_handle() . '-customizer',
				'src'      => mai_get_asset_url( 'customizer.js' ),
				'deps'     => [ 'jquery' ],
				'location' => 'customizer',
			],

			// Editor scripts.
			[
				'handle'   => mai_get_handle() . '-editor',
				'src'      => mai_get_asset_url( 'editor.js' ),
				'deps'     => [ 'jquery' ],
				'location' => 'editor',
				'localize' => [
					'name' => 'maiEditorVars',
					'data' => 'mai_get_editor_localized_data',
				],
			],

			// Block scripts.
			[
				'handle'   => mai_get_handle() . '-blocks',
				'src'      => mai_get_url() . 'assets/js/min/blocks.js',
				'deps'     => [ 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ],
				'location' => 'editor',
			],

			// Styles.
			[
				'handle' => mai_get_handle(),
				'src'    => mai_get_url() . 'assets/css/themes/' . mai_get_active_theme() . '.min.css',
			],

			// Customizer styles.
			[
				'handle'   => mai_get_handle() . '-kirki',
				'src'      => mai_get_url() . 'assets/css/plugins/kirki.min.css',
				'location' => 'customizer',
			],

			// Admin styles.
			[
				'handle'   => mai_get_handle() . '-admin',
				'src'      => mai_get_url() . 'assets/css/admin/admin.min.css',
				'location' => 'admin',
			],

			// ACF styles.
			[
				'handle'   => mai_get_handle() . '-advanced-custom-fields',
				'src'      => mai_get_url() . 'assets/css/plugins/advanced-custom-fields.min.css',
				'location' => 'editor',
			],

			// Plugin styles.
			[
				'handle'    => mai_get_handle() . '-amp',
				'src'       => mai_get_url() . 'assets/css/plugins/amp.min.css',
				'condition' => function () {
					return genesis_is_amp();
				},
			],
			[
				'handle'    => mai_get_handle() . '-atomic-blocks',
				'src'       => mai_get_url() . 'assets/css/plugins/atomic-blocks.min.css',
				'condition' => function () {
					return function_exists( 'atomic_blocks_main_plugin_file' );
				},
			],
			[
				'handle'    => mai_get_handle() . '-seo-slider',
				'src'       => mai_get_url() . 'assets/css/plugins/seo-slider.min.css',
				'condition' => function () {
					return defined( 'SEO_SLIDER_VERSION' );
				},
			],
			[
				'handle'    => mai_get_handle() . '-simple-social-icons',
				'src'       => mai_get_url() . 'assets/css/plugins/simple-social-icons.min.css',
				'condition' => function () {
					return class_exists( 'Simple_Social_Icons_Widget' );
				},
			],
			[
				'handle'    => mai_get_handle() . '-woocommerce',
				'src'       => mai_get_url() . 'assets/css/plugins/woocommerce.min.css',
				'condition' => function () {
					return class_exists( 'WooCommerce' );
				},
			],
		],
		'remove' => [
			'simple-social-icons-font',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Simple Social Icons
	|--------------------------------------------------------------------------
	|
	| Default settings for Simple Social Icons plugin.
	*/

	'simple-social-icons' => [
		'alignment'              => 'alignleft',
		'background_color'       => '',
		'background_color_hover' => '',
		'border_radius'          => 3,
		'border_width'           => 0,
		'icon_color'             => 'heading',
		'icon_color_hover'       => 'primary',
		'size'                   => 40,
	],

	/*
	|--------------------------------------------------------------------------
	| Theme Support
	|--------------------------------------------------------------------------
	|
	| Default theme supports. You probably shouldn't mess with these.
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
			'editor-styles',
			'genesis-accessibility'    => [
				'404-page',
				'headings',
				'search-form',
				'skip-links',
			],
			'',
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
			'genesis-menus'            => [
				'header-left'  => __( 'Header Left Menu', 'mai-engine' ),
				'header-right' => __( 'Header Right Menu', 'mai-engine' ),
				'after-header' => __( 'After Header Menu', 'mai-engine' ),
			],
			'genesis-structural-wraps' => [
				'header',
				'menu-after-header',
				'page-header',
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
		],
		'remove' => [
			'genesis-footer-widgets',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Archive & Single Settings Content Types
	|--------------------------------------------------------------------------
	|
	| Enable (archive/single) settings for content types.
	| This is only for defaults when activating the theme.
	| These can be added/removed via:
	| Customizer > Theme Settings > Content Archives
	| or
	| Customizer > Theme Settings > Single Content
	|
	| Archive can be any of the following:
	| 1. any post_type name as long as the post type is public and has an archive,
	| 2. any public taxonomy name,
	| 3. 'search' for search results,
	| 4. 'author' for author archives,
	| 5. 'date' for date archives.
	|
	| Single can be any of the following:
	| 1. any public post_type name,
	| 2. any public taxonomy name,
	| 3. '404-page' for 404.
	*/

	'archive-settings' => [
		'post',
	],

	'single-settings' => [
		'page',
		'post',
	],

	/*
	|--------------------------------------------------------------------------
	| Page Header
	|--------------------------------------------------------------------------
	|
	| The default page header settings. The can be overidden via Customizer settings,
	| but this sets the default for when a theme is first activated.
	*/

	'page-header' => [
		'archive'                 => [],
		'single'                  => [],
		'background-color'        => 'alt',
		'image'                   => '',
		'overlay-opacity'         => 0.5,
		'text-color'              => 'dark',
		'spacing'                 => [
			'top'    => '10vw',
			'bottom' => '10vw',
		],
		'text-align'              => '',
		'divider'                 => '',
		'divider-height'          => 'md',
		'divider-color'           => 'white',
		'divider-flip-horizontal' => false,
		'divider-flip-vertical'   => false,
		'divider-overlay-opacity' => 0.5,
		'divider-text-align'      => '',
	],

	/*
	|--------------------------------------------------------------------------
	| Custom functions
	|--------------------------------------------------------------------------
	|
	| Default callable functions and filters to be run after_theme_setup.
	*/

	'custom-functions' => '__return_null',

	/*
	|--------------------------------------------------------------------------
	| Template Parts
	|--------------------------------------------------------------------------
	|
	| Default template parts to be created and available for use.
	*/

	'template-parts' => [
		[
			'id'         => 'before-header',
			'location'   => 'genesis_before_header',
			'menu_order' => 5,
		],
		[
			'id'         => 'header-left',
			'location'   => 'mai_header_left',
			'menu_order' => 10,
		],
		[
			'id'         => 'header-right',
			'location'   => 'mai_header_right',
			'menu_order' => 15,
		],
		[
			'id'         => 'mobile-menu',
			'location'   => 'mai_after_header_wrap',
			'before'     => '<div class="mobile-menu"><div class="wrap">',
			'after'      => '</div></div>',
			'menu_order' => 20,
		],
		[
			'id'         => 'after-entry',
			'name'       => __( 'After Entry', 'mai-engine' ),
			'menu_order' => 25,
		],
		[
			'id'         => 'before-footer',
			'location'   => 'genesis_footer',
			'priority'   => 5,
			'menu_order' => 30,
		],
		[
			'id'         => 'footer',
			'location'   => 'genesis_footer',
			'menu_order' => 35,
		],
		[
			'id'         => 'footer-credits',
			'location'   => 'genesis_footer',
			'priority'   => 12,
			'menu_order' => 40,
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Widget Areas
	|--------------------------------------------------------------------------
	|
	| The available widget areas, including their output location.
	|
	*/

	'widget-areas' => [
		'add'    => [
			[
				'id'          => 'sidebar',
				'name'        => __( 'Sidebar', 'mai-engine' ),
				'description' => __( 'The Sidebar widget area.', 'mai-engine' ),
				'location'    => '',
			],
		],
		'remove' => [],
	],
];