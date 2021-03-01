<?php

/**
 * 
 * @package sunset_theme
 * =================
 *   CONTENT PART
 * =================
 */

?>

<artical id="post-<?php the_ID(); ?>" <?php post_class('sunset-format-quote'); ?> >

    <header class="entry-header text-center">

        <h1 class="quote-content"><?php the_content(); ?></h1>

        <?php the_title('<h2 class="entry-title" >', '</h2>'); ?>

    </header>

    <footer class="entry-footer">

        <?php require(get_template_directory() . '/template-parts/posts/post-footer.php'); ?>

    </footer>

</artical>