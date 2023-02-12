<?php

/**
 * Template part for displaying the header navigation menu
 *
 * @package consultab
 */

namespace Consultab\Utility;

$consultab_options = get_option('consultab-options');
?>
<div class="container-fluid">
	<div class="row align-items-center">
		<div class="col-sm-12">
			<nav class="consultab-menu-wrapper mobile-menu">
				<div class="navbar">

					<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
						<?php
						if (class_exists('ReduxFramework')) {
							$consultab_options = get_option('consultab-options');
					
							if (isset($consultab_options['header_radio'])) {
								if ($consultab_options['header_radio'] == 1) {
									$logo_text = $consultab_options['header_text'];
									echo esc_html($logo_text);
								}
								if ($consultab_options['header_radio'] == 2) {
									if($consultab_options['consultab_mobile_logo']['url']){
										$mobile_logo = esc_url($consultab_options['consultab_mobile_logo']['url']);
									}
									$options = esc_url($mobile_logo);
								}
							}
							if (isset($options) && !empty($options)) { ?>
								<img class="img-fluid logo" src="<?php echo esc_url($options); ?>" alt="<?php esc_attr_e('consultab', 'consultab'); ?>">
							<?php
							}
						} elseif (has_header_image()) {
							$image = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
							if (has_custom_logo()) { ?>
								<img class="img-fluid logo" src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('consultab', 'consultab'); ?>">
							<?php } else { ?>
								<?php bloginfo('name'); ?>
							<?php }
						} else {
							?>
							<img class="img-fluid logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.png" alt="<?php esc_attr_e('consultab', 'consultab'); ?>">
						<?php } ?>
					</a>

					<button class="navbar-toggler custom-toggler ham-toggle" type="button">
						<span class="menu-btn d-inline-block" id="menu-btn">
							<span class="line one"></span>
							<span class="line two"></span>
							<span class="line three"></span>
						</span>
					</button>
				</div>

				<div class="c-collapse">
					<div class="menu-new-wrapper row align-items-center">
						<div class="menu-scrollbar verticle-mn yScroller col-lg-12">
							<div id="consultab-menu-main" class="consultab-full-menu">
								<?php
								if (consultab()->is_primary_nav_menu_active()) {
									consultab()->display_primary_nav_menu(array('menu_id' => 'top-menu', 'menu_class' => 'navbar-nav',));
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</nav><!-- #site-navigation -->
		</div>
	</div>
</div>