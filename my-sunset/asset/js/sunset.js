jQuery(document).ready(function ($) {
    $(document).on("click", ".loader-btn", function () {
        const formData = new FormData();

        formData.append("action", loader.action);
        // formData.append("_loader_nonce", loader.nonce);

        fetch(loader.ajax_url, {
            method: "POST",
            body: formData,
        })
            .then((resp) => {
                console.log(resp);
            })
            .catch((resp) => {
                console.log(resp);
            });
    });
});
