<?php
/**
 * Consultab\Utility\Redux_Framework\Options\FourZeroFour class
 *
 * @package consultab
 */

namespace Consultab\Utility\Redux_Framework\Options;

use Redux;
use Consultab\Utility\Redux_Framework\Component;

class FourZeroFour extends Component
{

	public function __construct()
	{
		$this->set_widget_option();
	}

	protected function set_widget_option()
	{
		Redux::set_section( $this->opt_name, array(
			'title' => esc_html__('404','consultab'),
			'id'    => 'fourzerofour',
			'icon'  => 'el-icon-error',
			'desc'  => esc_html__('This section contains options for 404.','consultab'),
			'fields'=> array(

				array(
					'id'       => '404_banner_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( '404 Page Default Banner Image','consultab'),
					'read-only'=> false,
					'default'  => array( 'url' => get_template_directory_uri() .'/assets/images/redux/404.png' ),
					'subtitle' => esc_html__( 'Upload banner image for your Website. Otherwise blank field will be displayed in place of this section.','consultab'),
				),

				array(
					'id'        => '404_title',
					'type'      => 'text',
					'title'     => esc_html__( '404 Page Title','consultab'),
					'default'   => esc_html__( 'Oops! This Page is Not Found.','consultab' )
				),
				array(
					'id'        => '404_description',
					'type'      => 'textarea',
					'title'     => esc_html__( '404 Page Description','consultab'),
					'default'   => esc_html__( 'The requested page does not exist.','consultab' )
				),
			)));
	}

}
