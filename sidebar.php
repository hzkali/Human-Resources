<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package consultab
 */

namespace Consultab\Utility;

if(!consultab()->is_primary_sidebar_active()){
	return;
}

?>
<div class=" col-xl-4 col-sm-12 mt-5 mt-xl-0 sidebar-service-right">
	<aside id="secondary" class="primary-sidebar widget-area">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Asides', 'consultab' ); ?></h2>
		<?php consultab()->display_primary_sidebar(); ?>
	</aside><!-- #secondary -->
</div>
