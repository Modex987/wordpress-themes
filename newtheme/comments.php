<div class="comments-wrapper">

<div class="comments" id="comments">

    <div class="comments-header">

        <h2 class="comment-reply-title">

            <?php if(!have_comments()): ?>
                <h4>Leave a comment</h3>
            <?php else: ?>
                <h4><?= comments_number() ?></h4>
            <?php endif; ?>

        </h2><!-- .comments-title -->

    </div><!-- .comments-header -->

    <div class="comments-inner">

        <?php wp_list_comments(array(
            'avatar_size' => 40,
            'style' => 'div',
        )) ?>

    </div><!-- .comments-inner -->

</div><!-- comments -->

<?php if(comments_open()): ?>

    <?php comment_form(array(
        'class_form' => '',
        'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
        'title_reply_after' => '</h4>'
    )); ?>

<?php endif; ?>

</div>