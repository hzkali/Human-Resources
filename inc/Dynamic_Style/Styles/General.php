<?php

/**
 * Consultab\Utility\Dynamic_Style\Styles\General class
 *
 * @package consultab
 */

namespace Consultab\Utility\Dynamic_Style\Styles;

use Consultab\Utility\Dynamic_Style\Component;
use function add_action;

class General extends Component
{
	public function __construct()
	{

		add_action('wp_enqueue_scripts', array($this, 'consultab_create_general_style'), 20);
	}

	public function consultab_create_general_style()
	{

		$consultab_option = get_option('consultab-options');
		$general_var = ':root { ';

		if (isset($consultab_option['grid_container']) && !empty($consultab_option['grid_container'])) {
			$general = $consultab_option['grid_container']['width'];
			$general_var .= ' --content-width: ' . $general . ' !important;';
		}
		$general_var .= '}';
		if (isset($consultab_option['body_set_option']) && $consultab_option['body_set_option'] == 1) {
			if (
				isset($consultab_option['body_color'])  && !empty($consultab_option['body_color'])
			) {
				$general = $consultab_option['body_color'];
				$general_var .= ' body { background : ' . $general . ' !important; }';
			}
		}
		if (isset($consultab_option['body_set_option']) && $consultab_option['body_set_option'] == 3) {
			if (isset($consultab_option['body_image']['url']) && !empty($consultab_option['body_image']['url'])) {
				$general = $consultab_option['body_image']['url'];
				$general_var .= '
					body { background-image: url(' . $general . ') !important; }';
			}
		}

		if (isset($consultab_option['back_to_top_btn']) && $consultab_option['back_to_top_btn'] == 'no') {
			if (isset($consultab_option['back_to_top_btn']) && !empty($consultab_option['back_to_top_btn'])) {
				$general_var .= '
					#back-to-top { display: none !important; }';
			}
		}

		wp_add_inline_style('consultab-global', $general_var);
	}
}
