<?php

/**
 * Template part for displaying the Breadcrumb 
 *
 * @package consultab
 */

namespace Consultab\Utility;

if (is_front_page()) {
        if (is_home()) { ?>
            <div class="consultab-breadcrumb-one text-center green-bg">
                <div class="container">
                    <div class="row flex-row-reverse">
                        <div class="col-sm-12">
                            <div class="heading-title white consultab-breadcrumb-title">
                                <h1 class="title"><?php esc_html_e('Home', 'consultab'); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php }
}
consultab()->consultab_inner_breadcrumb();
?>