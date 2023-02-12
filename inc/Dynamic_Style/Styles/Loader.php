<?php
/**
 * Consultab\Utility\Dynamic_Style\Styles\Loader class
 *
 * @package consultab
 */

namespace Consultab\Utility\Dynamic_Style\Styles;

use Consultab\Utility\Dynamic_Style\Component;
use function add_action;

class Loader extends Component
{

	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'consultab_loader_options'), 20);
	}

	public function consultab_loader_options(){
        $consultab_options = get_option('consultab-options');
        $loader_css = '';
            if(isset($consultab_options['loader_bg_color'])){
                $loader_var = $consultab_options['loader_bg_color'];
                if( !empty($loader_var) && $loader_var != '#ffffff') {
                    $loader_css .= "
                    #loading {
                        background : $loader_var !important;
                    }"; 
                }
            }            
            wp_add_inline_style( 'consultab-global', $loader_css );
    }
}
