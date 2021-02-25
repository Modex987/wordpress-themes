<form role="search" action="<?php esc_url(home_url()); ?>" method="get">

    <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="Search..." />
    <input type="submit" value="Search">

</form>