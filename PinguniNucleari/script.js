

$(document).ready(function() {
    $("header nav ul li [href]").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("active");
        }
    });
});