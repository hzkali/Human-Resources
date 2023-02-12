<?php

/**
 * Consultab\Utility\Dynamic_Style\Styles\Banner class
 *
 * @package consultab
 */

namespace Consultab\Utility\Dynamic_Style\Styles;

use Consultab\Utility\Dynamic_Style\Component;
use function add_action;

class Color extends Component
{

	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'consultab_color_options'), 20);
		add_action('wp_enqueue_scripts', array($this, 'consultab_banner_title_color'), 20);
		add_action('wp_enqueue_scripts', array($this, 'consultab_layout_color'), 20);
		add_action('wp_enqueue_scripts', array($this, 'consultab_loader_color'), 20);
		add_action('wp_enqueue_scripts', array($this, 'consultab_bg_color'), 20);
		add_action('wp_enqueue_scripts', array($this, 'consultab_opacity_color'), 20);
		add_action('wp_enqueue_scripts', array($this, 'consultab_header_radio'), 20);
		add_action('wp_enqueue_scripts', array($this, 'consultab_footer_color'), 20);
	}

	public function consultab_color_options()
	{

		$consultab_option = get_option('consultab-options');
		if (class_exists('ReduxFramework')) {
			$color_var = ':root { ';
			
			if (isset($consultab_option['custom_color_switch']) && $consultab_option['custom_color_switch'] == 'yes' && isset($consultab_option['primary_color']) && !empty($consultab_option['primary_color'])) {
				$color = $consultab_option['primary_color'];
				$color_var .= '--color-theme-primary: ' . $color . ' !important;';
			}

			if (isset($consultab_option['custom_color_switch']) && $consultab_option['custom_color_switch'] == 'yes' && isset($consultab_option['secondary_color']) && !empty($consultab_option['secondary_color'])) {
				$color = $consultab_option['secondary_color'];
				$color_var .= '--color-theme-secondary: ' . $color . ' !important;';
			}
			
			if (isset($consultab_option['custom_color_switch']) && $consultab_option['custom_color_switch'] == 'yes' && isset($consultab_option['text_color']) && !empty($consultab_option['text_color'])) {
				$color = $consultab_option['text_color'];
				$color_var .= '--global-font-color: ' . $color . ' !important;';
			}

			if (isset($consultab_option['custom_color_switch']) && $consultab_option['custom_color_switch'] == 'yes' && isset($consultab_option['title_color']) && !empty($consultab_option['title_color'])) {
				$color = $consultab_option['title_color'];
				$color_var .= ' --global-font-title: ' . $color . ' !important;';
			}

			$color_var .= '}';
			wp_add_inline_style('consultab-global', $color_var);
		}
	}

	public function consultab_banner_title_color()
	{
		//Set Body Color
		$consultab_option = get_option('consultab-options');

		if (!empty($consultab_option['bg_title_color'])) {
			$bg_title_color = $consultab_option['bg_title_color'];
		}

		$bn_title_color = "";

		if (!empty($bg_title_color)) {
			$bn_title_color .= "
        .consultab-breadcrumb-one .title{
            color: $bg_title_color !important;
        }";
		}
		wp_add_inline_style('consultab-global', $bn_title_color);
	}

	public function consultab_layout_color()
	{
		//Set Body Color
		$consultab_option = get_option('consultab-options');

		if (!empty($consultab_option['consultab_layout_color'])) {
			$consultab_layout_color = $consultab_option['consultab_layout_color'];
		}
		$body_accent_color = "";

		if (isset($body_back_color) && !empty($body_back_color)) {
			$body_accent_color .= "
        body {
            background-color: $body_back_color !important;
        }";
		} else if (!empty($consultab_option['layout_set']) && $consultab_option['layout_set'] == "1" && $key_body_bg_col['body_variation'] != 'default') {
			if (!empty($consultab_layout_color) && $consultab_layout_color != '#ffffff') {
				$body_accent_color .= "
            body {
                background-color: $consultab_layout_color !important;
            }";
			}
		} else {
			$body_accent_color = "";
		}

		wp_add_inline_style('consultab-style', $body_accent_color);
	}

	public function consultab_loader_color()
	{
		//Set Loader Background Color
		$consultab_option = get_option('consultab-options');

		if (!empty($consultab_option['loader_color'])) {
			$loader_color = $consultab_option['loader_color'];
		}
		$ld_color = "";

		if (!empty($loader_color) && $loader_color != '#ffffff') {
			$ld_color .= "#loading {
								background : $loader_color !important;
							}";
		}
		wp_add_inline_style('consultab-style', $ld_color);
	}

	public function consultab_bg_color()
	{
		//Set Background Color
		$consultab_option = get_option('consultab-options');

		if (!empty($consultab_option['bg_color'])) {
			$bg_color = $consultab_option['bg_color'];
		}
		$background_color = "";

		if (!empty($consultab_option['bg_type']) && $consultab_option['bg_type'] == "1") {
			if (!empty($bg_color) && $bg_color != '#ffffff') {
				$background_color .= "
            .consultab-bg-over {
                background : $bg_color !important;
            }";
			}
		}
		wp_add_inline_style('consultab-style', $background_color);
	}

	public function consultab_opacity_color()
	{
		//Set Background Opacity Color
		$consultab_option = get_option('consultab-options');

		if (!empty($consultab_option['bg_opacity']) && $consultab_option['bg_opacity'] == "3") {
			$bg_opacity = $consultab_option['opacity_color']['rgba'];
		}
		$op_color = "";

		if (!empty($consultab_option['bg_opacity']) && $consultab_option['bg_opacity'] == "3") {
			if (!empty($bg_opacity) && $bg_opacity != '#ffffff') {
				$op_color .= "
        .breadcrumb-video::before,.breadcrumb-bg::before, .breadcrumb-ui::before {
            background : $bg_opacity !important;
        }";
			}
		}
		wp_add_inline_style('consultab-style', $op_color);
	}

	public function consultab_header_radio()
	{
		//Set Text Logo Color
		$consultab_option = get_option('consultab-options');

		if (!empty($consultab_option['header_color'])) {
			$logo = $consultab_option['header_color'];
		}
		$logo_color = "";

		if (!empty($consultab_option['header_radio']) && $consultab_option['header_radio'] == "1") {
			if (!empty($logo) && $logo != '#ffffff') {
				$logo_color .= "
            .logo-text {
                color : $logo !important;
            }";
			}
		}
		wp_add_inline_style('consultab-style', $logo_color);
	}

	public function consultab_footer_color()
	{
		//Set Footer Background Color
		$consultab_option = get_option('consultab-options');

		if (!empty($consultab_option['change_footer_color']) && $consultab_option['change_footer_color'] == "0") {
			$f_color = $consultab_option['footer_color'];
		}
		$footer_color = "";
		if (!empty($consultab_option['change_footer_color']) && $consultab_option['change_footer_color'] == "0") {
			if (!empty($f_color) && $f_color != '#ffffff') {
				$footer_color .= "
            .consultab-over-dark-90 {
                background : $f_color !important;
            }";
			}
		} else {
			$footer_color = '';
		}

		wp_add_inline_style('consultab-style', $footer_color);
	}
}
