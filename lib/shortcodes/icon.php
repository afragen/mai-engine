<?php

/**
 * Helper function that returns list of shortcode attributes.
 *
 * @since 1.0.0
 *
 * @param $atts
 *
 * @return array
 */
function mai_icon_shortcode_atts() {
	return [
		'style'            => 'regular',
		'icon'             => 'address-book',
		'display'          => 'flex',
		'align'            => 'center',
		'size'             => '40',
		'color_icon'       => mai_get_color( 'primary' ),
		'color_background' => '',
		'color_border'     => '',
		'color_shadow'     => '',
		'margin_top'       => '',
		'margin_right'     => '',
		'margin_left'      => '',
		'margin_bottom'    => '',
		'padding_top'      => '',
		'padding_right'    => '',
		'padding_left'     => '',
		'padding_bottom'   => '',
		'border_width'     => '',
		'border_radius'    => '',
		'x_offset'         => '',
		'y_offset'         => '',
		'blur'             => '',
	];
}

add_shortcode( 'mai_icon', 'mai_icon_shortcode' );
/**
 * Render the icon shortcode.
 *
 * @since 2.0.0
 *
 * @param array $atts Shortcode attributes.
 *
 * @return string
 */
function mai_icon_shortcode( $atts ) {
	static $id = 0;

	$id ++;

	$atts = shortcode_atts(
		mai_icon_shortcode_atts(),
		$atts,
		'mai_icon'
	);

	$file = mai_get_dir() . 'vendor/fortawesome/font-awesome/svgs/' . $atts['style'] . '/' . $atts['icon'] . '.svg';

	if ( ! file_exists( $file ) ) {
		return $file;
	}

	$margin = implode( 'px ', [
			$atts['margin_top'],
			$atts['margin_right'],
			$atts['margin_bottom'],
			$atts['margin_left'],
		] ) . 'px;';

	$padding = implode( 'px ', [
			$atts['padding_top'],
			$atts['padding_right'],
			$atts['padding_bottom'],
			$atts['padding_left'],
		] ) . 'px;';

	$shadow = implode( ' ', [
		$atts['x_offset'] . 'px',
		$atts['y_offset'] . 'px',
		$atts['blur'] . 'px',
		$atts['color_shadow'],
	] );

	$css = '';
	$css .= $atts['display'] ? 'display:' . $atts['display'] . ';' : '';
	$css .= $atts['align'] ? 'justify-content:' . $atts['align'] . ';' : '';
	$css .= $atts['color_background'] ? 'background-color:' . $atts['color_background'] . ';' : '';
	$css .= $atts['color_border'] ? 'border-color:' . $atts['color_border'] . ';' : '';
	$css .= 'margin:' . $margin;
	$css .= 'padding:' . $padding;

	$css = sprintf(
		'.mai-icon-%s{%s}',
		$id,
		$css
	);

	$svg = '-webkit-filter: drop-shadow(' . $shadow . ');';
	$svg .= 'filter: drop-shadow(' . $shadow . ')';

	$css .= sprintf(
		'.mai-icon-%s svg{%s}',
		$id,
		$svg
	);

	return sprintf(
		'<style>%s</style><span class="mai-icon mai-icon-%s">%s</span>',
		mai_minify_css( $css ),
		$id,
		str_replace(
			'><path',
			sprintf(
				' fill="%s" width="%s" class="align%s"><path',
				$atts['color_icon'],
				$atts['size'],
				$atts['align']
			),
			file_get_contents( $file )
		)
	);
}
