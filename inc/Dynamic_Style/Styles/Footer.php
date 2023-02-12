<?php

/**
 * Consultab\Utility\Dynamic_Style\Styles\Footer class
 *
 * @package consultab
 */

namespace Consultab\Utility\Dynamic_Style\Styles;

use Consultab\Utility\Dynamic_Style\Component;
use function add_action;

class Footer extends Component
{

	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'consultab_footer_dynamic_style'), 20);
	}

	public function consultab_footer_dynamic_style()
	{

		$page_id = get_queried_object_id();
		$consultab_options = get_option('consultab-options');
		$footer_css = '';
		if (isset($consultab_options['footer_top'])) {

			if ($consultab_options['footer_top'] == 'no') {
				$footer_css = '.footer-top { 
					display : none !important;
				}';
			}
		}

		if (isset($consultab_options['change_footer_color'])) {

			if (isset($consultab_options['footer_bg_color']) && $consultab_options['change_footer_color'] == '0') {
				$footer_bg_color = $consultab_options['footer_bg_color'];
				$footer_css .= ".footer {
					background-color: $footer_bg_color !important;
				}";
			}
		}
	

		wp_add_inline_style('consultab-global', $footer_css);
	}
}
