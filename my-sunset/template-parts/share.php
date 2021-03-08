<?php if(is_single()): ?>

    <?php
        $message = 'Hey Read This: ' . get_the_title();
        $permal_link = get_the_permalink();
        $twitter_handler = get_option('twitter_username') ? esc_attr(get_option('twitter_username')) : '';
        
        $twitter = 'https://twitter.com/intent/tweet?text=' . $message . '&amp;url=' . $permal_link . '&amp;via=' . $twitter_handler;
        $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permal_link;
        $google = 'https://plus.google.com/share?u=' . $permal_link;
    ?>

    <div class="sunset-share">
        <h4>share</h4>
        <ul>
            <li><a href="<?= $twitter; ?>" target="_blank" rel="nofollow">twitter</a></li>
            <li><a href="<?= $facebook; ?>" target="_blank" rel="nofollow">facebook</a></li>
            <li><a href="<?= $google; ?>" target="_blank" rel="nofollow">google +</a></li>
        </ul>
    </div>

<?php endif; ?>