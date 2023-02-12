<?php

/**
 * Consultab\Utility\Redux_Framework\Options\Footer class
 *
 * @package consultab
 */

namespace Consultab\Utility\Redux_Framework\Options;

use Redux;
use Consultab\Utility\Redux_Framework\Component;

class Footer extends Component
{

	public function __construct()
	{
		$this->set_widget_option();
	}

	protected function set_widget_option()
	{
		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Footer', 'consultab'),
			'id' => 'footer',
			'icon' => 'el el-arrow-down',
			'customizer_width' => '500px',
		));

		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Footer Image', 'consultab'),
			'id' => 'footer-logo',
			'subsection' => true,
			'desc' => esc_html__('This section contains options for footer.', 'consultab'),
			'fields' => array(

				array(
					'id' => 'display_footer_bg_image',
					'type' => 'button_set',
					'title' => esc_html__('Display Footer Background Image', 'consultab'),
					'subtitle' => esc_html__('Display Footer Background Image On All page', 'consultab'),
					'options' => array(
						'yes' => esc_html__('Yes', 'consultab'),
						'no' => esc_html__('No', 'consultab')
					),
					'default' => esc_html__('no', 'consultab')
				),
				array(
					'id'       => 'logo_footer',
					'type'     => 'media',
					'url'      => false,
					'title'    => esc_html__('Footer Logo', 'consultab'),
					'read-only' => false,
					'subtitle' => esc_html__('Upload Footer Logo for your Website.', 'consultab'),
					'default'  => array('url' => get_template_directory_uri() . '/assets/images/logo.png'),
				),

				array(
					'id' => 'footer_bg_image',
					'type' => 'media',
					'url' => false,
					'title' => esc_html__('Footer Background Image', 'consultab'),
					'required' => array('display_footer_bg_image', '=', 'yes'),
					'read-only' => false,
					'subtitle' => esc_html__('Upload Footer image for your Website.', 'consultab'),
					'default' => array('url' => get_template_directory_uri() . '/assets/images/redux/footer-img.jpg'),
				),

				array(
					'id' => 'change_footer_color',
					'type' => 'button_set',
					'title' => esc_html__('Change Footer Color', 'consultab'),
					'subtitle' => esc_html__('Turn on to Change Footer Background Color', 'consultab'),
					'options' => array(
						'0' => esc_html__('Yes', 'consultab'),
						'1' => esc_html__('No', 'consultab')
					),
					'default' => esc_html__('0', 'consultab')
				),

				array(
					'id' => 'footer_bg_color',
					'type' => 'color',
					'subtitle' => esc_html__('Choose Footer Background Color', 'consultab'),
					'required' => array('change_footer_color', '=', '0'),
					'mode' => 'background',
					'transparent' => false
				),

			)
		));

		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Footer Option', 'consultab'),
			'id' => 'footer_section',
			'subsection' => true,
			'desc' => esc_html__('This section contains options for footer.', 'consultab'),
			'fields' => array(

				array(
					'id' => 'footer_top',
					'type' => 'button_set',
					'title' => esc_html__('Display Footer Top', 'consultab'),
					'subtitle' => esc_html__('Display Footer Top On All page', 'consultab'),
					'options' => array(
						'yes' => esc_html__('Yes', 'consultab'),
						'no' => esc_html__('No', 'consultab')
					),
					'default' => esc_html__('yes', 'consultab')
				),

				array(
					'id' => 'consultab_footer_width',
					'type' => 'image_select',
					'title' => esc_html__('Footer Layout Type', 'consultab'),
					'required' => array('footer_top', '=', 'yes'),
					'subtitle' => wp_kses(__('<br />Choose among these structures (1column, 2column and 3column) for your footer section.<br />To fill these column sections you should go to appearance > widget.<br />And add widgets as per your needs.', 'consultab'), array('br' => array())),
					'options' => array(
						'1' => array('title' => esc_html__('Footer Layout 1', 'consultab'), 'img' => get_template_directory_uri() . '/assets/images/redux/footer_first.png'),
						'2' => array('title' => esc_html__('Footer Layout 2', 'consultab'), 'img' => get_template_directory_uri() . '/assets/images/redux/footer_second.png'),
						'3' => array('title' => esc_html__('Footer Layout 3', 'consultab'), 'img' => get_template_directory_uri() . '/assets/images/redux/footer_third.png'),
						'4' => array('title' => esc_html__('Footer Layout 4', 'consultab'), 'img' => get_template_directory_uri() . '/assets/images/redux/footer_four.png'),
					),
					'default' => '4',
				),

				array(
					'id' => 'footer_one',
					'type' => 'select',
					'title' => esc_html__('Select 1 Footer Alignment', 'consultab'),
					'required' => array('footer_top', '=', 'yes'),
					'options' => array(
						'1' => 'Left',
						'2' => 'Right',
						'3' => 'Center',
					),
					'default' => '1',
				),

				array(
					'id' => 'footer_two',
					'type' => 'select',
					'title' => esc_html__('Select 2 Footer Alignment', 'consultab'),
					'required' => array('footer_top', '=', 'yes'),
					'options' => array(
						'1' => 'Left',
						'2' => 'Right',
						'3' => 'Center',
					),
					'default' => '1',
				),

				array(
					'id' => 'footer_three',
					'type' => 'select',
					'title' => esc_html__('Select 3 Footer Alignment', 'consultab'),
					'required' => array('footer_top', '=', 'yes'),
					'options' => array(
						'1' => 'Left',
						'2' => 'Right',
						'3' => 'Center',
					),
					'default' => '1',
				),

				array(
					'id' => 'footer_four',
					'type' => 'select',
					'title' => esc_html__('Select 4 Footer Alignment', 'consultab'),
					'required' => array('footer_top', '=', 'yes'),
					'options' => array(
						'1' => 'Left',
						'2' => 'Right',
						'3' => 'Center',
					),
					'default' => '1',
				),
				
				array(
					'id' => 'footer_five',
					'type' => 'select',
					'title' => esc_html__('Select 5 Footer Alignment', 'consultab'),
					'required' => array('footer_top', '=', 'yes'),
					'options' => array(
						'1' => 'Left',
						'2' => 'Right',
						'3' => 'Center',
					),
					'default' => '1',
				),
			)
		));

		Redux::set_section($this->opt_name, array(
			'title' => esc_html__('Footer Copyright', 'consultab'),
			'id' => 'footer_copyright',
			'subsection' => true,
			'fields' => array(

				array(
					'id' => 'display_copyright',
					'type' => 'button_set',
					'title' => esc_html__('Display Copyrights', 'consultab'),
					'options' => array(
						'yes' => esc_html__('Yes', 'consultab'),
						'no' => esc_html__('No', 'consultab')
					),
					'default' => esc_html__('yes', 'consultab')
				),
				array(
					'id' => 'footer_copyright_align',
					'type' => 'select',
					'title' => esc_html__('Copyrights Alignment', 'consultab'),
					'required' => array('display_copyright', '=', 'yes'),
					'options' => array(
						'left' => 'Left',
						'right' => 'Right',
						'center' => 'Center',
					),
					'default' => 'center',
				),

				array(
					'id' => 'footer_copyright',
					'type' => 'editor',
					'required' => array('display_copyright', '=', 'yes'),
					'title' => esc_html__('Copyrights Text', 'consultab'),
					'default' => esc_html__('© 2022 consultab. All Rights Reserved.', 'consultab'),
				),
			)
		));


	}
}
