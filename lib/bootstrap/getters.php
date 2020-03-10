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

/**
 * Returns the plugin directory.
 *
 * @since 0.1.0
 *
 * @return string
 */
function mai_get_dir() {
	static $dir = null;

	if ( is_null( $dir ) ) {
		$dir = trailingslashit( dirname( dirname( __DIR__ ) ) );
	}

	return $dir;
}

/**
 * Returns the plugin URL.
 *
 * @since 0.1.0
 *
 * @return string
 */
function mai_get_url() {
	static $url = null;

	if ( is_null( $url ) ) {
		$url = trailingslashit( plugins_url( basename( mai_get_dir() ) ) );
	}

	return $url;
}

/**
 * Returns an array of plugin data from the main plugin file.
 *
 * @since 0.1.0
 *
 * @param string $header Optionally return one key.
 *
 * @return array|string|null
 */
function mai_get_plugin_data( $header = '' ) {
	static $data = null;

	if ( is_null( $data ) ) {
		$data = get_file_data(
			mai_get_dir() . 'mai-engine.php',
			[
				'name'        => 'Plugin Name',
				'version'     => 'Version',
				'plugin-uri'  => 'Plugin URI',
				'text-domain' => 'Text Domain',
				'description' => 'Description',
				'author'      => 'Author',
				'author-uri'  => 'Author URI',
				'domain-path' => 'Domain Path',
				'network'     => 'Network',
			],
			'plugin'
		);
	}

	if ( array_key_exists( $header, $data ) ) {
		return $data[ $header ];
	}

	return $data;
}

/**
 * Returns the plugin name.
 *
 * @since 0.1.0
 *
 * @return string
 */
function mai_get_name() {
	static $name = null;

	if ( is_null( $name ) ) {
		$name = mai_get_plugin_data( 'name' );
	}

	return $name;
}

/**
 * Returns the plugin handle/text domain.
 *
 * @since 0.1.0
 *
 * @return string
 */
function mai_get_handle() {
	static $handle = null;

	if ( is_null( $handle ) ) {
		$handle = mai_get_plugin_data( 'text-domain' );
	}

	return $handle;
}

/**
 * Returns the plugin version.
 *
 * @since 0.1.0
 *
 * @return string
 */
function mai_get_version() {
	static $version = null;

	if ( is_null( $version ) ) {
		$version = mai_get_plugin_data( 'version' );
	}

	return $version;
}

/**
 * Description of expected behavior.
 *
 * @since 0.1.0
 *
 * @param string $file File path.
 *
 * @return string
 */
function mai_get_asset_version( $file ) {
	$file = str_replace( mai_get_url(), mai_get_dir(), $file );

	return file_exists( $file ) && mai_is_in_dev_mode() && mai_has_string( mai_get_dir(), $file ) ? filemtime( $file ) : mai_get_version();
}

/**
 * Returns the active child theme's config.
 *
 * @since 0.1.0
 *
 * @param string $sub_config Name of config to get.
 *
 * @return array
 */
function mai_get_config( $sub_config = 'default' ) {
	$config = require mai_get_dir() . 'config/default/config.php';
	$theme  = mai_get_dir() . 'config/' . mai_get_active_theme() . '/config.php';

	if ( is_readable( $theme ) ) {
		$config = array_replace_recursive( $config, require $theme );
	}

	$data = isset( $config[ $sub_config ] ) ? $config[ $sub_config ] : [];

	// Allow users to override from within actual child theme.
	$child = get_stylesheet_directory() . '/config.php';

	if ( is_readable( $child ) ) {
		$data = require $child;
	}

	return apply_filters( "mai_{$sub_config}_config", $data );
}

/**
 * Returns the active theme key.
 *
 * Checks multiple places to find a match.
 *
 * @since 0.1.0
 *
 * @return string
 */
function mai_get_active_theme() {
	static $theme = null;

	if ( is_null( $theme ) ) {
		if ( ! $theme ) {
			$theme = get_theme_support( 'mai' );
		}

		if ( ! $theme ) {
			$theme = genesis_get_theme_handle();
		}

		if ( ! $theme ) {
			$theme = wp_get_theme()->get( 'TextDomain' );
		}

		if ( ! $theme ) {
			$onboarding_file = get_stylesheet_directory() . '/config/onboarding.php';

			if ( is_readable( $onboarding_file ) ) {
				$onboarding_config = require $onboarding_file;

				if ( isset( $onboarding_config['dependencies']['mai'] ) ) {
					$theme = $onboarding_config['dependencies']['mai'];
				}
			}
		}

		if ( ! $theme || ! in_array( $theme, mai_get_child_themes(), true ) ) {
			$theme = 'default';
		}
	}

	return str_replace( 'mai-', '', $theme );
}

/**
 * Returns an array of all BizBudding child themes.
 *
 * @since 0.1.0
 *
 * @return array
 */
function mai_get_child_themes() {
	$child_themes = [];
	$files        = glob( mai_get_dir() . 'config/*', GLOB_ONLYDIR );

	foreach ( $files as $file ) {
		$child_themes[] = 'mai-' . basename( $file, '.php' );
	}

	return $child_themes;
}

/**
 * Returns an array of the themes JSON variables.
 *
 * @since 0.1.0
 *
 * @return array
 */
function mai_get_variables() {
	static $variables;

	if ( is_null( $variables ) ) {
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		$defaults = json_decode( file_get_contents( mai_get_dir() . 'config/default/config.json' ), true );
		$file     = mai_get_dir() . 'config/' . mai_get_active_theme() . '/config.json';
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		$theme     = is_readable( $file ) ? json_decode( file_get_contents( $file ), true ) : [];
		$variables = array_replace_recursive( $defaults, $theme );
	}

	return $variables;
}

/**
 * Description of expected behavior.
 *
 * @since 0.1.0
 *
 * @return array
 */
function mai_get_colors() {
	static $colors = [];

	if ( empty( $colors ) ) {
		$colors = mai_get_variables()['colors'];

		foreach ( $colors as $name => $hex ) {
			$colors[ $name ] = $hex;
		}
	}

	return $colors;
}

/**
 * Description of expected behavior.
 *
 * @since 0.1.0
 *
 * @param string $color Name of the color to get.
 *
 * @return string
 */
function mai_get_color( $color = null ) {
	$colors = mai_get_colors();

	return isset( $colors[ $color ] ) ? $colors[ $color ] : '';
}

/**
 * Returns the color palette variables.
 *
 * @since 0.1.0
 *
 * @return array
 */
function mai_get_color_palette() {
	$colors  = mai_get_colors();
	$palette = [];

	foreach ( $colors as $color => $hex ) {
		$palette[] = [
			'name'  => ucwords( $color ),
			'slug'  => $color,
			'color' => $hex,
		];
	}

	return $palette;
}

/**
 * Description of expected behavior.
 *
 * @since 0.1.0
 *
 * @return array
 */
function mai_get_breakpoints() {
	static $breakpoints = [];

	if ( empty( $breakpoints ) ) {
		$breakpoint        = mai_get_variables()['breakpoint'];
		$breakpoints['xs'] = absint( $breakpoint / 3 );   // 400  (400 x 1)
		$breakpoints['sm'] = absint( $breakpoint / 2 );   // 600  (400 x 1.5)
		$breakpoints['md'] = absint( $breakpoint / 1.5 ); // 800  (400 x 2)
		$breakpoints['lg'] = absint( $breakpoint / 1.2 ); // 1000 (400 x 2.5)
		$breakpoints['xl'] = absint( $breakpoint / 1 );   // 1200 (400 x 3)
	}

	return $breakpoints;
}

/**
 * Returns the default breakpoint for the theme.
 *
 * @param string $size   Breakpoint size.
 * @param string $suffix Optional suffix, e.g. 'px'.
 *
 * @return mixed
 */
function mai_get_breakpoint( $size = 'md', $suffix = '' ) {
	$breakpoints = mai_get_breakpoints();

	return $breakpoints[ $size ] . '';
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param string $value Gets flex align rule.
 *
 * @return string
 */
function mai_get_flex_align( $value ) {
	switch ( $value ) {
		case 'start':
		case 'top':
			$return = 'flex-start';
			break;
		case 'center':
		case 'middle':
			$return = 'center';
			break;
		case 'right':
		case 'bottom':
			$return = 'flex-end';
			break;
		default:
			$return = 'unset';
	}

	return $return;
}

/**
 * Get the gap value.
 *
 * If only a number value, force to pixels.
 *
 * @since 0.1.0
 *
 * @param  string $value The value. Could be integer 24 or with type 24px, 2rem, etc.
 *
 * @return string
 */
function mai_get_gap( $value ) {
	if ( empty( $value ) || is_numeric( $value ) ) {
		return sprintf( '%spx', intval( $value ) );
	}

	return trim( $value );
}

/**
 * Get the columns at different breakpoints.
 *
 * We use strings because the clear option is just an empty string.
 *
 * @since 0.1.0
 *
 * @param array $args Column args.
 *
 * @return array
 */
function mai_get_breakpoint_columns( $args ) {
	$columns = [
		'lg' => (int) $args['columns'],
	];

	if ( $args['columns_responsive'] ) {
		$columns['md'] = (int) $args['columns_md'];
		$columns['sm'] = (int) $args['columns_sm'];
		$columns['xs'] = (int) $args['columns_xs'];
	} else {
		switch ( (int) $args['columns'] ) {
			case 6:
				$columns['md'] = 4;
				$columns['sm'] = 3;
				$columns['xs'] = 2;
				break;
			case 5:
				$columns['md'] = 3;
				$columns['sm'] = 2;
				$columns['xs'] = 2;
				break;
			case 4:
				$columns['md'] = 4;
				$columns['sm'] = 2;
				$columns['xs'] = 1;
				break;
			case 3:
				$columns['md'] = 3;
				$columns['sm'] = 1;
				$columns['xs'] = 1;
				break;
			case 2:
				$columns['md'] = 2;
				$columns['sm'] = 2;
				$columns['xs'] = 1;
				break;
			case 1:
				$columns['md'] = 1;
				$columns['sm'] = 1;
				$columns['xs'] = 1;
				break;
			case 0: // Auto.
				$columns['md'] = 0;
				$columns['sm'] = 0;
				$columns['xs'] = 0;
				break;
		}
	}

	return $columns;
}

/**
 * Description of expected behavior.
 *
 * @since 0.1.0
 *
 * @param string $alignment Text alignment.
 *
 * @return string
 */
function mai_get_align_text( $alignment ) {
	switch ( $alignment ) {
		case 'start':
		case 'top':
			$value = 'start';
			break;
		case 'center':
		case 'middle':
			$value = 'center';
			break;
		case 'bottom':
		case 'end':
			$value = 'end';
			break;
		default:
			$value = 'unset';
	}

	return $value;
}

/**
 * Return content stripped down and limited content.
 *
 * Strips out tags and shortcodes, limits the output to `$max_char` characters.
 *
 * @since 0.1.0
 *
 * @param string $content The content to limit.
 * @param int    $limit   The maximum number of characters to return.
 *
 * @return string
 */
function mai_get_content_limit( $content, $limit ) {

	// Strip tags and shortcodes so the content truncation count is done correctly.
	$content = strip_tags( strip_shortcodes( $content ), apply_filters( 'get_the_content_limit_allowedtags', '<script>,<style>' ) );

	// Remove inline styles / scripts.
	$content = trim( preg_replace( '#<(s(cript|tyle)).*?</\1>#si', '', $content ) );

	// Truncate $content to $limit.
	$content = genesis_truncate_phrase( $content, $limit );

	return $content;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param string $image_size Image size to get.
 *
 * @return string
 */
function mai_get_image_aspect_ratio( $image_size ) {
	$all_sizes = mai_get_available_image_sizes();
	$sizes     = isset( $all_sizes[ $image_size ] ) ? $all_sizes[ $image_size ] : false;

	// TODO: Get default landscape aspect ratio.
	return $sizes ? sprintf( '%s/%s', $sizes['height'], $sizes['width'] ) : '4/3';
}

/**
 * Utility method to get a combined list of default and custom registered image sizes.
 *
 * Originally taken from CMB2. Static variable added here.
 *
 * We can't use `genesis_get_image_sizes()` because we need it earlier than Genesis is loaded for Kirki.
 *
 * @since  0.1.0
 *
 * @link   http://core.trac.wordpress.org/ticket/18947
 * @global array $_wp_additional_image_sizes All image sizes.
 *
 * @return array
 */
function mai_get_available_image_sizes() {
	static $image_sizes = [];

	if ( ! empty( $image_sizes ) ) {
		return $image_sizes;
	}

	// Get image sizes.
	global $_wp_additional_image_sizes;
	$default_image_sizes = [ 'thumbnail', 'medium', 'large' ];

	foreach ( $default_image_sizes as $size ) {
		$image_sizes[ $size ] = [
			'height' => intval( get_option( "{$size}_size_h" ) ),
			'width'  => intval( get_option( "{$size}_size_w" ) ),
			'crop'   => get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false,
		];
	}

	if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
		$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
	}

	return $image_sizes;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param string $context Entry context.
 *
 * @return array
 */
function mai_get_settings_fields( $context ) {
	$settings = new Mai_Entry_Settings( $context );

	return $settings->fields;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param string $context Entry context.
 *
 * @return null
 */
function mai_get_settings_keys( $context ) {
	$settings = new Mai_Entry_Settings( $context );

	return $settings->keys;
}

/**
 * Description of expected behavior.
 *
 * @since  1.0.0
 *
 * @return array|mixed|null|void
 *
 * @todo   Make this work for singular too.
 */
function mai_get_template_args() {
	// Setup cache.
	static $args = null;
	if ( null !== $args ) {
		return $args;
	}

	// TODO: This is the archive helper function in mai-engine.

	// Bail if not an archive.
	if ( ! mai_is_type_archive() ) {
		$args = [];

		return $args;
	}

	$settings = new Mai_Entry_Settings( 'archive' );
	$name     = mai_get_archive_args_name();
	$key      = 'mai_archive_' . $name;
	$args     = wp_parse_args( get_option( $key, [] ), $settings->defaults );

	// Allow devs to filter.
	$args = apply_filters( 'mai_template_args', $args );

	// Sanitize.
	$args = mai_get_sanitized_entry_args( $args );

	return $args;
}

/**
 * Description of expected behavior.
 *
 * @since 0.1.0
 *
 * @param array $args Entry args.
 *
 * @return mixed
 */
function mai_get_sanitized_entry_args( $args ) {

	// Get settings.
	$settings = new Mai_Entry_Settings( $args['context'] );

	// Sanitize.
	foreach ( $args as $name => $value ) {
		// Skip if not set.
		if ( ! isset( $settings->fields[ $name ]['sanitize'] ) ) {
			continue;
		}
		$function = $settings->fields[ $name ]['sanitize'];
		if ( is_array( $value ) ) {
			$escaped = [];
			foreach ( $value as $key => $val ) {
				$escaped[ $key ] = $function( $val );
			}
			$args[ $name ] = $escaped;
		} else {
			$args[ $name ] = $function( $value );
		}
	}

	return $args;
}

/**
 * Description of expected behavior.
 *
 * @since 0.1.0
 *
 * @return bool|mixed|string
 */
function mai_get_archive_args_name() {

	// Get the name.
	if ( is_home() ) {
		$name = 'post';
	} elseif ( is_category() ) {
		$name = 'category';
	} elseif ( is_tag() ) {
		$name = 'post_tag';
	} elseif ( is_tax() ) {
		$name = get_query_var( 'taxonomy' );
	} elseif ( is_post_type_archive() ) {
		$name = get_query_var( 'post_type' );
	} elseif ( is_search() ) {
		$name = 'search';
	} elseif ( is_author() ) {
		$name = 'author';
	} elseif ( is_date() ) {
		$name = 'date';
	} else {
		$name = 'post';
	}

	// If archive isn't supported in config, use 'post'.
	if ( 'post' !== $name && ! in_array( $name, (array) mai_get_config( 'archive-settings' ) ) ) {
		return 'post';
	}

	return $name;
}

/**
 * Return the site layout.
 * First check custom field data, then customizer settings.
 * If none, use default.
 *
 * @since   0.1.0
 *
 * @global  WP_Query  $wp_query Query object.
 *
 * @return  string    Site layout.
 */
function mai_get_site_layout() {

	// Setup cache.
	static $site_layout = null;

	// If cache is populated, return value.
	if ( ! is_null( $site_layout ) ) {
		return esc_attr( $site_layout );
	}

	$site_layout = mai_get_meta_site_layout();

	if ( $site_layout ) {
		return $site_layout;
	}

	// Get the template args.
	$args = mai_get_template_args();

	// If we have a layout via the Customizer.
	if ( isset( $args['site_layout'] ) && ! empty( $args['site_layout'] ) ) {
		$site_layout = $args['site_layout'];
	}

	// TODO: Started to work on fallbacks to Post archive, but don't think we should do that anymore.
	// If you enable a panel for a content type, then you have to use it.

	// If an archive, but not post/default, get the fallback.
	// if ( ! $site_layout ) {
	// 	$archive = mai_get_archive_args_name();
	// 	if ( $archive && 'post' !== $archive ) {
	// 		$defaults = get_option( 'mai_archive_post', [] );
	// 		if ( isset( $defaults['site_layout'] ) && ! empty( $defaults['site_layout'] ) ) {
	// 			$site_layout = $defaults['site_layout'];
	// 		}
	// 	}
	// }

	// Use Genesis default setting.
	if ( ! $site_layout ) {
		$site_layout = genesis_get_option( 'site_layout' );
	}

	return $site_layout;
}

/**
 * Return the meta site layout from different contexts, if avaiable.
 *
 * This is partially taken from genesis_site_layout().
 *
 * @since   0.1.0
 *
 * @global  WP_Query  $wp_query Query object.
 *
 * @return  string    Site layout.
 */
function mai_get_meta_site_layout() {

	// Setup cache.
	static $site_layout = null;

	// If cache is populated, return value.
	if ( ! is_null( $site_layout ) ) {
		return esc_attr( $site_layout );
	}

	// Default to site for layout type.
	$type = 'site';

	if ( is_singular() || ( is_home() && ! genesis_is_root_page() ) ) { // If viewing a singular page or post, or the posts page, but not the front page.

		$post_id     = is_home() ? get_option( 'page_for_posts' ) : null;
		$site_layout = genesis_get_custom_field( '_genesis_layout', $post_id );

	} elseif ( is_category() || is_tag() || is_tax() ) { // If viewing a taxonomy archive.

		global $wp_query;
		$term        = $wp_query->get_queried_object();
		$site_layout = $term ? get_term_meta( $term->term_id, 'layout', true ) : '';

	} elseif ( is_post_type_archive() && genesis_has_post_type_archive_support() ) { // If viewing a supported post type.

		$site_layout = genesis_get_cpt_option( 'layout' );

	} elseif ( is_author() ) { // If viewing an author archive.

		$site_layout = get_the_author_meta( 'layout', (int) get_query_var( 'author' ) );

	}

	// Return site layout.
	return esc_attr( $site_layout );

}
