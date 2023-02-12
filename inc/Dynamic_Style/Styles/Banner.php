<?php

/**
 * Consultab\Utility\Dynamic_Style\Styles\Banner class
 *
 * @package consultab
 */

namespace Consultab\Utility\Dynamic_Style\Styles;

use Consultab\Utility\Dynamic_Style\Component;
use function add_action;

class Banner extends Component
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'consultab_banner_dynamic_style'), 20);
        add_action('wp_enqueue_scripts', array($this, 'consultab_opacity_color'), 20);
        add_action('wp_enqueue_scripts', array($this, 'consultab_banner_hide'), 20);
    }

    public function consultab_banner_dynamic_style()
    {
        $page_id = get_queried_object_id();
        $consultab_options = get_option('consultab-options');
        $dynamic_css = '';

        if (isset($consultab_options['display_banner'])) {
            if ($consultab_options['display_banner'] == 'no') {
                $dynamic_css .=
                    '.consultab-breadcrumb-one { display: none !important; }
                    .content-area .site-main {padding : 0 !important; }';
            }
        }

        if (isset($consultab_options['display_title'])) {

            if ($consultab_options['display_title'] == 'no') {
                $dynamic_css .=
                    '.consultab-breadcrumb-one .title { display: none !important; }';
            }
        }

        if (isset($consultab_options['display_breadcumb'])) {

            if ($consultab_options['display_breadcumb'] == 'no') {
                $dynamic_css .=
                    '.consultab-breadcrumb-one .breadcrumb { display: none !important; }';
            }
        }

        if (isset($consultab_options['bg_title_color'])) {

            if ($consultab_options['bg_title_color'] == 'yes') {
                $dynamic = $consultab_options['bg_title_color'];
                $dynamic_css .=
                    '.consultab-breadcrumb-one .title { color: ' . $dynamic . ' !important; }';
            }
        }
        if (isset($consultab_options['bg_type'])) {
            $opt = $consultab_options['bg_type'];
            if ($opt == '1') {
                if (isset($consultab_options['bg_color']) && !empty($consultab_options['bg_color'])) {
                    $dynamic = $consultab_options['bg_color'];
                    $dynamic_css .=
                        '.consultab-breadcrumb-one { background: ' . $dynamic . ' !important; }';
                }
            }
            if ($opt == '2') {
                if (isset($consultab_options['banner_image']['url'])) {
                    $dynamic = $consultab_options['banner_image']['url'];
                    $dynamic_css .=
                        '.consultab-breadcrumb-one { background-image: url(' . $dynamic . ') !important; }';
                }
            }
            if($opt == '2' && isset($consultab_options['banner_image']['url'])){
                $dynamic_css .=
                '.consultab-breadcrumb-one ol li a{ color:var(--color-theme-white)}';
            }
        }

        wp_add_inline_style('consultab-global', $dynamic_css);
    }
    public function consultab_opacity_color()
    {
        //Set Background Opacity Color
        $consultab_options = get_option('consultab-options');

        if (!empty($consultab_options['bg_opacity']) && $consultab_options['bg_opacity'] == "3") {
            $bg_opacity = $consultab_options['opacity_color']['rgba'];
        }
        $dynamic_css = '';

        if (!empty($consultab_options['bg_opacity']) && $consultab_options['bg_opacity'] == "3") {
            if (!empty($bg_opacity) && $bg_opacity != '#ffffff') {
                $dynamic_css .= "
            .breadcrumb-video::before,.breadcrumb-bg::before, .breadcrumb-ui::before {
                background : $bg_opacity !important;
            }";
            }
        }
        wp_add_inline_style('consultab-global', $dynamic_css);
    }

    public function consultab_banner_hide()
    { 
        $consultab_options = get_option('consultab-options');
        $banner_hide = '';
        $pages = '';
        if(isset($consultab_options['pages_select'])){
            $pages = $consultab_options['pages_select'];
            foreach($pages as $data){

                $page = get_page_by_path( $data );
                if(isset($page)){
                    $banner_hide .= '.page-id-'.$page->ID.' .consultab-breadcrumb-one { display: none !important; }';
                }
    
            }
        }

        wp_add_inline_style('consultab-global', $banner_hide);
    }

}
