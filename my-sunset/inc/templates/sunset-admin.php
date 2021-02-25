<h1>Sunset Sidebar Options</h1>

<?php settings_errors(); ?>

<?php
    $profile_url = get_option('profile_img') ? get_option('profile_img') : get_theme_file_uri('asset/img/profile.jpg') ;
?>

<div id="main">

    <div class="sidebar-preview">
        <div class="sidebar">
            <div>
                <div id="profile_img" style="background-image: url(<?= $profile_url ?>);"></div>
            </div>
            <h2 class="fullname"><?= get_option('first_name') . ' ' . get_option('last_name'); ?></h2>
            <p class="description"><?= get_option('user_description'); ?></p>
        </div>
    </div>


    <form action="options.php" method="POST">

        <?php settings_fields("sunset-settings-group"); ?>

        <?php do_settings_sections('sunset_options'); ?>

        <?php submit_button(); ?>

    </form>
</div>