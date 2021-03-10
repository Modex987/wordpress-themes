<h1>Contact Form</h1>


<br>
<?php settings_errors(); ?>
<br>

<p>Use this <strong>shortcode</strong> to activate the Contact Form inside a Page or a Post <code>[contact_form]</code></p>

<br>

<form action="options.php" method="POST">

<?php settings_fields("contact-options"); ?>

<?php do_settings_sections('contact_options_page'); ?>

<?php submit_button(); ?>

</form>