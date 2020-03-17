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
 * Get Mai_Grid_Blocks Running.
 *
 * @since   0.1.0
 * @return  object
 */
final class Mai_Grid_Blocks {

	/**
	 * Instance.
	 *
	 * @var    Mai_Grid_Blocks The one true Mai_Grid_Blocks
	 * @since  0.1.0
	 */
	private static $instance;

	/**
	 * Fields.
	 *
	 * @var $fields
	 */
	private $fields;

	/**
	 * Main Mai_Grid_Blocks Instance.
	 *
	 * Insures that only one instance of Mai_Grid_Blocks exists in memory at any one
	 * time. Also prevents needing to define globals all over the place.
	 *
	 * @since   0.1.0
	 *
	 * @static  var array $instance
	 *
	 * @return  object | Mai_Grid_Blocks The one true Mai_Grid_Blocks
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new Mai_Grid_Blocks();
			self::$instance->run();
		}

		return self::$instance;
	}

	/**
	 * Throw error on object clone.
	 *
	 * The whole idea of the singleton design pattern is that there is a single
	 * object therefore, we don't want the object to be cloned.
	 *
	 * @since   0.1.0
	 *
	 * @access  protected
	 *
	 * @return  void
	 */
	public function __clone() {
		// Cloning instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'mai-engine' ), '1.0' );
	}

	/**
	 * Disable unserializing of the class.
	 *
	 * @since   0.1.0
	 *
	 * @access  protected
	 *
	 * @return  void
	 */
	public function __wakeup() {
		// Unserializing instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'mai-engine' ), '1.0' );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function run() {
		add_action( 'acf/init', [ $this, 'register_blocks' ], 10, 3 );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function register_blocks() {

		// Bail if no ACF Pro >= 5.8.
		if ( ! function_exists( 'acf_register_block_type' ) ) {
			return;
		}

		$this->fields = mai_get_config( 'grid-settings' );

		// Mai Post Grid.
		acf_register_block_type(
			[
				'name'            => 'mai-post-grid',
				'title'           => __( 'Mai Post Grid', 'mai-engine' ),
				'description'     => __( 'Display posts/pages/cpts in various layouts.', 'mai-engine' ),
				'icon'            => 'grid-view',
				'category'        => 'widgets',
				'keywords'        => [ 'grid', 'post', 'page' ],
				'mode'            => 'preview',
				'render_callback' => [ $this, 'do_post_grid' ],
				'supports'        => [
					'align'  => [ 'wide' ],
					'ancher' => true,
				],
			]
		);

		// Mai Term Grid.
		acf_register_block_type(
			[
				'name'            => 'mai-term-grid',
				'title'           => __( 'Mai Term Grid', 'mai-engine' ),
				'description'     => __( 'Display posts/pages/cpts in various layouts.', 'mai-engine' ),
				'icon'            => 'grid-view',
				'category'        => 'widgets',
				'keywords'        => [ 'grid', 'category', 'term' ],
				'mode'            => 'preview',
				'render_callback' => [ $this, 'do_term_grid' ],
				'supports'        => [
					'align'  => [ 'wide' ],
					'ancher' => true,
				],
			]
		);

		// Run filters.
		$this->run_filters();
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 0.1.0
	 *
	 * @param array  $block      Block object.
	 * @param string $content    String of content.
	 * @param bool   $is_preview Is preview check.
	 *
	 * @return void
	 */
	public function do_post_grid( $block, $content = '', $is_preview = false ) {
		// TODO: block id?
		$this->do_grid( 'post', $block, $content = '', $is_preview = false );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 0.1.0
	 *
	 * @param array  $block      Block object.
	 * @param string $content    Content string.
	 * @param bool   $is_preview Is preview check.
	 *
	 * @return void
	 */
	public function do_term_grid( $block, $content = '', $is_preview = false ) {
		// TODO: block id?
		$this->do_grid( 'term', $block, $content = '', $is_preview = false );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 0.1.0
	 *
	 * @param string $type       Type of grid.
	 * @param array  $block      Block object.
	 * @param string $content    Content string.
	 * @param bool   $is_preview Is preview check.
	 *
	 * @return void
	 */
	public function do_grid( $type, $block, $content = '', $is_preview = false ) {

		$args = [ 'type' => $type ] + $this->get_field_values( $type );

		if ( ! empty( $block['className'] ) ) {
			$args['class'] = ( isset( $args['class'] ) && ! empty( $args['class'] ) ) ? ' ' . $block['className'] : $block['className'];
		}

		$grid = new Mai_Grid( $args );
		$grid->render();
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 0.1.0
	 *
	 * @return array
	 */
	public function get_field_values( $type ) {
		$values = [];
		foreach( $this->fields as $key => $field ) {
			// Skip tabs.
			if ( 'tab' === $field['type'] ) {
				continue;
			}
			// Skip if not the block we want.
			if ( ! in_array( $type, $field['block'] ) ) {
				continue;
			}
			$value                    = get_field( $field['name'] );
			$values[ $field['name'] ] = is_null( $value ) ? $this->fields[ $key ]['default'] : $value;
		}
		return $values;
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function run_filters() {
		// Show 'show'
		add_filter( 'acf/load_field/key=field_5e441d93d6236', [ $this, 'load_show' ] );
		// Posts 'post__in'.
		add_filter( 'acf/fields/post_object/query/key=field_5df1053632cbc', [ $this, 'get_posts' ], 10, 1 );
		// Terms 'terms' sub field.
		add_filter( 'acf/fields/taxonomy/query/key=field_5df139a216272', [ $this, 'get_terms' ], 10, 1 );
		// Parent 'post_parent__in'.
		add_filter( 'acf/fields/post_object/query/key=field_5df1053632ce4', [ $this, 'get_parents' ], 10, 1 );
		// Exclude Entries 'post__not_in'.
		add_filter( 'acf/fields/post_object/query/key=field_5e349237e1c01', [ $this, 'get_posts' ], 10, 1 );
		// TODO: Exclude for term grid.
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 0.1.0
	 *
	 * @param array $field Field array.
	 *
	 * @return mixed
	 */
	public function load_show( $field ) {
		// Get existing values, which are sorted correctly, without infinite loop.
		remove_filter( 'acf/load_field/key=field_5e441d93d6236', [ $this, 'load_show' ] );
		$existing = get_field( 'show' );
		$defaults = $field['choices'];
		add_filter( 'acf/load_field/key=field_5e441d93d6236', [ $this, 'load_show' ] );
		// If we have existing values, reorder them.
		$field['choices'] = $existing ? array_merge( array_flip( $existing ), $defaults ) : $field['choices'];
		return $field;
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 0.1.0
	 *
	 * @param array $args Field args.
	 *
	 * @return mixed
	 */
	public function get_posts( $args ) {

		$args['post_type'] = [];
		if ( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], 'acf_nonce' ) && isset( $_REQUEST['post_type'] ) && ! empty( $_REQUEST['post_type'] ) ) {
			foreach( $_REQUEST['post_type'] as $post_type ) {
				$args['post_type'][] = sanitize_text_field( wp_unslash( $post_type ) );
			}
		}

		return $args;
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 0.1.0
	 *
	 * @param array $args Field args.
	 *
	 * @return mixed
	 */
	public function get_terms( $args ) {

		if ( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], 'acf_nonce' ) && isset( $_REQUEST['taxonomy'] ) && ! empty( $_REQUEST['taxonomy'] ) ) {
			$args['taxonomy'] = sanitize_text_field( wp_unslash( $_REQUEST['taxonomy'] ) );
		}

		return $args;
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 0.1.0
	 *
	 * @param array $args Field args.
	 *
	 * @return mixed
	 */
	public function get_parents( $args ) {

		$args['post_type'] = [];
		if ( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], 'acf_nonce' ) && isset( $_REQUEST['post_type'] ) && ! empty( $_REQUEST['post_type'] ) ) {
			foreach( $_REQUEST['post_type'] as $post_type ) {
				$args['post_type'][] = sanitize_text_field( wp_unslash( $post_type ) );
			}
		}

		return $args;
	}
}
