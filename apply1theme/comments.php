<hr>

<?php if(!have_comments()): ?>
    <h4>Leave a comment</h3>
<?php else: ?>
    <h4><?= comments_number() ?></h4>
<?php endif; ?>


<ul class="comment-list comments">
    <?php
        wp_list_comments( array(
            'avatar_size' => 40,
            'style'      => 'ul',
            'short_ping' => true,
            // 'callback' => 'better_comments'
        ) );
     ?>
</ul><!-- .comment-list -->

<?php
    if(comments_open() || get_comments_number()){

        comment_form(array(
            'title_reply' => 'leave a comment',
            'label_submit' => 'Post A Comment',
            'title_reply_before' => '<h5 id="reply-title" class="comment-reply-title">',
            'title_reply_after' => '</h5>',
        ));

    }
?>


