$(function () {
    $(".nav .nav-item").on("click", function (e) {
        e.preventDefault();
        var clss = $(this).data("class");
        $(this).addClass("active").siblings().removeClass("active");
        $("." + clss).show().siblings().hide();
    })
})