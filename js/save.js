$(document).ready(function () {
    // when the user clicks on save
    $(".save").on("click", function () {
        var postid = $(this).data("id");
        $post = $(this);

        $.ajax({
            url: "index.php",
            type: "post",
            data: {
                saved: 1,
                postid: postid,
            },
            success: function (response) {
                $post.css("display", "none");
                $post.siblings().css("display", "inline");
            },
        });
    });

    // when the user clicks on unsave
    $(".unsave").on("click", function () {
        var postid = $(this).data("id");
        $post = $(this);

        $.ajax({
            url: "index.php",
            type: "post",
            data: {
                unsaved: 1,
                postid: postid,
            },
            success: function (response) {
                $post.css("display", "none");
                $post.siblings().css("display", "inline");
            },
        });
    });
});
