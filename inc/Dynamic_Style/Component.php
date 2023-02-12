<?php
/**
 * Consultab\Utility\Editor\Component class
 *
 * @package consultab
 */

namespace Consultab\Utility\Dynamic_Style;

use Consultab\Utility\Component_Interface;
use Consultab\Utility\Dynamic_Style\Styles;

/**
 * Class for integrating with the block editor.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'dynamic_style';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'after_setup_theme', array( $this, 'action_add_dynamic_styles' ) );
	}

	public function action_add_dynamic_styles( ) {

		new Styles\Header();
		new Styles\HeaderSticky();
		new Styles\BodyContainer();
		new Styles\Footer();
		new Styles\Banner();
		new Styles\Color();
		new Styles\General();
		new Styles\Loader();
		new Styles\Logo();

	}

	public function consultab_dynamic_style ( $consultab_css_array ){
		foreach ( $consultab_css_array as $css_part ) {
			if ( ! empty( $css_part[ 'value' ] ) ) {
				echo esc_attr($css_part[ 'elements' ]) . "{\n";
				echo esc_attr($css_part[ 'property' ]) . ":" . esc_attr($css_part[ 'value' ]) . ";\n";
				echo "}\n\n";
			}
		}
	}

	public function consultab_add_inline ( $consultab_css_array ){
		wp_add_inline_style('consultab-style',$consultab_css_array);
	}
}
