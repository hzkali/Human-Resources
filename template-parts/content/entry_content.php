<?php
/**
 * Template part for displaying a post's content
 *
 * @package consultab
 */

namespace Consultab\Utility;

?>

	<?php
	if (is_single()) {
		the_content();
	} else {
		the_excerpt();
	}

	if (is_single()) { 
		$post_slug = ''; ?>
		<?php
			$post_tag = get_the_tags();
			if ($post_tag) { ?>
			<ul class="consultab-blogtag list-inline"> 
			<li class="consultab-comment-count">
		<?php
		$comments_number = get_comments_number();
		echo esc_html($comments_number);
		if ($comments_number == 1) {
			_e(' Comment', 'consultab');
		} else {
			_e(' Comments', 'consultab');
		}
		?>
	</li> <?php 
					foreach ($post_tag as $cat) { ?>
						<li><a href="<?php get_category_link($cat->cat_ID) ?>"><?php echo esc_html($cat->name); ?></a></li> <?php 
					} ?>
			</ul> 
		<?php } 
		

	} ?>

</div><!-- .entry-content -->
