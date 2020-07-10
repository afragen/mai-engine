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

/**
 * Class Mai_Setup_Wizard_Demos
 */
class Mai_Setup_Wizard_Demos extends Mai_Setup_Wizard_Service_Provider {

	/**
	 * @var array
	 */
	public $all_demos = [];

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function add_hooks() {
		add_action( 'init', [ $this, 'add_demos' ], 11 );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function add_demos() {
		$demos = apply_filters( 'mai_setup_wizard_demos', [] );

		foreach ( $demos as $demo ) {
			$this->add_demo( $demo );
		}
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @param $args
	 *
	 * @return void
	 */
	private function add_demo( $args ) {
		$args['id'] = strtolower( str_replace( ' ', '-', $args['name'] ) );
		$args       = wp_parse_args( $args, $this->get_default_args( $args ) );

		$this->all_demos[] = $args;
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key
	 *
	 * @return array
	 */
	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key
	 *
	 * @return array|mixed
	 */
	public function get_demo( $key = '' ) {
		$id   = $this->get_chosen_demo();
		$demo = [];

		foreach ( $this->all_demos as $demo_args ) {
			if ( $id === $demo_args['id'] ) {
				$demo = $demo_args;
			}
		}

		return $key && isset( $demo[ $key ] ) ? $demo[ $key ] : $demo;
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function get_demos() {
		$demos = [];

		foreach ( $this->all_demos as $demo ) {
			$demos[] = $demo;
		}

		return $demos;
	}

	/**
	 * Returns the id of the first demo in the array.
	 *
	 * @since 2.0.1
	 *
	 * @return string
	 */
	public function get_default_demo() {
		$first = reset( $this->all_demos );

		return $first['id'];
	}

	/**
	 * Returns the chosen demo, falls back to default demo.
	 *
	 * @since 2.0.1
	 *
	 * @return string
	 */
	public function get_chosen_demo() {
		if ( ! $this->all_demos ) {
			return '';
		}

		$options = get_option( $this->slug, [] );

		return isset( $options['demo'] ) ? $options['demo'] : $this->get_default_demo();
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @param $args
	 *
	 * @return array
	 */
	private function get_default_args( $args ) {
		return apply_filters( 'mai_setup_wizard_demo_defaults', [
			'content'    => false,
			'widgets'    => false,
			'customizer' => false,
			'preview'    => false,
			'plugins'    => [],
			'screenshot' => isset( $args['screenshot'] ) ? $args['screenshot'] : $this->get_screenshot( $args['preview'] ),
		] );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @param $url
	 *
	 * @return string
	 */
	private function get_screenshot( $url ) {
		$url       = urlencode( $url );
		$params    = [
			'w' => 400,
			'h' => 300,
		];
		$src       = 'https://wordpress.com/mshots/v1/' . $url . '?' . http_build_query( $params, null, '&' );
		$cache_key = md5( $src );
		$data_uri  = get_transient( $cache_key );

		if ( ! $data_uri ) {
			$response = wp_remote_get( $src );

			if ( 200 === wp_remote_retrieve_response_code( $response ) ) {
				$image_data = wp_remote_retrieve_body( $response );
				if ( $image_data && is_string( $image_data ) ) {
					$src = $data_uri = 'data:image/jpeg;base64,' . base64_encode( $image_data );
					set_transient( $cache_key, $data_uri, DAY_IN_SECONDS );
				}
			}
		}

		return esc_attr( $src );
	}
}