<?php

/**
 * Consultab\Utility\Dynamic_Style\Styles\HeaderSticky class
 *
 * @package consultab
 */

namespace Consultab\Utility\Dynamic_Style\Styles;

use Consultab\Utility\Dynamic_Style\Component;
use function add_action;

class HeaderSticky extends Component
{
	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'consultab_header_sticky_background_style'));
		add_action('wp_enqueue_scripts', array($this, 'consultab_sticky_sub_menu_color_options'), 20);
		add_action('wp_enqueue_scripts', array($this, 'consultab_sticky_menu_color_options'), 20);
	}

	public function consultab_header_sticky_background_style()
	{
		$consultab_option = get_option('consultab-options');
		$inline_css = '';


		if (isset($consultab_option['display_sticky_header'])) {
			if (isset($consultab_option['sticky_header_bg']) && $consultab_option['sticky_header_bg'] != 'default') {
				$type = $consultab_option['sticky_header_bg'];

				if ($type == 'color') {
					if (!empty($consultab_option['sticky_header_bg_color'])) {
						$inline_css .= 'header#default-header.menu-sticky{
							background : ' . $consultab_option['sticky_header_bg_color'] . '!important;
						}';
					}
				}
				if ($type == 'image') {
					if (!empty($consultab_option['sticky_header_bg_img']['url'])) {
						$inline_css .= 'header#default-header.menu-sticky{
							background : url(' . $consultab_option['sticky_header_bg_img']['url'] . ') !important;
						}';
					}
				}
				if ($type == 'transparent') {
					$inline_css .= 'header#default-header.menu-sticky{
						background : transparent !important;
					}';
				}
			}
		}

		wp_add_inline_style('consultab-global', $inline_css);
	}



	public function consultab_sticky_menu_color_options()
	{
		$consultab_option = get_option('consultab-options');
		$inline_css = '';
		if (isset($consultab_option['sticky_menu_color_type']) && $consultab_option['sticky_menu_color_type'] == 'custom') {
			if (isset($consultab_option['sticky_menu_color']) && !empty($consultab_option['sticky_menu_color'])) {
				$inline_css .= 'header.header-down .sf-menu > li > a, header.header-up .sf-menu > li > a{
						color : ' . $consultab_option['sticky_menu_color'] . '!important;
					}';
			}

			if (isset($consultab_option['sticky_menu_hover_color']) && !empty($consultab_option['sticky_menu_hover_color'])) {
				$inline_css .= 'header.header-down .sf-menu li:hover > a,header.header-down .sf-menu li.current-menu-ancestor > a,header.header-down .sf-menu  li.current-menu-item > a, header.header-up .sf-menu li:hover > a,header.header-up .sf-menu li.current-menu-ancestor > a,header.header-up .sf-menu  li.current-menu-item > a{
						color : ' . $consultab_option['sticky_menu_hover_color'] . '!important;
					}';
			}
		}
		wp_add_inline_style('consultab-global', $inline_css);
	}

	public function consultab_sticky_sub_menu_color_options()
	{
		$consultab_option = get_option('consultab-options');
		$inline_css = '';

		if (isset($consultab_option['sticky_header_submenu_color_type']) && $consultab_option['sticky_header_submenu_color_type'] == 'custom') {
			if (isset($consultab_option['sticky_consultab_header_submenu_color']) && !empty($consultab_option['sticky_consultab_header_submenu_color'])) {
				$inline_css .= 'header.header-down .sf-menu ul.sub-menu a, header.header-up .sf-menu ul.sub-menu a{
                color : ' . $consultab_option['sticky_consultab_header_submenu_color'] . ' !important;
            }';
			}

			if (isset($consultab_option['sticky_consultab_header_submenu_hover_color']) && !empty($consultab_option['sticky_consultab_header_submenu_hover_color'])) {
				$inline_css .= 'header.header-down .sf-menu li.sfHover>a,header.header-down .sf-menu li:hover>a,header.header-down .sf-menu li.current-menu-ancestor>a,header.header-down .sf-menu li.current-menu-item>a,header.header-down .sf-menu ul>li.menu-item.current-menu-parent>a,header.header-down .sf-menu ul li.current-menu-parent>a,header.header-down .sf-menu ul li .sub-menu li.current-menu-item>a,
				header.header-up .sf-menu li.sfHover>a,header.header-up .sf-menu li:hover>a,header.header-up .sf-menu li.current-menu-ancestor>a,header.header-up .sf-menu li.current-menu-item>a,header.header-up .sf-menu ul>li.menu-item.current-menu-parent>a,header.header-up .sf-menu ul li.current-menu-parent>a,header.header-up .sf-menu ul li .sub-menu li.current-menu-item>a{
                color : ' . $consultab_option['sticky_consultab_header_submenu_hover_color'] . ' !important;
            }';
			}

			if (isset($consultab_option['sticky_consultab_header_submenu_background_color']) && !empty($consultab_option['sticky_consultab_header_submenu_background_color'])) {
				$inline_css .= 'header.header-up .sf-menu ul.sub-menu li, header.header-down .sf-menu ul.sub-menu li {
                background : ' . $consultab_option['sticky_consultab_header_submenu_background_color'] . ' !important;
            }';
			}

			if (isset($consultab_option['sticky_header_submenu_background_hover_color']) && !empty($consultab_option['sticky_header_submenu_background_hover_color'])) {
				$inline_css .= 'header.header-up .sf-menu ul.sub-menu li:hover,header.header-up .sf-menu ul.sub-menu li.current-menu-item ,header.header-up .sf-menu ul.sub-menu li:hover,header.header-up .sf-menu ul.sub-menu li.current-menu-item,
				header.header-down .sf-menu ul.sub-menu li:hover,header.header-down .sf-menu ul.sub-menu li.current-menu-item ,header.header-down .sf-menu ul.sub-menu li:hover,header.header-down .sf-menu ul.sub-menu li.current-menu-item{
                background : ' . $consultab_option['sticky_header_submenu_background_hover_color'] . ' !important;
            }';
			}

		}
		wp_add_inline_style('consultab-global', $inline_css);
	}
}
