<form action="" method="post" class="mb-5" id="sunset_contact_form" data-url="<?= admin_url('admin-ajax.php'); ?>">

    <div id="alert-feed" class="alert hidden" role="alert"></div>

    <div class="form-group">
        <label for="name" class>Name</label>
        <input type="text" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email" class>E-mail</label>
        <input type="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="message" class>Message</label>
        <textarea id="message" rows="5" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>