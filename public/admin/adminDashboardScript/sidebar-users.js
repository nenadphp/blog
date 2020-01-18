$( document ).ready(function() {
    $('#search-users').on('keyup',function () {
        let term  = $('#search-users-term');
        if(term.val().length > 0){
            $.ajax({
                url: "search-users",
                data: {'term': term.val()},
                type: 'GET',
                success: function(res) {
                    renderFoundedUsers(res)
                }
            });
        }
    })


    function renderFoundedUsers(usersList) {
        let users_list = $('#users-list');
        users_list.empty();

        $.each(usersList,function (key, user) {
            users_list.append('<div class="col-md-12">' +
                '<div class="card p-4">' +
                '<div class="card-body d-flex justify-content-between align-items-center">' +
                '<div> ' +
                '<a href="" class="h4 d-block font-weight-normal mb-2"><i class="icon icon-people"></i> '+ user.name +' '+ user.last_name +'</span>' +
                '<span class="font-weight-light"></span> ' +
                '</div> <div class="h2 text-muted">' +
                '<button class="btn btn-rounded btn-danger">Block user</button>' +
                ' | <button class="btn btn-rounded btn-primary">Unblock</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>');
        })

    }

    $('.user-roles').on('change',function () {
        let role_id = $(this).attr("data_role_id");
        let user_id = $(this).attr("data_user_id");
        $(this).prop("disabled", true);
        let token = $('input[name="_token"]').val();
        var confirm_request = confirm("Are you sure, that you want to change role");


        let checked = $(this).is(":checked");
        $(this).attr("checked", checked);


        if(role_id && confirm_request) {
            let me = this;
            $.ajax({
                url: "/admin/user-profile-update-role",
                data: {'user_id': user_id, 'role_id': role_id, 'role': checked, '_token' : token},
                type: 'POST',
                success: function (res) {

                }
            });

            setTimeout(function () {
                $(me).prop("disabled", false)
            }, 3000);


        }
    })
});