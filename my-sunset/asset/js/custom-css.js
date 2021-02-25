var editor = ace.edit("customCss");

editor.setTheme("ace/theme/monokai");

editor.session.setMode("ace/mode/css");

jQuery(document).ready(function ($) {
    $("#custom-css-form").submit(function (e) {
        $("#custom_css").val(editor.getSession().getValue());

        // e.preventDefault();
    });
});
