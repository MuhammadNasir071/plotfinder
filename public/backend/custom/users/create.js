api['updateUser'] = ajax_path + '/admin/user_update/:id';
var update_user_btn = $('#update_user_btn');

// Update User
$('body').on('submit', '#update_user_form', function(e){
    e.preventDefault();
    var _this = $(this);
    var data = new FormData();

    data.append('status', $('#status').val());
    data.append('_method', 'put');

    button_status(update_user_btn, true, 'Updating');
    let update_id = _this.data('id');
    let url = api["updateUser"];
    url = url.replace(":id", update_id);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: url,
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(update_user_btn, false);
                    window.location.replace('/admin/users');
                }, 1500);
            }
            else {
                button_status(update_user_btn, false);
                toastr.error('There are something went wrong');
            }
        },
        error: function (errors) {

            $('.validation_message').remove();

            if (errors.status == 422) {
                $('#success_message').fadeIn().html(errors.responseJSON.message);
                $.each(errors.responseJSON.errors, function (input_name, error) {

                    var element = $(document).find('[name="' + input_name + '"]');
                    element.after($('<div class="validation_message" ><span style="color: red;">' + error[0] + '</span></div>'));
                });
            }
            setTimeout(function () {      // button reset
                button_status(update_user_btn, false);
            }, 1000);
        }
    });
});



var loadFile = function (event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('imagePreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};
