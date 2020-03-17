<?php

return [
	'field_5bd51cac98282' => [
		'name'    => 'display_tab',
		'label'   => esc_html__( 'Display', 'mai-engine' ),
		'block'   => [ 'post', 'term', 'user' ],
		'type'    => 'tab',
		'default' => '',
	],
	'field_5e441d93d6236' => [
		'name'     => 'show',
		'label'    => esc_html__( 'Show', 'mai-engine' ),
		'block'    => [ 'post', 'term', 'user' ],
		'type'     => 'checkbox',
		'sanitize' => 'esc_html',
		'default'  => [ 'image', 'title' ],
		'choices'  => [
			'image'       => esc_html__( 'Image', 'mai-engine' ),
			'title'       => esc_html__( 'Title', 'mai-engine' ),
			'header_meta' => esc_html__( 'Header Meta', 'mai-engine' ),
			'excerpt'     => esc_html__( 'Excerpt', 'mai-engine' ),
			'content'     => esc_html__( 'Content', 'mai-engine' ),
			'more_link'   => esc_html__( 'Read More link', 'mai-engine' ),
			'footer_meta' => esc_html__( 'Footer Meta', 'mai-engine' ),
		],
		'atts'     => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-sortable',
				'id'    => '',
			],
		],
	],
	'field_5e4d4efe99279' => [
		'name'       => 'image_orientation',
		'label'      => esc_html__( 'Image Orientation', 'mai-engine' ),
		'block'      => [ 'post', 'term', 'user' ],
		'type'       => 'select',
		'sanitize'   => 'esc_html',
		'default'    => 'landscape',
		'choices'    => [
			'landscape' => esc_html__( 'Landscape', 'mai-engine' ),
			'portrait'  => esc_html__( 'Portrait', 'mai-engine' ),
			'square'    => esc_html__( 'Square', 'mai-engine' ),
			'custom'    => esc_html__( 'Custom', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5e441d93d6236', // show
				'operator' => '==',
				'value'    => 'image',
			],
		],
		'atts'       => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-show-conditional',
				'id'    => '',
			],
		],
	],
	'field_5bd50e580d1e9' => [
		'name'       => 'image_size',
		'label'      => esc_html__( 'Image Size', 'mai-engine' ),
		'block'      => [ 'post', 'term', 'user' ],
		'type'       => 'select',
		'sanitize'   => 'esc_html',
		'default'    => 'landscape-md',
		'choices'    => function () {
			$choices = [];
			$sizes   = mai_get_available_image_sizes();
			foreach ( $sizes as $index => $value ) {
				$choices[ $index ] = sprintf( '%s (%s x %s)', $index, $value['width'], $value['height'] );
			}

			return $choices;
		},
		'conditions' => [
			[
				'field'    => 'field_5e441d93d6236', // show
				'operator' => '==',
				'value'    => 'image',
			],
			[
				'field'    => 'field_5e4d4efe99279', // image_orientation
				'operator' => '==',
				'value'    => 'custom',
			],
		],
		'atts'       => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-show-conditional',
				'id'    => '',
			],
		],
	],
	'field_5e2f3adf82130' => [
		'name'       => 'image_position',
		'label'      => esc_html__( 'Image Position', 'mai-engine' ),
		'block'      => [ 'post', 'term', 'user' ],
		'type'       => 'select',
		'sanitize'   => 'esc_html',
		'default'    => 'full',
		'choices'    => [
			'full'       => esc_html__( 'Full', 'mai-engine' ),
			'left'       => esc_html__( 'Left', 'mai-engine' ),
			'center'     => esc_html__( 'Center', 'mai-engine' ),
			'right'      => esc_html__( 'Right', 'mai-engine' ),
			'background' => esc_html__( 'Background', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5e441d93d6236', // show
				'operator' => '==',
				'value'    => 'image',
			],
		],
		'atts'       => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-show-conditional',
				'id'    => '',
			],
		],
	],
	'field_5e2b563a7c6cf' => [
		'name'       => 'header_meta',
		'label'      => esc_html__( 'Header Meta', 'mai-engine' ),
		'block'      => [ 'post', 'term', 'user' ],
		'type'       => 'text',
		'sanitize'   => 'wp_kses_post',
		// TODO: this should be different, or empty depending on the post type?
		'default'    => '[post_date] [post_author_posts_link before="by "]',
		'conditions' => [
			[
				'field'    => 'field_5e441d93d6236', // show
				'operator' => '==',
				'value'    => 'header_meta',
			],
		],
		'atts'       => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-show-conditional',
				'id'    => '',
			],
		],
	],
	'field_5bd51ac107244' => [
		'name'       => 'content_limit',
		'label'      => esc_html__( 'Content Limit', 'mai-engine' ),
		'desc'       => esc_html__( 'Limit the number of characters shown for the content or excerpt. Use 0 for no limit.', 'mai-engine' ),
		'block'      => [ 'post', 'term', 'user' ],
		'type'       => 'text',
		'sanitize'   => 'absint',
		'default'    => 0,
		'conditions' => [
			[
				[
					'field'    => 'field_5e441d93d6236', // show
					'operator' => '==',
					'value'    => 'excerpt',
				],
			],
			[
				[
					'field'    => 'field_5e441d93d6236', // show
					'operator' => '==',
					'value'    => 'content',
				],
			],
		],
		'atts'       => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-show-conditional',
				'id'    => '',
			],
		],
	],
	'field_5c85465018395' => [
		'name'       => 'more_link_text',
		'label'      => esc_html__( 'More Link Text', 'mai-engine' ),
		'block'      => [ 'post', 'term', 'user' ],
		'type'       => 'text',
		'sanitize'   => 'esc_attr', // We may want to add icons/spans and HTML in here.
		'default'    => '',
		'conditions' => [
			[
				'field'    => 'field_5e441d93d6236', // show
				'operator' => '==',
				'value'    => 'more_link',
			],
		],
		'atts'       => [
			// TODO: This text should be filtered, same as the template that outputs it.
			'placeholder' => esc_html__( 'Read More', 'mai-engine' ),
			'wrapper'     => [
				'width' => '',
				'class' => 'mai-grid-show-conditional',
				'id'    => '',
			],
		],
	],
	'field_5e2b567e7c6d0' => [
		'name'       => 'footer_meta',
		'label'      => esc_html__( 'Footer Meta', 'mai-engine' ),
		'block'      => [ 'post', 'term', 'user' ],
		'type'       => 'text',
		'sanitize'   => 'wp_kses_post',
		// TODO: this should be different, or empty depending on the post type?
		'default'    => '[post_categories]',
		'conditions' => [
			[
				'field'    => 'field_5e441d93d6236', // show
				'operator' => '==',
				'value'    => 'footer_meta',
			],
		],
		'atts'       => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-show-conditional',
				'id'    => '',
			],
		],
	],
	'field_5e2a08a182c2c' => [
		'name'     => 'boxed',
		'label'    => esc_html__( 'Boxed', 'mai-engine' ),
		'block'    => [ 'post', 'term', 'user' ],
		'type'     => 'true_false',
		'sanitize' => 'esc_html',
		'default'  => 1, // true
		'atts'     => [
			'message' => __( 'Display boxed', 'mai-engine' ),
		],
	],
	'field_5c853f84eacd6' => [
		'name'     => 'align_text',
		'label'    => esc_html__( 'Align Text', 'mai-engine' ),
		'block'    => [ 'post', 'term', 'user' ],
		'type'     => 'button_group',
		'sanitize' => 'esc_html',
		'default'  => '',
		'choices'  => [
			''       => esc_html__( 'Clear', 'mai-engine' ),
			'start'  => esc_html__( 'Start', 'mai-engine' ),
			'center' => esc_html__( 'Center', 'mai-engine' ),
			'end'    => esc_html__( 'End', 'mai-engine' ),
		],
		'atts'     => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-button-group mai-grid-button-group-clear',
				'id'    => '',
			],
		],
	],
	'field_5e2f519edc912' => [
		'name'       => 'align_text_vertical',
		'label'      => esc_html__( 'Align Text (vertical)', 'mai-engine' ),
		'block'      => [ 'post', 'term', 'user' ],
		'type'       => 'button_group',
		'sanitize'   => 'esc_html',
		'default'    => '',
		'choices'    => [
			''       => esc_html__( 'Clear', 'mai-engine' ),
			'top'    => esc_html__( 'Top', 'mai-engine' ),
			'middle' => esc_html__( 'Middle', 'mai-engine' ),
			'bottom' => esc_html__( 'Bottom', 'mai-engine' ),
		],
		'conditions' => [
			[
				[
					'field'    => 'field_5e2f3adf82130', // image_position
					'operator' => '==',
					'value'    => 'left',
				],
			],
			[
				[
					'field'    => 'field_5e2f3adf82130', // image_position
					'operator' => '==',
					'value'    => 'background',
				],
			],
		],
		'atts'       => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-button-group mai-grid-button-group-clear',
				'id'    => '',
			],
		],
	],
	/********
	 * Layout
	 */
	'field_5c8549172e6c7' => [
		'name'    => 'layout_tab',
		'label'   => esc_html__( 'Layout', 'mai-engine' ),
		'block'   => [ 'post', 'term', 'user' ],
		'type'    => 'tab',
		'default' => '',
	],
	'field_5c854069d358c' => [
		'name'     => 'columns',
		'label'    => esc_html__( 'Columns (desktop)', 'mai-engine' ),
		'block'    => [ 'post', 'term', 'user' ],
		'type'     => 'button_group',
		'sanitize' => 'absint',
		'default'  => 3,
		'choices'  => [
			1 => esc_html__( '1', 'mai-engine' ),
			2 => esc_html__( '2', 'mai-engine' ),
			3 => esc_html__( '3', 'mai-engine' ),
			4 => esc_html__( '4', 'mai-engine' ),
			5 => esc_html__( '5', 'mai-engine' ),
			6 => esc_html__( '6', 'mai-engine' ),
			0 => esc_html__( 'Auto', 'mai-engine' ),
		],
		'atts'     => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-button-group',
				'id'    => '',
			],
		],
	],
	'field_5e334124b905d' => [
		'name'     => 'columns_responsive',
		'label'    => '',
		'block'    => [ 'post', 'term', 'user' ],
		'type'     => 'true_false',
		'sanitize' => 'esc_html',
		'default'  => '',
		'atts'     => [
			'message' => esc_html__( 'Custom responsive columns', 'mai-engine' ),
		],
	],
	'field_5e3305dff9d8b' => [
		'name'       => 'columns_md',
		'label'      => esc_html__( 'Columns (lg tablets)', 'mai-engine' ),
		'block'      => [ 'post', 'term', 'user' ],
		'type'       => 'button_group',
		'sanitize'   => 'absint',
		'default'    => 1,
		'choices'    => [
			1 => esc_html__( '1', 'mai-engine' ),
			2 => esc_html__( '2', 'mai-engine' ),
			3 => esc_html__( '3', 'mai-engine' ),
			4 => esc_html__( '4', 'mai-engine' ),
			5 => esc_html__( '5', 'mai-engine' ),
			6 => esc_html__( '6', 'mai-engine' ),
			0 => esc_html__( 'Auto', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5e334124b905d', // columns_responsive
				'operator' => '==',
				'value'    => 1,
			],
		],
		'atts'       => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-button-group mai-grid-nested-columns mai-grid-nested-columns-first',
				'id'    => '',
			],
		],
	],
	'field_5e3305f1f9d8c' => [
		'name'       => 'columns_sm',
		'label'      => esc_html__( 'Columns (sm tablets)', 'mai-engine' ),
		'block'      => [ 'post', 'term', 'user' ],
		'type'       => 'button_group',
		'sanitize'   => 'absint',
		'default'    => 1,
		'choices'    => [
			1 => esc_html__( '1', 'mai-engine' ),
			2 => esc_html__( '2', 'mai-engine' ),
			3 => esc_html__( '3', 'mai-engine' ),
			4 => esc_html__( '4', 'mai-engine' ),
			5 => esc_html__( '5', 'mai-engine' ),
			6 => esc_html__( '6', 'mai-engine' ),
			0 => esc_html__( 'Auto', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5e334124b905d', // columns_responsive
				'operator' => '==',
				'value'    => 1,
			],
		],
		'atts'       => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-button-group mai-grid-nested-columns',
				'id'    => '',
			],
		],
	],
	'field_5e332a5f7fe08' => [
		'name'       => 'columns_xs',
		'label'      => esc_html__( 'Columns (mobile)', 'mai-engine' ),
		'block'      => [ 'post', 'term', 'user' ],
		'type'       => 'button_group',
		'sanitize'   => 'absint',
		'default'    => 1,
		'choices'    => [
			1 => esc_html__( '1', 'mai-engine' ),
			2 => esc_html__( '2', 'mai-engine' ),
			3 => esc_html__( '3', 'mai-engine' ),
			4 => esc_html__( '4', 'mai-engine' ),
			5 => esc_html__( '5', 'mai-engine' ),
			6 => esc_html__( '6', 'mai-engine' ),
			0 => esc_html__( 'Auto', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5e334124b905d', // columns_responsive
				'operator' => '==',
				'value'    => 1,
			],
		],
		'atts'       => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-button-group mai-grid-nested-columns mai-grid-nested-columns-last',
				'id'    => '',
			],
		],
	],
	'field_5c853e6672972' => [
		'name'       => 'align_columns',
		'label'      => esc_html__( 'Align Columns', 'mai-engine' ),
		'block'      => [ 'post', 'term', 'user' ],
		'type'       => 'button_group',
		'sanitize'   => 'esc_html',
		'default'    => '',
		'choices'    => [
			''       => esc_html__( 'Clear', 'mai-engine' ),
			'left'   => esc_html__( 'Left', 'mai-engine' ),
			'center' => esc_html__( 'Center', 'mai-engine' ),
			'right'  => esc_html__( 'Right', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5c854069d358c', // columns
				'operator' => '!=',
				'value'    => 1,
			],
		],
		'atts'       => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-button-group mai-grid-button-group-clear',
				'id'    => '',
			],
		],
	],
	'field_5e31d5f0e2867' => [
		'name'       => 'align_columns_vertical',
		'label'      => esc_html__( 'Align Columns (vertical)', 'mai-engine' ),
		'block'      => [ 'post', 'term', 'user' ],
		'type'       => 'button_group',
		'sanitize'   => 'esc_html',
		'default'    => '',
		'choices'    => [
			''       => esc_html__( 'Clear', 'mai-engine' ),
			'top'    => esc_html__( 'Top', 'mai-engine' ),
			'middle' => esc_html__( 'Middle', 'mai-engine' ),
			'bottom' => esc_html__( 'Bottom', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5c854069d358c', // columns
				'operator' => '!=',
				'value'    => 1,
			],
		],
		'atts'       => [
			'wrapper' => [
				'width' => '',
				'class' => 'mai-grid-button-group mai-grid-button-group-clear',
				'id'    => '',
			],
		],
	],
	'field_5c8542d6a67c5' => [
		'name'     => 'column_gap',
		'label'    => esc_html__( 'Column Gap', 'mai-engine' ),
		'block'    => [ 'post', 'term', 'user' ],
		'type'     => 'text',
		'sanitize' => 'esc_html',
		'default'  => '24px',
	],
	'field_5e29f1785bcb6' => [
		'name'     => 'row_gap',
		'label'    => esc_html__( 'Row Gap', 'mai-engine' ),
		'block'    => [ 'post', 'term', 'user' ],
		'type'     => 'text',
		'sanitize' => 'esc_html',
		'default'  => '24px',
	],
	/***********
	 * Entries *
	 */
	'field_5df13446c49cf' => [
		'name'    => 'entries_tab',
		'label'   => esc_html__( 'Entries', 'mai-engine' ),
		'block'   => [ 'post', 'term', 'user' ],
		'type'    => 'tab',
		'default' => '',
	],
	/*********
	 * Posts *
	 */
	'field_5df1053632ca2' => [
		'name'     => 'post_type',
		'label'    => esc_html__( 'Post Type', 'mai-engine' ),
		'block'    => [ 'post' ],
		'type'     => 'select',
		'sanitize' => 'esc_html',
		'default'  => [ 'post' ],
		'choices'  => function () {
			$choices    = [];
			$post_types = get_post_types(
				[
					'public'             => true,
					'publicly_queryable' => true,
				],
				'objects',
				'or'
			);
			unset( $post_types['attachment'] );
			if ( $post_types ) {
				foreach ( $post_types as $name => $post_type ) {
					$choices[ $name ] = $post_type->label;
				}
			}

			return $choices;
		},
		'atts'     => [
			'multiple' => 1,
			'ui'       => 1,
			'ajax'     => 0,
		],
	],
	'field_5df1053632ca8' => [
		'name'       => 'posts_per_page',
		'label'      => esc_html__( 'Number of Entries', 'mai-engine' ),
		'desc'       => esc_html__( 'Use 0 to show all.', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'number',
		'sanitize'   => 'absint',
		'default'    => 12,
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
			[
				'field'    => 'field_5df1053632cad', // query_by
				'operator' => '!=',
				'value'    => 'title',
			],
		],
		'atts'       => [
			'placeholder' => 12,
			'min'         => 0,
		],
	],
	'field_5df1053632cad' => [
		'name'       => 'query_by',
		'label'      => esc_html__( 'Get Entries By', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'select',
		'sanitize'   => 'esc_html',
		'default'    => 'date',
		'choices'    => [
			'date'     => esc_html__( 'Date', 'mai-engine' ),
			'title'    => esc_html__( 'Title', 'mai-engine' ),
			'tax_meta' => esc_html__( 'Taxonomy/Meta', 'mai-engine' ),
			'parent'   => esc_html__( 'Parent', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
		],
	],
	'field_5df1053632cbc' => [
		'name'       => 'post__in',
		'label'      => esc_html__( 'Entries', 'mai-engine' ),
		'desc'       => esc_html__( 'Show specific entries. Choose all that apply. If empty, Grid will get entries by date.', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'post_object',
		'sanitize'   => 'absint',
		'default'    => '', // Can't be empty array.
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
			[
				'field'    => 'field_5df1053632cad', // query_by
				'operator' => '==',
				'value'    => 'title',
			],
		],
		'atts'       => [
			'multiple'      => 1,
			'return_format' => 'id',
			'ui'            => 1,
		],
	],
	'field_5df1397316270' => [
		'name'       => 'taxonomies',
		'label'      => esc_html__( 'Taxonomies', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'repeater',
		'default'    => '',
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
			[
				'field'    => 'field_5df1053632cad', // query_by
				'operator' => '==',
				'value'    => 'tax_meta',
			],
		],
		'atts'       => [
			'collapsed'    => 'field_5df1398916271',
			'button_label' => esc_html__( 'Add Condition', 'mai-engine' ),
			'sub_fields'   => [
				'field_5df1398916271' => [
					'name'     => 'taxonomy',
					'label'    => esc_html__( 'Taxonomy', 'mai-engine' ),
					'block'    => [ 'post' ],
					'type'     => 'select',
					'sanitize' => 'esc_html',
					'default'  => '',
					'choices'  => function () {
						$choices = [];
						if ( ! ( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], 'acf_nonce' ) && isset( $_REQUEST['post_type'] ) && ! empty( $_REQUEST['post_type'] ) ) ) {
							return $choices;
						}
						foreach ( $_REQUEST['post_type'] as $post_type ) {
							$taxonomies = get_object_taxonomies( sanitize_text_field( wp_unslash( $post_type ) ), 'objects' );
							if ( $taxonomies ) {
								foreach ( $taxonomies as $name => $taxo ) {
									$choices[ $name ] = $taxo->label;
								}
							}
						}

						return $choices;
					},
					'atts'     => [
						'ui'   => 1,
						'ajax' => 1,

					],
				],
				'field_5df139a216272' => [
					'name'     => 'terms',
					'label'    => esc_html__( 'Terms', 'mai-engine' ),
					'block'    => [ 'post' ],
					'type'     => 'taxonomy',
					'sanitize' => 'absint',
					'default'  => [],
					'atts'     => [
						'field_type' => 'multi_select',
						'taxonomy'   => 'category',
						'add_term'   => 0,
						'save_terms' => 0,
						'load_terms' => 0,
						'multiple'   => 0,
						'conditions' => [
							[
								'field'    => 'field_5df1398916271', // taxonomy
								'operator' => '!=empty',
							],
						],
					],
				],
				'field_5df18f2305c2c' => [
					'name'       => 'operator',
					'label'      => esc_html__( 'Operator', 'mai-engine' ),
					'block'      => [ 'post' ],
					'type'       => 'select',
					'sanitize'   => 'esc_html',
					'default'    => 'IN',
					'choices'    => [
						'IN'     => esc_html__( 'In', 'mai-engine' ),
						'NOT IN' => esc_html__( 'Not In', 'mai-engine' ),
					],
					'conditions' => [
						[
							'field'    => 'field_5df1398916271', // taxonomy
							'operator' => '!=empty',
						],
					],
				],
			],
		],
	],
	'field_5df139281626f' => [
		'name'       => 'taxonomies_relation',
		'label'      => esc_html__( 'Taxonomies Relation', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'select',
		'sanitize'   => 'esc_html',
		'default'    => 'AND',
		'choices'    => [
			'AND' => esc_html__( 'And', 'mai-engine' ),
			'OR'  => esc_html__( 'Or', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
			[
				'field'    => 'field_5df1053632cad', // query_by
				'operator' => '==',
				'value'    => 'tax_meta',
			],
			[
				'field'    => 'field_5df1397316270', // taxonomies
				'operator' => '>',
				'value'    => '1', // More than 1 row.
			],
		],
	],
	'field_5df2053632dg5' => [
		'name'       => 'meta_keys',
		'label'      => esc_html__( 'Meta Keys', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'repeater',
		'default'    => '',
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
			[
				'field'    => 'field_5df1053632cad', // query_by
				'operator' => '==',
				'value'    => 'tax_meta',
			],
		],
		'atts'       => [
			'collapsed'    => 'field_5df3398916382',
			'button_label' => esc_html__( 'Add Condition', 'mai-engine' ),
			'sub_fields'   => [
				// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
				'field_5df3398916382' => [
					'name'     => 'meta_key',
					'label'    => esc_html__( 'Meta Key', 'mai-engine' ),
					'block'    => [ 'post' ],
					'type'     => 'text',
					'sanitize' => 'esc_html',
					'default'  => '',
				],
				'field_5df29f2315d3d' => [
					'name'       => 'meta_compare',
					'label'      => esc_html__( 'Compare', 'mai-engine' ),
					'block'      => [ 'post' ],
					'type'       => 'select',
					'sanitize'   => 'esc_html',
					'default'    => '',
					'choices'    => [
						'='          => __( 'Is equal to', 'mai-engine' ),
						'!='         => __( 'Is not equal to', 'mai-engine' ),
						'>'          => __( 'Is greater than', 'mai-engine' ),
						'>='         => __( 'Is great than or equal to', 'mai-engine' ),
						'<'          => __( 'Is less than', 'mai-engine' ),
						'<='         => __( 'Is less than or equal to', 'mai-engine' ),
						'EXISTS'     => __( 'Exists', 'mai-engine' ),
						'NOT EXISTS' => __( 'Does not exist', 'mai-engine' ),
					],
					'conditions' => [
						[
							'field'    => 'field_5df3398916382', // meta_key
							'operator' => '!=empty',
						],
					],
				],
				// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
				'field_5df239a217383' => [
					'name'       => 'meta_value',
					'label'      => esc_html__( 'Meta Value', 'mai-engine' ),
					'block'      => [ 'post' ],
					'type'       => 'text',
					'sanitize'   => 'esc_html',
					'default'    => '',
					'conditions' => [
						[
							'field'    => 'field_5df3398916382', // meta_key
							'operator' => '!=empty',
						],
						[
							'field'    => 'field_5df29f2315d3d', // meta_compare
							'operator' => '!=',
							'value'    => 'EXISTS',
						],
					],
				],
			],
		],
	],
	'field_5df239282737g' => [
		'name'       => 'meta_keys_relation',
		'label'      => esc_html__( 'Meta Keys Relation', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'select',
		'sanitize'   => 'esc_html',
		'default'    => 'AND',
		'choices'    => [
			'AND' => esc_html__( 'And', 'mai-engine' ),
			'OR'  => esc_html__( 'Or', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
			[
				'field'    => 'field_5df1053632cad', // query_by
				'operator' => '==',
				'value'    => 'tax_meta',
			],
			[
				'field'    => 'field_5df2053632dg5', // meta_keys
				'operator' => '>',
				'value'    => '1', // More than 1 row.
			],
		],
	],
	'field_5df1053632ce4' => [
		'name'       => 'post_parent__in',
		'label'      => esc_html__( 'Parent', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'post_object',
		'sanitize'   => 'absint',
		'default'    => '',
		'choices'    => function () {
			$choices = [];
			if ( ! ( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], 'acf_nonce' ) && isset( $_REQUEST['post_type'] ) && ! empty( $_REQUEST['post_type'] ) ) ) {
				return $choices;
			}
			$posts = acf_get_grouped_posts(
				[
					'post_type'   => sanitize_text_field( wp_unslash( $_REQUEST['post_type'] ) ),
					'post_status' => 'publish',
				]
			);
			if ( $posts ) {
				$choices = $posts;
			}

			return $choices;
		},
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
			[
				'field'    => 'field_5df1053632cad', // query_by
				'operator' => '==',
				'value'    => 'parent',
			],
		],
		'atts'       => [
			'multiple' => 1,
			'ui'       => 1,
			'ajax'     => 1,
		],
	],
	'field_5df1bf01ea1de' => [
		'name'       => 'offset',
		'label'      => esc_html__( 'Offset', 'mai-engine' ),
		'desc'       => esc_html__( 'Skip this number of entries.', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'number',
		'sanitize'   => 'absint',
		'default'    => 0,
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
			[
				'field'    => 'field_5df1053632cad', // query_by
				'operator' => '!=',
				'value'    => 'title',
			],
		],
		'atts'       => [
			'placeholder' => 0,
			'min'         => 0,
		],
	],
	'field_5df1053632cec' => [
		'name'       => 'orderby',
		'label'      => esc_html__( 'Order By', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'select',
		'sanitize'   => 'esc_html',
		'default'    => 'date',
		'choices'    => [
			'title'          => esc_html__( 'Title', 'mai-engine' ),
			'name'           => esc_html__( 'Slug', 'mai-engine' ),
			'date'           => esc_html__( 'Date', 'mai-engine' ),
			'modified'       => esc_html__( 'Modified', 'mai-engine' ),
			'rand'           => esc_html__( 'Random', 'mai-engine' ),
			'comment_count'  => esc_html__( 'Comment Count', 'mai-engine' ),
			'menu_order'     => esc_html__( 'Menu Order', 'mai-engine' ),
			'post__in'       => esc_html__( 'Entries Order', 'mai-engine' ),
			'meta_value_num' => esc_html__( 'Meta Value Number', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
		],
		'atts'       => [
			'ui'   => 1,
			'ajax' => 1,
		],
	],
	'field_5df1053632cf4' => [
		'name'       => 'orderby_meta_key',
		'label'      => esc_html__( 'Meta key', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'text',
		'sanitize'   => 'esc_html',
		'default'    => '',
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
			[
				'field'    => 'field_5df1053632cec', // orderby
				'operator' => '==',
				'value'    => 'meta_value_num',
			],
		],
	],
	'field_5df1053632cfb' => [
		'name'       => 'order',
		'label'      => esc_html__( 'Order', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'select',
		'sanitize'   => 'esc_html',
		'default'    => '',
		'choices'    => [
			'ASC'  => esc_html__( 'Ascending', 'mai-engine' ),
			'DESC' => esc_html__( 'Descending', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
		],
	],
	'field_5e349237e1c01' => [
		'name'       => 'post__not_in',
		'label'      => esc_html__( 'Exclude Entries', 'mai-engine' ),
		'desc'       => esc_html__( 'Hide specific entries. Choose all that apply.', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'post_object',
		'sanitize'   => 'absint',
		'default'    => '',
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
			[
				'field'    => 'field_5df1053632cad', // query_by
				'operator' => '!=',
				'value'    => 'title',
			],
		],
		'atts'       => [
			'multiple'      => 1,
			'return_format' => 'id',
			'ui'            => 1,
		],
	],
	// TODO: These shoud be separate fields. We can then have desc text and easier to check when building query.
	'field_5df1053632d03' => [
		'name'       => 'exclude',
		'label'      => esc_html__( 'Exclude', 'mai-engine' ),
		'block'      => [ 'post' ],
		'type'       => 'checkbox',
		'sanitize'   => 'esc_html',
		'default'    => '',
		'choices'    => [
			'exclude_current'   => esc_html__( 'Exclude current', 'mai-engine' ),
			'exclude_displayed' => esc_html__( 'Exclude displayed', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5df1053632ca2', // post_type
				'operator' => '!=empty',
			],
		],
	],
	/*********
	 * Terms *
	 */
	'field_5df2063632ca2' => [
		'name'     => 'taxonomy',
		'label'    => esc_html__( 'Taxonomy', 'mai-engine' ),
		'block'    => [ 'term' ],
		'type'     => 'select',
		'sanitize' => 'esc_html',
		'default'  => [ 'category' ],
		'atts'     => [
			'multiple' => 1,
			'ui'       => 1,
			'ajax'     => 0,
		],
	],
	'field_5df2065733db9' => [
		'name'       => 'number',
		'label'      => esc_html__( 'Number of Entries', 'mai-engine' ),
		'desc'       => esc_html__( 'Use 0 to show all.', 'mai-engine' ),
		'block'      => [ 'term' ],
		'type'       => 'number',
		'sanitize'   => 'absint',
		'default'    => 12,
		'conditions' => [
			[
				'field'    => 'field_5df2063632ca2', // taxonomy
				'operator' => '!=empty',
			],
			[
				'field'    => 'field_5df1054642cad', // query_by
				'operator' => '!=',
				'value'    => 'title',
			],
		],
		'atts'       => [
			'placeholder' => 12,
			'min'         => 0,
		],
	],
	'field_5df1054642cad' => [
		'name'       => 'query_by',
		'label'      => esc_html__( 'Get Entries By', 'mai-engine' ),
		'block'      => [ 'term' ],
		'type'       => 'select',
		'sanitize'   => 'esc_html',
		'default'    => 'date',
		'choices'    => [
			'date'   => esc_html__( 'Date', 'mai-engine' ),
			'title'  => esc_html__( 'Title', 'mai-engine' ),
			'parent' => esc_html__( 'Parent', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5df2063632ca2', // taxonomy
				'operator' => '!=empty',
			],
		],
	],
	'field_5df2164632d03' => [
		'name'       => 'exclude',
		'label'      => esc_html__( 'Exclude', 'mai-engine' ),
		'block'      => [ 'term' ],
		'type'       => 'checkbox',
		'sanitize'   => 'esc_html',
		'default'    => '',
		'choices'    => [
			'exclude_current'   => esc_html__( 'Exclude current', 'mai-engine' ),
			'exclude_displayed' => esc_html__( 'Exclude displayed', 'mai-engine' ),
		],
		'conditions' => [
			[
				'field'    => 'field_5df2063632ca2', // taxonomy
				'operator' => '!=empty',
			],
		],
	],
];