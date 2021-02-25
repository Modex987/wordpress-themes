<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" name="s" class="form-controll" placeholder="Search …" value="<?php echo get_search_query(); ?>">

    <input type="submit" value="Search">
</form>