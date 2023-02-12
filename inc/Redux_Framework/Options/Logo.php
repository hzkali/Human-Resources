<?php
/**
 * Consultab\Utility\Redux_Framework\Options\Logo class
 *
 * @package consultab
 */

namespace Consultab\Utility\Redux_Framework\Options;
use Redux;
use Consultab\Utility\Redux_Framework\Component;

class Logo extends Component {

	public function __construct() {
		$this->set_widget_option();
	}

	protected function set_widget_option() {
		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Logo','consultab'),
			'id'    => 'header-logo',
			'icon'  => 'el el-flag',
			'fields'=> array(
		
				array(
					'id'       => 'header_radio',
					'type'     => 'button_set',
					'title'    => esc_html__( 'Select Logo Type', 'consultab' ),
					'subtitle' => esc_html__( 'Select either Text or image for your Logo.', 'consultab' ),
					'options'  => array(
						'1' => ' Logo as Text',
						'2' => ' Logo as Image',
					),
					'default'  => '2'
				),
		
				array(
					'id'       => 'header_text',
					'type'     => 'text',
					'title'    => esc_html__( 'Logo Text', 'consultab' ),
					'desc'     => esc_html__( 'Enter the text to be used instead of the logo image', 'consultab' ),
					'required'  => array( 'header_radio', '=', '1' ),
					'msg'      => esc_html__('Please enter correct value','consultab' ),
					'default'  => esc_html__('consultab','consultab' ),
				),
		
				array(
					'id'            => 'header_color',
					'type'          => 'color',
					'title'         => esc_html__( 'Text Color', 'consultab' ),
					'subtitle'      => esc_html__( 'Choose Text Color', 'consultab' ),
					'required'      => array( 'header_radio', '=', '1' ),
					'default'       =>'#ffffff',
					'mode'          => 'background',
					'transparent'   => false
				),
		        array(
					'id' => 'consultab_header_logo_section',
					'type' => 'section',
					'title'=>  esc_html__('Logo', 'consultab'),
					'indent' => true,
					'required'  => array( 'header_radio', '=', '2' ),
				) ,
		
				array(
					'id'       => 'consultab_logo',
					'type'     => 'media',
					'url'      => false,
					'title'    => esc_html__( 'Logo','consultab'),
					'required'  => array( 'header_radio', '=', '2' ),
					'read-only'=> false,
					'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/logo.png' ),
					'subtitle' => esc_html__( 'Upload Logo image for your Website. Otherwise site title will be displayed in place of Logo.','consultab'),
				),

				array(
					'id'       => 'consultab_mobile_logo',
					'type'     => 'media',
					'url'      => false,
					'title'    => esc_html__( 'Responsive Logo','consultab'),
					'required'  => array( 'header_radio', '=', '2' ),
					'read-only'=> false,
					'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/logo.png' ),
					'subtitle' => esc_html__( 'Upload Logo image for your Website. Otherwise site title will be displayed in place of Logo.','consultab'),
				),
		

			)
		));
	}
}
