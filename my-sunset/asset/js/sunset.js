function isVisible(element) {
    const rect = element.getBoundingClientRect();

    const per = window.innerHeight * 0.1;

    return window.innerHeight - rect.top > per && rect.bottom > per;

    // return rect.top >= 0 && rect.left >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && rect.right <= (window.innerWidth || document.documentElement.clientWidth);
}

jQuery(document).ready(function ($) {
    $(document).on("click", ".loader-btn", function () {
        const page = $(".loader-btn").data("page");

        if (page > helper_js.pages_count) return;

        const formData = new FormData();

        formData.append("action", "load_more_action");
        formData.append("_nonce", helper_js.nonce);
        formData.append("page", page);

        fetch(helper_js.posts_load_url, {
            method: "POST",
            body: formData,
        })
            .then((resp) => {
                return resp.text();
            })
            .then((text) => {
                $("#posts-container").append(text);

                $(".loader-btn").data("page", page + 1);
            })
            .catch((resp) => {
                console.log(resp);
            });
    });

    // scroll
    var last_scroll = 0;

    window.onscroll = function () {
        // console.log(document.querySelector("nav").getBoundingClientRect());

        var scroll = window.scrollY;
        if (Math.abs(scroll - last_scroll) > window.innerHeight * 0.1) {
            last_scroll = scroll;
            document.querySelectorAll(".page-limit").forEach((elm) => {
                if (isVisible(elm)) {
                    history.replaceState(null, null, elm.getAttribute("data-page"));
                    return false;
                }
            });
        }
    };

    $('[data-toggle="tooltip"]').tooltip();

    $(function () {
        $('[data-toggle="popover"]').popover();
    });

    $("a.js-toggle-sidebar").on("click", function () {
        $(".sunset-sidebar").toggleClass("hidden");
        $(".sidebar-overlay").toggleClass("hidden");
    });

    // contact form
    $("#sunset_contact_form").on("submit", function (e) {
        e.preventDefault();

        // let url = $(this).data("url");

        let name = $(this).find("#name").val();
        let email = $(this).find("#email").val();
        let message = $(this).find("#message").val();

        let formData = new FormData();
        formData.append("name", name);
        formData.append("email", email);
        formData.append("message", message);
        formData.append("_nonce", helper_js.nonce);
        formData.append("action", "contact_us_action");

        fetch(helper_js.contact_us_url, {
            method: "POST",
            body: formData,
        })
            .then((resp) => {
                return resp.text();
            })
            .then((text) => {
                console.log(text);
                if (text == "yes") {
                    $(this).find("#alert-feed").text("Message sent with success");

                    $(this).find("#alert-feed").addClass("alert-success");
                    $(this).find("button").addClass("hidden");
                    $(this).find("#alert-feed").removeClass("hidden");
                } else if (text == "no") {
                    $(this).find("#alert-feed").text("Something went wrong");

                    $(this).find("#alert-feed").addClass("alert-danger");
                    $(this).find("#alert-feed").removeClass("hidden");
                }
            })
            .catch((resp) => {
                $(this).find("#alert-feed").text("Something went wrong");

                $(this).find("#alert-feed").addClass("alert-danger");
                $(this).find("#alert-feed").removeClass("hidden");
            })
            .then(() => {
                setTimeout(() => {
                    $(this).find("#alert-feed").addClass("hidden");
                }, 3000);
            });
    });
});
