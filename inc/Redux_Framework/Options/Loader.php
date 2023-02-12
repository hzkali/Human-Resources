<?php
/**
 * Consultab\Utility\Redux_Framework\Options\Loader class
 *
 * @package consultab
 */

namespace Consultab\Utility\Redux_Framework\Options;
use Redux;
use Consultab\Utility\Redux_Framework\Component;

class Loader extends Component {

	public function __construct() {
		$this->set_widget_option();
	}

	protected function set_widget_option() {
		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Loader', 'consultab'),
			'id' => 'loader',
			'icon' => 'el el-refresh',
			'fields' => array(

				array(
					'id' => 'display_loader',
					'type' => 'button_set',
					'title' => esc_html__('consultab Loader', 'consultab'),
					'subtitle' => wp_kses('Turn on to show the icon/images loading animation while your site loads', 'consultab'),
					'options' => array(
						'yes' => esc_html__('Yes', 'consultab'),
						'no' => esc_html__('No', 'consultab')
					),
					'default' => esc_html__('yes', 'consultab')
				),

				array(
					'id' => 'loader_bg_color',
					'type' => 'color',
					'title' => esc_html__('Loader Background Color', 'consultab'),
					'required' => array('display_loader', '=', 'yes'),
					'subtitle' => esc_html__('Choose Loader Background Color', 'consultab'),
					'default' => '#ffffff',
					'transparent' => false
				),

				array(
					'id' => 'loader_gif',
					'type' => 'media',
					'url' => true,
					'title' => esc_html__('Add GIF image for loader', 'consultab'),
					'read-only' => false,
					'required' => array('display_loader', '=', 'yes'),
					'default' => array('url' => get_template_directory_uri() . '/assets/images/redux/loader.png'),
					'subtitle' => esc_html__('Upload Loader GIF image for your Website.', 'consultab'),
				),

				array(
					'id' => 'loader-dimensions',
					'type' => 'dimensions',
					'units' => array('em', 'px', '%'),
					'units_extended' => 'true',
					'required' => array('display_loader', '=', 'yes'),
					'title' => esc_html__('Loader (Width/Height) Option', 'consultab'),
					'subtitle' => esc_html__('Allows you to choose width, height, and/or unit.', 'consultab'),
					'desc' => esc_html__('You can enable or disable any piece of this field. Width, Height, or Units.', 'consultab'),
				),
			)
		));
	}
}
