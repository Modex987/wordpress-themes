jQuery(document).ready(function ($) {
    var mediaUploader;

    $("#upload-btn").on("click", function (e) {
        e.preventDefault();

        // open the media uploader if it's defined.
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        // define the media uploader if it's not already defined.
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: "Choose a profile picture",
            button: {
                text: "Choose a picture",
            },
            multiple: false,
        });

        // open the media uploader
        mediaUploader.on("select", function () {
            var attachement = mediaUploader.state().get("selection").first().toJSON();

            $("#profile-img-url").val(attachement.url);

            $("#profile_img").css("background-image", "url(" + attachement.url + ")");

            $("#savechanges").removeClass("hidden");

            $("#del-profile-btn").removeClass("hidden");
        });

        mediaUploader.open();
    });

    $("#del-profile-btn").on("click", function (e) {
        e.preventDefault();

        if (window.confirm("Do you want to remove profile picture")) {
            // Clear out the preview image
            $("#profile_img").css("background-image", "none");

            // Delete the image id from the hidden input
            $("#profile-img-url").val("");

            $("#savechanges").removeClass("hidden");
        }
    });
});
