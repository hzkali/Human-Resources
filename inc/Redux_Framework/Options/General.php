<?php
/**
 * Consultab\Utility\Redux_Framework\Options\General class
 *
 * @package consultab
 */

namespace Consultab\Utility\Redux_Framework\Options;
use Redux;
use Consultab\Utility\Redux_Framework\Component;

class General extends Component {

	public function __construct() {
		$this->set_widget_option();
	}

	protected function set_widget_option() {
		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('General', 'consultab'),
			'id' => 'general',
			'icon' => 'el el-dashboard',
			'customizer_width' => '500px',
		));

		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Body Layout', 'consultab'),
			'id' => 'body_layout',
			'icon' => 'el el-website',
			'subsection' => true,
			'fields' => array(

				array(
					'id'        =>  'grid_container',
					'type'      =>  'dimensions',
					'units'     =>  array('em', 'px', '%'),
					'height'    =>  false,
					'width'     =>  true,
					'title'     =>  esc_html__('Grid Container Width', 'consultab'),
					'desc'      =>  esc_html__('Adjust Your Site Container Width With Help Of Above Option.', 'consultab'),
					'default'   =>  array(
						'width'   => '1400px',
					),
				),

				array(
					'id' => 'body_set_option',
					'type' => 'button_set',
					'title' => esc_html__('Body Set Option', 'consultab'),
					'subtitle' => esc_html__('Select this option for body color or image of the theme.', 'consultab'),
					'options' => array(
						'1' => 'Color',
						'2' => 'Default',
						'3' => 'Image'
					),
					'default' => '2'
				),

				array(
					'id' => 'body_image',
					'type' => 'media',
					'url' => false,
					'title' => esc_html__('Set Body Image', 'consultab'),
					'read-only' => false,
					'required' => array('body_set_option', '=', '3'),
					'subtitle' => esc_html__('Upload Image for your body.', 'consultab'),
				),

				array(
					'id' => 'body_color',
					'type' => 'color',
					'title' => esc_html__('Set Body Color', 'consultab'),
					'subtitle' => esc_html__('Choose Body Color', 'consultab'),
					'required' => array('body_set_option', '=', '1'),
					'default' => '#ffffff',
					'mode' => 'background',
					'transparent' => false
				),

			)
		));

		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Back to Top', 'consultab'),
			'id' => 'back_to_top_general',
			'icon' => 'el el-circle-arrow-up',
			'subsection' => true,
			'fields' => array(
				array(
					'id' => 'back_to_top_btn',
					'type' => 'button_set',
					'title' => esc_html__('"Back to top" Button', 'consultab'),
					'subtitle' => esc_html__('Turn on to show "Back to top" button.', 'consultab'),
					'options' => array(
						'yes' => esc_html__('Yes', 'consultab'),
						'no' => esc_html__('No', 'consultab')
					),
					'default' => esc_html__('yes', 'consultab')
				),
			)
		));

	}
}
