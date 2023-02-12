<?php

/**
 * Template part for displaying a post's taxonomy terms
 *
 * @package consultab
 */

namespace Consultab\Utility;

$taxonomies = wp_list_filter(
	get_object_taxonomies($post, 'objects'),
	array(
		'public' => true,
	)
);

?>
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
	</li>
	<?php
	$post_tag = get_the_tags();
	if ($post_tag) { ?>

		<?php foreach ($post_tag as $tag) { ?>
			<li><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo esc_html($tag->name); ?></a></li>
		<?php } ?>
	<?php }
	?>
</ul>