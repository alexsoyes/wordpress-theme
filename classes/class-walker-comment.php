<?php

/**
 * Comment API: Walker_Comment class
 *
 * @package WordPress
 * @subpackage Comments
 * @since 4.4.0
 */

/**
 * Core walker class used to create an HTML list of comments.
 *
 * @since 2.7.0
 *
 * @see Walker
 */
class Soyes_Walker_Comment extends Walker
{
    /**
     * What the class handles.
     *
     * @since 2.7.0
     * @var string
     *
     * @see Walker::$tree_type
     */
    public $tree_type = 'comment';

    /**
     * Database fields to use.
     *
     * @since 2.7.0
     * @var array
     *
     * @see Walker::$db_fields
     */
    public $db_fields = array(
        'parent' => 'comment_parent',
        'id' => 'comment_ID',
    );

    /**
     * Starts the list before the elements are added.
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int $depth Optional. Depth of the current comment. Default 0.
     * @param array $args Optional. Uses 'style' argument for type of HTML list. Default empty array.
     *
     * @since 2.7.0
     *
     * @see Walker::start_lvl()
     * @global int $comment_depth
     *
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth + 1;

        switch ($args['style']) {
            case 'div':
                break;
            case 'ol':
                $output .= '<ol class="children">' . "\n";
                break;
            case 'ul':
            default:
                $output .= '<ul class="children">' . "\n";
                break;
        }
    }

    /**
     * Ends the list of items after the elements are added.
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int $depth Optional. Depth of the current comment. Default 0.
     * @param array $args Optional. Will only append content if style argument value is 'ol' or 'ul'.
     *                       Default empty array.
     *
     * @since 2.7.0
     *
     * @see Walker::end_lvl()
     * @global int $comment_depth
     *
     */
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth + 1;

        switch ($args['style']) {
            case 'div':
                break;
            case 'ol':
                $output .= "</ol><!-- .children -->\n";
                break;
            case 'ul':
            default:
                $output .= "</ul><!-- .children -->\n";
                break;
        }
    }

    /**
     * Traverses elements to create list from elements.
     *
     * This function is designed to enhance Walker::display_element() to
     * display children of higher nesting levels than selected inline on
     * the highest depth level displayed. This prevents them being orphaned
     * at the end of the comment list.
     *
     * Example: max_depth = 2, with 5 levels of nested content.
     *     1
     *      1.1
     *        1.1.1
     *        1.1.1.1
     *        1.1.1.1.1
     *        1.1.2
     *        1.1.2.1
     *     2
     *      2.2
     *
     * @param WP_Comment $element Comment data object.
     * @param array $children_elements List of elements to continue traversing. Passed by reference.
     * @param int $max_depth Max depth to traverse.
     * @param int $depth Depth of the current element.
     * @param array $args An array of arguments.
     * @param string $output Used to append additional content. Passed by reference.
     *
     * @since 2.7.0
     *
     * @see Walker::display_element()
     * @see wp_list_comments()
     *
     */
    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
    {
        if (!$element) {
            return;
        }

        $id_field = $this->db_fields['id'];
        $id = $element->$id_field;

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);

        /*
         * If at the max depth, and the current element still has children, loop over those
         * and display them at this level. This is to prevent them being orphaned to the end
         * of the list.
         */
        if ($max_depth <= $depth + 1 && isset($children_elements[$id])) {
            foreach ($children_elements[$id] as $child) {
                $this->display_element($child, $children_elements, $max_depth, $depth, $args, $output);
            }

            unset($children_elements[$id]);
        }
    }

    /**
     * Starts the element output.
     *
     * @param string $output Used to append additional content. Passed by reference.
     * @param WP_Comment $comment Comment data object.
     * @param int $depth Optional. Depth of the current comment in reference to parents. Default 0.
     * @param array $args Optional. An array of arguments. Default empty array.
     * @param int $id Optional. ID of the current comment. Default 0 (unused).
     *
     * @since 2.7.0
     *
     * @see Walker::start_el()
     * @see wp_list_comments()
     * @global int $comment_depth
     * @global WP_Comment $comment Global comment object.
     *
     */
    public function start_el(&$output, $comment, $depth = 0, $args = array(), $id = 0)
    {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;

        if (!empty($args['callback'])) {
            ob_start();
            call_user_func($args['callback'], $comment, $args, $depth);
            $output .= ob_get_clean();

            return;
        }

        if ('comment' === $comment->comment_type) {
            add_filter('comment_text', array($this, 'filter_comment_text'), 40, 2);
        }

        if (('pingback' === $comment->comment_type || 'trackback' === $comment->comment_type) && $args['short_ping']) {
            ob_start();
            $this->ping($comment, $depth, $args);
            $output .= ob_get_clean();
        } elseif ('html5' === $args['format']) {
            ob_start();
            $this->html5_comment($comment, $depth, $args);
            $output .= ob_get_clean();
        } else {
            ob_start();
            $this->comment($comment, $depth, $args);
            $output .= ob_get_clean();
        }

        if ('comment' === $comment->comment_type) {
            remove_filter('comment_text', array($this, 'filter_comment_text'), 40, 2);
        }
    }

    /**
     * Outputs a pingback comment.
     *
     * @param WP_Comment $comment The comment object.
     * @param int $depth Depth of the current comment.
     * @param array $args An array of arguments.
     *
     * @see wp_list_comments()
     *
     * @since 3.6.0
     *
     */
    protected function ping($comment, $depth, $args)
    {
        $tag = ('div' === $args['style']) ? 'div' : 'li'; ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class('', $comment); ?>>
        <div class="comment-body">
            <?php _e('Pingback:'); ?><?php comment_author_link($comment); ?><?php edit_comment_link(__('Edit'), '<span class="edit-link">', '</span>'); ?>
        </div>
        <?php
    }

    /**
     * Outputs a comment in the HTML5 format.
     *
     * @param WP_Comment $comment Comment to display.
     * @param int $depth Depth of the current comment.
     * @param array $args An array of arguments.
     *
     * @see wp_list_comments()
     *
     * @since 3.6.0
     *
     */
    protected function html5_comment($comment, $depth, $args)
    {
        $tag = ('div' === $args['style']) ? 'div' : 'li';

        $commenter = wp_get_current_commenter();
        $show_pending_links = !empty($commenter['comment_author']);

        if ($commenter['comment_author_email']) {
            $moderation_note = __('Your comment is awaiting moderation.');
        } else {
            $moderation_note = __('Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.');
        } ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent' : '', $comment); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard wp-block-columns are-vertically-aligned-center">
                    <?php
                    if (0 != $args['avatar_size']) {
                        echo get_avatar($comment, $args['avatar_size']);
                    }

                    $comment_author = get_comment_author(get_comment($comment));

                    if ('0' == $comment->comment_approved && !$show_pending_links) {
                        $comment_author = get_comment_author($comment);
                    } ?>

                    <div class="comment-metadata">
                        <?php printf('<span class="fn">%s</span>', $comment_author); ?>

                        <time datetime="<?php comment_time('c'); ?>">
                            <?php
                            /* translators: 1: Comment date, 2: Comment time. */
                            printf(__('%1$s at %2$s'), get_comment_date('', $comment), get_comment_time()); ?>
                        </time>
                    </div><!-- .comment-metadata -->
                </div><!-- .comment-author -->

                <?php if ('0' == $comment->comment_approved) : ?>
                    <em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
                <?php endif; ?>
            </footer><!-- .comment-meta -->

            <div class="comment-content">
                <?php comment_text(); ?>

                <div class="comment-actions">
                    <a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>"
                       class="comment-link">
                        <?php esc_html_e('Comment link #', 'soyes'); ?>
                    </a>
                    <?php
                    if ('1' == $comment->comment_approved || $show_pending_links) {
                        comment_reply_link(
                            array_merge(
                                $args,
                                array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<div class="reply">',
                                    'after' => '</div>',
                                    'reply_text' => __('Reply'),
                                )
                            )
                        );
                    } ?>
                </div><!-- .comment-actions -->
            </div><!-- .comment-content -->
        </article><!-- .comment-body -->
        <?php
    }

    /**
     * Outputs a single comment.
     *
     * @param WP_Comment $comment Comment to display.
     * @param int $depth Depth of the current comment.
     * @param array $args An array of arguments.
     *
     * @see wp_list_comments()
     *
     * @since 3.6.0
     *
     */
    protected function comment($comment, $depth, $args)
    {
        if ('div' === $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }

        $commenter = wp_get_current_commenter();
        $show_pending_links = isset($commenter['comment_author']) && $commenter['comment_author'];

        if ($commenter['comment_author_email']) {
            $moderation_note = __('Your comment is awaiting moderation.');
        } else {
            $moderation_note = __('Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.');
        } ?>
        <<?php echo $tag; ?><?php comment_class($this->has_children ? 'parent' : '', $comment); ?> id="comment-<?php comment_ID(); ?>">
        <?php if ('div' !== $args['style']) : ?>
        <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
    <?php endif; ?>
        <div class="comment-author vcard">
            <?php
            if (0 != $args['avatar_size']) {
                echo get_avatar($comment, $args['avatar_size']);
            } ?>
            <?php
            $comment_author = get_comment_author_link($comment);

            if ('0' == $comment->comment_approved && !$show_pending_links) {
                $comment_author = get_comment_author($comment);
            }

            printf(
            /* translators: %s: Comment author link. */
                __('%s <span class="says">says:</span>'),
                sprintf('<cite class="fn">%s</cite>', $comment_author)
            ); ?>
        </div>
        <?php if ('0' == $comment->comment_approved) : ?>
        <em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
        <br/>
    <?php endif; ?>

        <div class="comment-meta commentmetadata"><a
                    href="<?php echo esc_url(get_comment_link($comment, $args)); ?>">
                <?php
                /* translators: 1: Comment date, 2: Comment time. */
                printf(__('%1$s at %2$s'), get_comment_date('', $comment), get_comment_time()); ?>
            </a>
            <?php
            edit_comment_link(__('(Edit)'), '&nbsp;&nbsp;', ''); ?>
        </div>

        <?php
        comment_text(
            $comment,
            array_merge(
                $args,
                array(
                    'add_below' => $add_below,
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                )
            )
        ); ?>

        <?php
        comment_reply_link(
            array_merge(
                $args,
                array(
                    'add_below' => $add_below,
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                    'before' => '<div class="reply">',
                    'after' => '</div>',
                )
            )
        ); ?>

        <?php if ('div' !== $args['style']) : ?>
        </div>
    <?php endif; ?>
        <?php
    }

    /**
     * Ends the element output, if needed.
     *
     * @param string $output Used to append additional content. Passed by reference.
     * @param WP_Comment $comment The current comment object. Default current comment.
     * @param int $depth Optional. Depth of the current comment. Default 0.
     * @param array $args Optional. An array of arguments. Default empty array.
     *
     * @see Walker::end_el()
     * @see wp_list_comments()
     *
     * @since 2.7.0
     *
     */
    public function end_el(&$output, $comment, $depth = 0, $args = array())
    {
        if (!empty($args['end-callback'])) {
            ob_start();
            call_user_func($args['end-callback'], $comment, $args, $depth);
            $output .= ob_get_clean();

            return;
        }
        if ('div' === $args['style']) {
            $output .= "</div><!-- #comment-## -->\n";
        } else {
            $output .= "</li><!-- #comment-## -->\n";
        }
    }

    /**
     * Filters the comment text.
     *
     * Removes links from the pending comment's text if the commenter did not consent
     * to the comment cookies.
     *
     * @param string $comment_text Text of the current comment.
     * @param WP_Comment|null $comment The comment object. Null if not found.
     *
     * @return string Filtered text of the current comment.
     * @since 5.4.2
     *
     */
    public function filter_comment_text($comment_text, $comment)
    {
        $commenter = wp_get_current_commenter();
        $show_pending_links = !empty($commenter['comment_author']);

        if ($comment && '0' == $comment->comment_approved && !$show_pending_links) {
            $comment_text = wp_kses($comment_text, array());
        }

        return $comment_text;
    }
}

/**
 * Open author link to a new window.
 */
function soyes_get_comment_author_link($return)
{

    $return = str_replace('ugc', 'ugc noreferrer', $return);
    $return = str_replace('<a', '<a target="_blank"', $return);

    return $return;
}

add_filter('get_comment_author_link', 'soyes_get_comment_author_link');

/**
 * Add default alt tag for Gravatar's images.
 *
 * @param $tag
 *
 * @return array|string|string[]
 */
function soyes_get_avatar_alt($tag)
{
    if (have_comments()) {
        $alt_attribute = get_comment_author();
    } else {
        $alt_attribute = get_the_author_meta('display_name');
    }

    return str_replace(
        'alt=\'\'',
        sprintf('alt=\'%s %s\'', __("Avatar from ", 'soyes'), $alt_attribute),
        $tag
    );
}

add_filter('get_avatar', 'soyes_get_avatar_alt');

/**
 * Do not display reply link for anonymous users (seo purpose).
 */
function soyes_filter_comment_reply_link(string $link): string
{
    return is_user_logged_in() ? $link : '';
}

add_filter('comment_reply_link', 'soyes_filter_comment_reply_link');
