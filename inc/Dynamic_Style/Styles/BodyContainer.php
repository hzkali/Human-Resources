<?php
/**
 * Consultab\Utility\Dynamic_Style\Styles\BodyContainer class
 *
 * @package consultab
 */

namespace Consultab\Utility\Dynamic_Style\Styles;

use Consultab\Utility\Dynamic_Style\Component;
use function add_action;

class BodyContainer extends Component
{

	public function __construct()
	{
		if (class_exists('ReduxFramework')) {
			add_action('wp_enqueue_scripts', array( $this,'consultab_container_width'), 21);
		}
	}

	public function consultab_container_width()
	{
		$consultab_options = get_option('consultab-options');

		$box_container_width = "";

		if (isset($consultab_options['opt-slider-label']) && !empty($consultab_options['opt-slider-label'])) {

			$container_width = $consultab_options['opt-slider-label'];

			$box_container_width = "body.iq-container-width .container,
        							body.iq-container-width .elementor-section.elementor-section-boxed>
        							.elementor-container { max-width: " . $container_width . "px; } ";
		}


		wp_add_inline_style('consultab-style',
			$box_container_width
		);
	}
}
