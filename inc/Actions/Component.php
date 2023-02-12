<?php

/**
 * Consultab\Utility\Actions\Component class
 *
 * @package consultab
 */

namespace Consultab\Utility\Actions;

use Consultab\Utility\Component_Interface;
use Consultab\Utility\Templating_Component_Interface;
use function add_action;

/**
 * Class for managing comments UI.
 *
 * Exposes template tags:
 * * `consultab()->the_comments( array $args = array() )`
 *
 * @link https://wordpress.org/plugins/amp/
 */
class Component implements Component_Interface, Templating_Component_Interface
{
	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug(): string
	{
		return 'actions';
	}
	public function initialize()
	{
	}
	/**
	 * Gets template tags to expose as methods on the Template_Tags class instance, accessible through `consultab()`.
	 *
	 * @return array Associative array of $method_name => $callback_info pairs. Each $callback_info must either be
	 *               a callable or an array with key 'callable'. This approach is used to reserve the possibility of
	 *               adding support for further arguments in the future.
	 */
	public function template_tags(): array
	{
		return array(
			'consultab_get_blog_readmore_link' => array($this, 'consultab_get_blog_readmore_link'),
			'consultab_get_blog_readmore' => array($this, 'consultab_get_blog_readmore'),
			'consultab_get_comment_btn' => array($this, 'consultab_get_comment_btn'),
			'consultab_get_comment_reply' => array($this, 'consultab_get_comment_reply'),
		);
	}

	//** Blog Read More Button Link **//
	public function consultab_get_blog_readmore_link()
	{
		echo '<div class="blog-button">		
				<a class="consultab-button consultab-button-link" href="' . get_the_permalink() . '">' . __('Read More', 'consultab') . '
				</a>
			</div>';
	}


	//** Blog Read More Button **//
	public function consultab_get_blog_readmore($link, $btn_text)
	{
		echo '<div class="blog-button">		
				<a class="consultab-button" href="' . esc_url($link) . '">' . esc_html($btn_text) . ' 
					<span class="consultab-icon-right"><i class="fas fa-arrow-right"></i></span>
				</a>
			</div>';
	}


	//** Comment Submit Button **//
	public function consultab_get_comment_btn()
	{
		return '<button name="submit" type="submit" id="submit" class="submit consultab-button consultab-button-post" value="' . __('Post Comment' . 'consultab') . '" >
				<span class="consultab-main-btn">
				<span class="text-btn">' . esc_html__('Post Comment', 'consultab') . '
				</button>';
	}

	//** Comment Reply Button **//
	public function consultab_get_comment_reply($depth)
	{
		if ($depth < get_option('thread_comments_depth') && comments_open()) {

			$reply_to = esc_html__("Reply to ", "consultab");
			$reply_to .= get_comment_author(); ?>

			<div class="reply consultab-reply consultab-button-style-2">
				<a rel="nofollow" class="comment-reply-link consultab-button consultab-button-link" href="<?php get_comment_author_link(); ?>?replytocom=<?php comment_ID(); ?>#respond" data-commentid="<?php comment_ID(); ?>" data-postid="<?php the_ID(); ?>" data-belowelement="div-comment-<?php comment_ID(); ?>" data-respondelement="respond" data-replyto="<?php echo esc_attr($reply_to); ?>" aria-label="<?php echo esc_attr($reply_to); ?>">
					<?php echo __('Reply', 'consultab'); ?>
				</a>
			</div>
<?php }
	}
}
