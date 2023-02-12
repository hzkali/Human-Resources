<?php
/**
 * Consultab\Utility\Redux_Framework\Options\Color class
 *
 * @package consultab
 */

namespace Consultab\Utility\Redux_Framework\Options;

use Redux;
use Consultab\Utility\Redux_Framework\Component;

class Color extends Component {

	public function __construct() {
		$this->set_widget_option();
	}

	protected function set_widget_option() {
		Redux::set_section( $this->opt_name, array(
			'title' => esc_html__( 'Color Attribute','consultab' ),
			'id'    => 'color',
			'icon'  => 'el el-brush',
			'desc'  => esc_html__('Change the default colors of your site.','consultab'),
			'fields'=> array(
				array(
					'id'       => 'custom_color_switch',
					'type'     => 'button_set',
					'title'    => esc_html__('Set Custom Color', 'consultab'),
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No',
					),
					'default' => 'no'
				),

				array(
					'id'            => 'primary_color',
					'type'          => 'color',
					'title'         => esc_html__( 'Set Primary Color', 'consultab' ),
					'subtitle'      => esc_html__( 'Select primary accent color.', 'consultab' ),
					'mode'          => 'background',
					'transparent'   => false,
					'required'      => array('custom_color_switch' ,'=' , 'yes')
				),

				array(
					'id'            => 'secondary_color',
					'type'          => 'color',
					'title'         => esc_html__( 'Set Secondary Color', 'consultab' ),
					'subtitle'      => esc_html__( 'Select secondary complementing color.', 'consultab' ),
					'mode'          => 'background',
					'transparent'   => false,
					'required'      => array('custom_color_switch' ,'=' , 'yes')
				),

				array(
					'id'            => 'title_color',
					'type'          => 'color',
					'title'         => esc_html__( 'Title Color', 'consultab' ),
					'subtitle'      => esc_html__( 'Select default Title(Headings) color', 'consultab' ),
					'mode'          => 'background',
					'transparent'   => false,
					'required'      => array('custom_color_switch' ,'=' , 'yes')
				),


				array(
					'id'            => 'text_color',
					'type'          => 'color',
					'title'         => esc_html__( 'Body Text Color', 'consultab' ),
					'subtitle'      => esc_html__( 'Select default body text color', 'consultab' ),
					'mode'          => 'background',
					'transparent'   => false,
					'required'      => array('custom_color_switch' ,'=' , 'yes')
				),

			)
		));
	}
}
