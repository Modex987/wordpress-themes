function isVisible(element) {
    const rect = element.getBoundingClientRect();

    const per = window.innerHeight * 0.1;

    return window.innerHeight - rect.top > per && rect.bottom > per;

    // return rect.top >= 0 && rect.left >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && rect.right <= (window.innerWidth || document.documentElement.clientWidth);
}

jQuery(document).ready(function ($) {
    $(document).on("click", ".loader-btn", function () {
        const page = $(".loader-btn").data("page");

        if (page > loader.pages_count) return;

        const formData = new FormData();

        formData.append("action", loader.action);
        formData.append("_loader_nonce", loader.nonce);
        formData.append("page", page);

        fetch(loader.ajax_url, {
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
});
