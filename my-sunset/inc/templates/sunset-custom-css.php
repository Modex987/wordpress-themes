<h1>Edit Theme Css</h1>

<br>
<br>
<?php settings_errors(); ?>

<form id="custom-css-form" action="options.php" method="POST" class="">
    <?php settings_fields('custom-css-options'); ?>

    <?php do_settings_sections('edit_css'); ?>

    <?php submit_button(); ?>
</form>