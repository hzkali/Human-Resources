<?php

/**
 * Consultab\Utility\Dynamic_Style\Styles\Header class
 *
 * @package consultab
 */

namespace Consultab\Utility\Dynamic_Style\Styles;

use Consultab\Utility\Dynamic_Style\Component;
use function add_action;


class Header extends Component
{

	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'consultab_header_background_style'), 20);
		add_action('wp_enqueue_scripts', array($this, 'consultab_menu_color_options'), 20);
		add_action('wp_enqueue_scripts', array($this, 'consultab_sub_menu_color_options'), 20);
		add_action('wp_enqueue_scripts', array($this, 'consultab_burger_menu_color_options'), 20);
		add_action('wp_enqueue_scripts', array($this, 'consultab_action_btn_color_options'), 20);
	}

	public function consultab_header_background_style()
	{
		$consultab_option = get_option('consultab-options');
		$dynamic_css = '';

		if (isset($consultab_option['consultab_header_background_type'])) {
			if (isset($consultab_option['consultab_header_background_type']) && $consultab_option['consultab_header_background_type'] != 'default') {
				$type = $consultab_option['consultab_header_background_type'];
				if ($type == 'color') {
					if (!empty($consultab_option['consultab_header_background_color'])) {
						$dynamic_css = 'header#default-header{
							background : ' . $consultab_option['consultab_header_background_color'] . '!important;
						}';
					}
				}
				if ($type == 'image') {
					if (!empty($consultab_option['consultab_header_background_image']['url'])) {
						$dynamic_css = 'header#default-header{
							background : url(' . $consultab_option['consultab_header_background_image']['url'] . ') !important;
						}';
					}
				}
				if ($type == 'transparent') {
					$dynamic_css = 'header#default-header{
						background : transparent !important;
					}';
				}
			}
		}
		wp_add_inline_style('consultab-global', $dynamic_css);
	}

	public function consultab_menu_color_options()
	{

		$consultab_option =  get_option('consultab-options');
		$inline_css = '';

		if (!empty($consultab_option['menu_color']) && $consultab_option['menu_color'] == "custom") {

			if (isset($consultab_option['header_menu_color']) && !empty($consultab_option['header_menu_color'])) {
				$inline_css .= '.sf-menu > li > a{
						color : ' . $consultab_option['header_menu_color'] . '!important;
					}';
			}

			if (isset($consultab_option['hover_menu_color']) && !empty($consultab_option['hover_menu_color'])) {
				$inline_css .= '.sf-menu li:hover > a,.sf-menu li.current-menu-ancestor > a,.sf-menu  li.current-menu-item > a{
						color : ' . $consultab_option['hover_menu_color'] . ' !important;
					}';
			}
		}



		wp_add_inline_style('consultab-global', $inline_css);
	}

	public function consultab_sub_menu_color_options()
	{
		$consultab_option = get_option('consultab-options');
		$inline_css = '';
		if (isset($consultab_option['header_submenu_color_type']) && $consultab_option['header_submenu_color_type'] == 'custom') {
			if (isset($consultab_option['submenu_color']) && !empty($consultab_option['submenu_color'])) {
				$inline_css .= '.sf-menu ul.sub-menu a{
                   		color : ' . $consultab_option['submenu_color'] . ' !important; }';
			}

			if (isset($consultab_option['hover_submenu_color']) && !empty($consultab_option['hover_submenu_color'])) {
				$inline_css .= '.sf-menu li.sfHover>a, .sf-menu li:hover>a,.sf-menu li.current-menu-ancestor>a, .sf-menu li.current-menu-item>a, .sf-menu ul>li.menu-item.current-menu-parent>a,.sf-menu ul li.current-menu-parent>a, .sf-menu ul li .sub-menu li.current-menu-item>a
                					{  color : ' . $consultab_option['hover_submenu_color'] . ' !important;  }';
			}

			if (isset($consultab_option['submenu_background_color']) && !empty($consultab_option['submenu_background_color'])) {
				$inline_css .= '.sf-menu ul.sub-menu li{
                   background : ' . $consultab_option['submenu_background_color'] . ' !important;  }';
			}

			if (isset($consultab_option['hover_submenu_bg_color']) && !empty($consultab_option['hover_submenu_bg_color'])) {
				$inline_css .= '.sf-menu ul.sub-menu li:hover,.sf-menu ul.sub-menu li.current-menu-item{
                   background : ' . $consultab_option['hover_submenu_bg_color'] . ' !important;   }';
			}
		}
		wp_add_inline_style('consultab-global', $inline_css);
	}

	public function consultab_burger_menu_color_options()
	{
		$consultab_option = get_option('consultab-options');
		$inline_css = '';

		if (isset($consultab_option['burger_menu_button_type']) && $consultab_option['burger_menu_button_type'] == 'custom') {

			if (isset($consultab_option['burger_menu_icon']) && !empty($consultab_option['burger_menu_icon'])) {
				$inline_css .= ' .menu-btn .line {
                    background-color : ' . $consultab_option['burger_menu_icon'] . ' !important;
                }';
			}

			if (isset($consultab_option['burger_menu_popup_bg']) && !empty($consultab_option['burger_menu_popup_bg'])) {
				$inline_css .= ' .consultab-mobile-menu {
                    background : ' . $consultab_option['burger_menu_popup_bg'] . ' !important;
                }';
			}
			

			if (isset($consultab_option['burger_menu_color']) && !empty($consultab_option['burger_menu_color'])) {
				$inline_css .= '.consultab-mobile-menu .navbar-nav > li > a, .consultab-mobile-menu .navbar-nav li > .toggledrop svg{ 
					color : ' . $consultab_option['burger_menu_color'] . ' !important;
				}';
			}


			if (isset($consultab_option['burger_hover_menu_color']) && !empty($consultab_option['burger_hover_menu_color'])) {
				$inline_css .= '.consultab-mobile-menu .navbar-nav li.current-menu-item > .toggledrop svg, .consultab-mobile-menu .navbar-nav li.current-menu-item > a, .consultab-mobile-menu .navbar-nav li .sub-menu li:hover > a, .consultab-mobile-menu .navbar-nav li:hover > .toggledrop svg, .consultab-mobile-menu .navbar-nav li:hover > a, .consultab-mobile-menu ul > li.current-menu-ancestor > .toggledrop svg, .consultab-mobile-menu ul > li.current-menu-ancestor > a, .consultab-mobile-menu ul li .sub-menu li.current-menu-item > a, .consultab-mobile-menu ul li .sub-menu li.menu-item.current-menu-ancestor > a{
			        color : ' . $consultab_option['burger_hover_menu_color'] . ' !important;
				}';
			}

			if (isset($consultab_option['burger_submenu_color']) && !empty($consultab_option['burger_submenu_color'])) {
				$inline_css .= '.consultab-mobile-menu .navbar-nav li .sub-menu li a , .consultab-mobile-menu .navbar-nav li .sub-menu li svg{
			        color : ' . $consultab_option['burger_submenu_color'] . ' !important;
				}';
			}
		}
		wp_add_inline_style('consultab-global', $inline_css);
	}

	public function consultab_action_btn_color_options()
	{
		$consultab_option = get_option('consultab-options');
		$inline_css = '';

		if (isset($consultab_option['button_color']) && $consultab_option['button_color'] == 'custom') {

			if (isset($consultab_option['button_bg_color']) && !empty($consultab_option['button_bg_color'])) {
				$inline_css .= '
            header .consultab-shop-btn-holder  #btn-search svg,header .search_count #btn-search{
                color : ' . $consultab_option['button_bg_color'] . ' !important;
            }';
			}
		}

		if (!empty($inline_css)) {
			wp_add_inline_style('consultab-global', $inline_css);
		}
	}
}
