jQuery(document).ready(function ($) {
    $(document).on("click", ".loader-btn", function () {
        const page = $(".loader-btn").data("page");

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
});
