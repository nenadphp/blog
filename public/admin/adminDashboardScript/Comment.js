let Comment = {

    commentLike: function(e, id){
        let me = this;

        let like = $(e).hasClass('fa-thumbs-up');
        let unlike = $(e).hasClass('fa-thumbs-down');
        let token = $('input[name="_token"]').val();
        let comment_id = $('#comment_id_'+id).val();

        let is_like = '';

        if (like) {
            is_like = '1';
        } else if ( unlike ){
            is_like = '0';
        }
        $.ajax({
            url: "/comments/comment-like-unlike",

            data: {
                'comment_like': is_like,
                'comment_id': comment_id,
                '_token': token,
            },

            type: 'POST',
            success: function() {
                me.disableHrefs(id);
                me.updateCount(e, id, is_like);
            },

            error: function (request, status, error) {
                if(error === 'Unauthorized') {
                    alert('You need to be login');
                }
            }
        });

        return false;
    },

    disableHrefs: function (id) {
        let elements = $('#comment-like-unlike-'+id).find('a');

        $.each(elements,function (key, el) {
            $(el).css({pointerEvents: "none"});
        })
    },

    updateCount: function (e, id, is_like) {
        if (is_like === '1') {
            x = parseInt($('#comment-like-value-'+id).text()) + 1;
            $('#comment-like-value-'+id).text(x)
        } else if(is_like === '0'){
            x = parseInt($('#comment-unlike-value-'+id).text()) + 1;
            $('#comment-unlike-value-'+id).text(x)
        }
    },

    commentDelete: function (id) {
        $('#comment-list-' + id).slideUp(1000);
    }
};




