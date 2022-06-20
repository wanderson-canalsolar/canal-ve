<?php

namespace WurReview\Helper;

defined('ABSPATH') || exit;


class Helper {

	public static function avarage_loop($review, $limit) {

		return $review * (100 / $limit);
	}

	public static function avarage_final($loop, $limit, $avarage) {

		return $limit * ($avarage / $loop / 100);
	}

	public static function ip_address() {

		if(isset($_SERVER['HTTP_CLIENT_IP'])) {
			return $_SERVER['HTTP_CLIENT_IP'];
		} else {
			if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				return $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				return $_SERVER['REMOTE_ADDR'];
			}
		}
	}

	/**
	 * todo - remove all usage of \WurReview\Init::$controls; later
	 *
	 * @return array
	 */
	public static function get_review_form_config() {

		return [
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
	}
}
