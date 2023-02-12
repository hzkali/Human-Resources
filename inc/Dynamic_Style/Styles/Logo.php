<?php
/**
 * Consultab\Utility\Dynamic_Style\Styles\Logo class
 *
 * @package consultab
 */

namespace Consultab\Utility\Dynamic_Style\Styles;

use Consultab\Utility\Dynamic_Style\Component;
use function add_action;

class Logo extends Component
{

	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'consultab_logo_options'), 20);
	}

	public function consultab_logo_options(){
        $consultab_options = get_option('consultab-options');
        $logo_var = '';
        if(isset($consultab_options['header_radio']) && $consultab_options['header_radio'] == 1){
            if(isset($consultab_options['header_color'])){
                $logo = $consultab_options['header_color'];
                    $logo_var .= "
                    .navbar-light .navbar-brand {
                        color : $logo !important;
                    }"; 
            }  
        }          
            wp_add_inline_style( 'consultab-global', $logo_var );
    }
}
