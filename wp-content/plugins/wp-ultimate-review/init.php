<?php

namespace WurReview;

use WurReview\Utilities\Helper;

defined('ABSPATH') || exit;

/**
 * Class Name : Init - This main class for review plugin
 * Class Type : Normal class
 *
 * initiate all necessary classes, hooks, configs
 *
 * @since 1.0.0
 * @access Public
 */
Class Init {

	/**
	 * veriable for meta box type - $controls
	 * Set Attribute : title_name, type, class, id, name, options data
	 * @since 1.0.0
	 * @access private
	 */
	private $controls = [
		'xs_reviwer_ratting' => [
			'title_name' => 'Rating',
			'type'       => 'select',
			'id'         => 'xs_ratting_id',
			'require'    => 'Yes',
			'class'      => 'xs_rating_class',
			'options'    => [
				'1' => '1 Star',
				'2' => '2 Star',
				'3' => '3 Star',
				'4' => '4 Star',
				'5' => '5 Star',
			],
		],
		'xs_reviw_title'     => [
			'title_name' => 'Review Title',
			'type'       => 'text',
			'require'    => 'Yes',
			'options'    => [],
		],

		'xs_reviwer_name'    => [
			'title_name' => 'Reviewer Name',
			'type'       => 'text',
			'require'    => 'No',
			'options'    => [],
		],
		'xs_reviwer_email'   => [
			'title_name' => 'Reviewer Email',
			'type'       => 'text',
			'require'    => 'Yes',
			'options'    => [],
		],
		'xs_reviwer_website' => [
			'title_name' => 'Website',
			'type'       => 'text',
			'require'    => 'No',
			'options'    => [],
		],
		'xs_reviw_summery'   => [
			'title_name' => 'Review Summary',
			'type'       => 'textarea',
			'require'    => 'Yes',
			'options'    => [],
		],
	];

	/**
	 * veriable for review schema - $schema
	 * Set Attribute : title_name, type, class, id, name, options data
	 * @since 1.0.0
	 * @access private
	 */
	private $schema = [
		'Article'             => 'Article',
		'Book'                => 'Book',
		'Game'                => 'Game',
		'Movie'               => 'Movie',
		'MusicRecording'      => 'MusicRecording',
		'Painting'            => 'Painting',
		'Place'               => 'Place',
		'Product'             => 'Product',
		'Recipe'              => 'Recipe',
		'Restaurant'          => 'Restaurant',
		'SoftwareApplication' => 'SoftwareApplication',
		'Store'               => 'Store',
		'Thing'               => 'Thing',
		'TVSeries'            => 'TVSeries',
		'WebSite'             => 'WebSite',
	];

	/**
	 * veriable for meta box post type - $post_type
	 * @since 1.0.0
	 * @access private
	 */
	private $post_type = 'xs_review';

	/**
	 * veriable for review type - $review_style
	 * @since 1.0.0
	 * @access private
	 */
	private $review_style = ['point' => 'Point', 'star' => 'Star', 'percentage' => 'Percentage', 'pie' => 'Pie Chart'];

	/**
	 * veriable for review type - $review_type
	 * @since 1.0.0
	 * @access public
	 */
	private $review_type = [
		'star'   => 'Star',
		'slider' => 'Slider',
		'bar'    => 'Bar',
		'square' => 'Square',
		'movie'  => 'Movie',
		'pill'   => 'Pill',
	];

	// public $review_type = ['star' => 'Star'];
	//, 'woocommerce'  => 'Woocommerce Product Single page'

	/**
	 * veriable for page enable - $page_enable
	 * @since 1.0.0
	 * @access private
	 */
	private $page_enable = ['post' => 'Post', 'page' => 'Page'];


	/**
	 * Construct the plugin object
	 * @since 1.0.0
	 * @access private
	 */
	public function __construct() {
		$this->review_autoloder();
		add_action('init', [$this, 'wur_add_custom_post']);
		App\Content::instance()->init($this->controls, $this->post_type);
	}


	/**
	 * Review wur_add_custom_post.
	 * Method Description: added menu menu in wordpress dashboard.
	 * @since 1.0.0
	 * @access public
	 */
	public function wur_add_custom_post() {
		$labels = [
			'name'               => _x('Wp Reviews', 'WP Ultimate Reviews', 'wp-ultimate-review'),
			'singular_name'      => _x('Review', 'WP Ultimate Reviews', 'wp-ultimate-review'),
			'add_new'            => _x('Add Review', 'WP Ultimate Reviews', 'wp-ultimate-review'),
			'add_new_item'       => _x('Add New Review', 'WP Ultimate Reviews', 'wp-ultimate-review'),
			'edit_item'          => _x('Edit Review', 'WP Ultimate Reviews', 'wp-ultimate-review'),
			'new_item'           => _x('New Review', 'WP Ultimate Reviews', 'wp-ultimate-review'),
			'all_items'          => _x('All Reviews', 'WP Ultimate Reviews', 'wp-ultimate-review'),
			'view_item'          => _x('View Reviews', 'WP Ultimate Reviews', 'wp-ultimate-review'),
			'search_items'       => _x('Search Review', 'WP Ultimate Reviews', 'wp-ultimate-review'),
			'not_found'          => _x('No Review found', 'WP Ultimate Reviews', 'wp-ultimate-review'),
			'not_found_in_trash' => _x('No Review found in Trash', 'WP Ultimate Reviews', 'wp-ultimate-review'),
			'parent_item_colon'  => '',
			'menu_name'          => _x('WP Reviews', 'WP Ultimate Reviews', 'wp-ultimate-review'),
		];

		register_post_type($this->post_type,
			[
				'labels'              => $labels,
				'supports'            => ['editor'],
				'public'              => true,
				'publicly_queryable'  => true,
				'query_var'           => true,
				'has_archive'         => true,
				'rewrite'             => false,
				'menu_position'       => 108,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'menu_icon'           => WUR_REVIEW_PLUGIN_URL . 'assets/admin/img/icon-menu.png',
				'capability_type'     => 'post',
				'capabilities'        => [
					'create_posts' => 'do_not_allow',
				],
				'map_meta_cap'        => true,
			]
		);

		$this->page_enable = self::__cpt_list();

		new App\Cpt($this->controls, $this->post_type, $this->review_type, $this->review_style, $this->page_enable);
		new App\Settings($this->controls, $this->post_type, $this->review_type, $this->review_style, $this->page_enable);

	}


	/**
	 * Review review_autoloder.
	 * xs_review autoloader loads all the classes needed to run the plugin.
	 * @since 1.0.0
	 * @access private
	 */

	private function review_autoloder() {
		require_once WUR_REVIEW_PLUGIN_PATH . '/autoloader.php';
		Autoloader::run_plugin();
	}


	public static function __cpt_list() {
		//global $wp_post_types;

		$list               = [];
		$exclude            = ['attachment', 'elementor_library', 'xs_review'];
		$post_types_objects = get_post_types(
			[
				'public' => true,
			], 'objects'
		);

		foreach($post_types_objects as $cpt_slug => $post_type) {
			if(in_array($cpt_slug, $exclude)) {
				continue;
			}
			$list[$cpt_slug] = ucfirst($post_type->labels->name);
		}

		return $list;
	}
}

