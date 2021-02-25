<article class="col-3">
    <?php if(has_post_thumbnail()): ?>
        <div class="thumbnail">
            <?php the_post_thumbnail(array(150, 150)); ?>
        </div>
    <?php endif; ?>

    <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h1>') ?>

</article>