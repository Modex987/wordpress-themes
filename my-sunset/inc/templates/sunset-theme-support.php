<h1>Sunset Theme Options</h1>

<?php settings_errors(); ?>

<form action="options.php" method="POST">

    <?php settings_fields("susnet-theme-support"); ?>

    <?php do_settings_sections('sunset-theme-settings'); ?>

    <?php submit_button(); ?>

</form>