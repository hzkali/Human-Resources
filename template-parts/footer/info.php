<?php

/**
 * Template part for displaying the footer info
 *
 * @package consultab
 */

namespace Consultab\Utility;

if (class_exists('ReduxFramework')) {

	$consultab_options = get_option('consultab-options');
?>
	<div class="copyright-footer">
		<div class="container">
			<div class="row">
				<?php if (isset($consultab_options['display_copyright']) && $consultab_options['display_copyright'] == 'yes') {  ?>
					<div class="col-sm-12 m-0 text-<?php echo esc_attr($consultab_options['footer_copyright_align']); ?>">
						<div class="pt-3 pb-3">
							<?php
							if (isset($consultab_options['footer_copyright'])) {  ?>
								<span class="copyright"><?php echo html_entity_decode($consultab_options['footer_copyright']); ?></span>
							<?php
							} else {	?>
								<span class="copyright"><a target="_blank" href="<?php echo esc_url(__('https://iqonic.design/', 'consultab')); ?>"> <?php printf(esc_html__('© 2022', 'consultab'), 'consultab'); ?><strong><?php printf(esc_html__(' consultab ', 'consultab'), 'consultab'); ?></strong><?php printf(esc_html__('. All Rights Reserved.', 'consultab'), 'consultab'); ?></a></span>
							<?php
							} ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div><!-- .site-info -->

<?php } else { ?>

	<div class="copyright-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="pt-3 pb-3">
						<span class="copyright"><a target="_blank" href="<?php echo esc_url(__('https://iqonic.design/', 'consultab')); ?>"> <?php printf(esc_html__('© 2022', 'consultab'), 'consultab'); ?><strong><?php printf(esc_html__(' consultab ', 'consultab'), 'consultab'); ?></strong><?php printf(esc_html__('. All Rights Reserved.', 'consultab'), 'consultab'); ?></a></span>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .site-info -->
<?php }
