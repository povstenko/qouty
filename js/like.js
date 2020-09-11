$(document).ready(function(){
    // when the user clicks on like
    $('.like').on('click', function(){
        var postid = $(this).data('id');
            $post = $(this);

        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'liked': 1,
                'postid': postid
            },
            success: function(response){
                $post.css("display", "none");
                $post.siblings().css("display", "inline");
                $post.find('span.likes_count').text(response);
                $post.siblings().find('span.likes_count').text(response);
            }
        });
    });

    // when the user clicks on unlike
    $('.unlike').on('click', function(){
        var postid = $(this).data('id');
        $post = $(this);

        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'unliked': 1,
                'postid': postid
            },
            success: function(response){
                $post.css("display", "none");
                $post.siblings().css("display", "inline");
                $post.find('span.likes_count').text(response);
                $post.siblings().find('span.likes_count').text(response);
            }
        });
    });
});