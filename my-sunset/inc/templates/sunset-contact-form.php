<h1>Contact Form</h1>


<br>
<br>

<?php settings_errors(); ?>


<form action="options.php" method="POST">

<?php settings_fields("contact-options"); ?>

<?php do_settings_sections('contact_options_page'); ?>

<?php submit_button(); ?>

</form>