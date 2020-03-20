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

/**
 * Description of expected behavior.
 *
 * @since 0.1.0
 *
 * @param array $args Entries open args.
 *
 * @link  https://github.com/studiopress/genesis/blob/master/lib/structure/loops.php#L64
 * @link  https://github.com/studiopress/genesis/blob/master/lib/structure/post.php
 */
function mai_do_entries_open( $args ) {

	// Start the attributes.
	$attributes = [
		'class' => 'entries',
		'style' => '',
	];

	// Boxed.
	if ( $args['boxed'] ) {
		$attributes['class'] .= ' has-boxed';
	}

	// Image position.
	if ( in_array( 'image', $args['show'], true ) && $args['image_position'] ) {
		$attributes['class'] .= ' has-image-' . $args['image_position'];
		if ( 'background' === $args['image_position'] ) {
			switch ( $args['image_orientation'] ) {
				case 'landscape':
				case 'portrait':
				case 'square':
					$orientation = mai_has_image_orientiation( $args['image_orientation'] ) ? $args['image_orientation'] : 'landscape';
					$image_size  = sprintf( '%s-md', $args['image_orientation'] );
					break;
				default:
					$image_size = $args['image_size'];
			}
			$attributes['style'] .= sprintf( '--aspect-ratio:%s;', mai_get_image_aspect_ratio( $args['image_size'] ) );
		}
	}

	// Get the columns breakpoint array.
	$columns = mai_get_breakpoint_columns( $args );

	// Global styles.
	$attributes['style'] .= sprintf( '--columns-lg:%s;', $columns['lg'] );
	$attributes['style'] .= sprintf( '--columns-md:%s;', $columns['md'] );
	$attributes['style'] .= sprintf( '--columns-sm:%s;', $columns['sm'] );
	$attributes['style'] .= sprintf( '--columns-xs:%s;', $columns['xs'] );
	$attributes['style'] .= sprintf( '--column-gap:%s;', mai_get_unit_value( $args['column_gap'] ) );
	$attributes['style'] .= sprintf( '--row-gap:%s;', mai_get_unit_value( $args['row_gap'] ) );
	$attributes['style'] .= sprintf( '--align-columns:%s;', ! empty( $args['align_columns'] ) ? mai_get_flex_align( $args['align_columns'] ) : 'unset' );
	$attributes['style'] .= sprintf( '--align-columns-vertical:%s;', ! empty( $args['align_columns_vertical'] ) ? mai_get_flex_align( $args['align_columns_vertical'] ) : 'unset' );
	$attributes['style'] .= sprintf( '--align-text:%s;', mai_get_align_text( $args['align_text'] ) );
	$attributes['style'] .= sprintf( '--align-text-vertical:%s;', mai_get_align_text( $args['align_text_vertical'] ) );

	genesis_markup(
		[
			'open'    => '<div %s>',
			'context' => 'entries',
			'echo'    => true,
			'atts'    => $attributes,
			'params'  => [
				'args' => $args,
			],
		]
	);

	genesis_markup(
		[
			'open'    => '<div %s>',
			'context' => 'entries-wrap',
			'echo'    => true,
			'params'  => [
				'args' => $args,
			],
		]
	);
}

/**
 * Description of expected behavior.
 *
 * @since 0.1.0
 *
 * @param array $args Entries close args.
 *
 * @return void
 */
function mai_do_entries_close( $args ) {
	genesis_markup(
		[
			'close'   => '</div>',
			'context' => 'entries-wrap',
			'echo'    => true,
			'params'  => [
				'args' => $args,
			],
		]
	);

	genesis_markup(
		[
			'close'   => '</div>',
			'context' => 'entries',
			'echo'    => true,
			'params'  => [
				'args' => $args,
			],
		]
	);
}

/**
 * Echo a grid entry.
 *
 * @since 0.1.0
 *
 * @param object $entry The (post, term, user) entry object.
 * @param array  $args  The object to get the entry.
 *
 * @return  void
 */
function mai_do_entry( $entry, $args ) {
	$entry = new Mai_Entry( $entry, $args );
	$entry->render();
}