<div id="comments" class="comments-area">
    <?php if(have_comments()): ?>

        <h2 class="comments-title">
            <?php
                printf(
                    esc_html(_nx(
                        'One comment on &ldquo;%2$s&rdquo;',
                        '%1$s comments on &ldquo;%2$s&rdquo;',
                        get_comments_number(),
                        'comments title',
                    )),
                    number_format_i18n(get_comments_number()),
                    '<span>' . get_the_title() . '</span>'
                );
            ?>
        </h2>

        <ol class="comments-list">
            <?php
                $args = array(
                    'walker'               => null,         # default
                    'max_depth'            => 0,
                    'style'                => 'ol',
                    'callback'             => null,
                    'end-callback'         => null,
                    'type'                 => 'all',        # comments, pings, all
                    'reply_text'           => 'Reply',
                    'page'                 => '',           # leave it empty so that the user customize it
                    'per_page'             => '',           # leave it empty so that the user customize it
                    'avatar_size'          => 32,
                    'reverse_top_level'    => null,
                    'reverse_children'     => false,
                    'format'               => 'html5',
                    'short_ping'           => false,
                    'echo'                 => true,
                );

                wp_list_comments();
            ?>
        </ol>

        <!-- comments navigation -->
        <?php if(get_comment_pages_count() > 1 && get_option('page_comments')): ?>
            <nav id="comment-nav-top" class="comments-nav" role="navifation">
                <h3><?php esc_html_e('Comment navigation', 'sunset_theme'); ?></h3>

                <div>
                    <?php previous_comments_link(esc_html__('Older Comments', 'sunset_theme')); ?>
                    <?php next_comments_link(esc_html__('Next Comments', 'sunset_theme')); ?>
                </div>
            </nav>
        <?php endif; ?>

        <?php if(!comments_open() && get_comments_number()): ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'sunsettheme'); ?></p>
        <?php endif; ?>
        
    <?php endif; ?>

    <hr>

    <div id="comments-form">
        <?php
            $fields = array(
                'author' => '<div class="form-group">
                                <label for="author">' . __('Name', 'sunset_theme') . '<span class="required"> *</span></label>
                                <input class="form-control" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" maxlength="245" required="required">
                            </div>',

                'email' => '<div class="form-group">
                                <label for="email">' . __('Email', 'sunset_theme') . '<span class="required"> *</span></label>
                                <input class="form-control" id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" maxlength="255" required="required">
                            </div>',
                
                'url' => '<div class="form-group">
                                <label for="url">' . __('Website', 'sunset_theme') . '</label>
                                <input class="form-control" id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '">
                            </div>',
                
                'cookies' => '<div class="form-group">
                                <input type="checkbox" id="comment_cookie" name="wp-comment-cookies-consent">
                                <label for="comment_cookie">' . __('Save my name, email, and website in this browser for the next time I comment.', 'sunset_theme') . '</label>
                            </div>',
                            
            );

            comment_form(array(
                'title_reply' => 'Leave a comment',
                'class_submit' => 'btn btn-primary btn-lg btn-block',
                'label_submit' => __('Submit Comment'),
                'comment_field' => '<div class="form-group">
                                        <label for="comment">' . _x('Comment', 'noun') . '</label>
                                        <textarea class="form-control" id="comment" name="comment" required="required" rows="4">
                                            ' . esc_attr($commenter['comment_author_url']) . '
                                        </textarea>
                                    </div>',
                'fields' => apply_filters('comment_form_default_fields', $fields),
            ));
        ?>
    </div>
</div>
