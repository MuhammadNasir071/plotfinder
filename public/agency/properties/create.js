api['agencyStoreProperty'] = ajax_path + '/agency/property/store';
api['agencyUpdateProperty'] = ajax_path + '/agency/property/update/:id';

var add_property_btn = $('#add_property_btn');
var update_property_btn = $('#update_property_btn');

// CREATE & EDIT PRODUCT TEXTAREA EDITOR
tinymce.init({
    selector: '#description',
    plugins: 'code table lists',
    toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    setup: function (editor) {
        editor.on('Change', function (e) {
            tinyMCE.triggerSave();
        });
    }
});


// ADD Property
$('body').on('submit', '#agency_add_property_form', function(e){
    e.preventDefault();
    var _this = $(this);
    var data = new FormData();
    var files = $('#upload-photo')[0].files;
    if (files.length > 0) {
        data.append('image', files[0]);
    }
    data.append('title', $('#title').val());
    data.append('status', $('#status').val());
    data.append('listed_in', $('#listed_in').val());
    data.append('category', $('#category').val());
    data.append('price', $('#price').val());
    data.append('country', $('#country').val());
    data.append('state', $('#state').val());
    data.append('city', $('#city').val());
    data.append('apartment', $('#apartment').val());
    data.append('address', $('#address').val());
    data.append('description', $('#description').val());
    data.append('size_square_meter', $('#size_square_meter').val());
    data.append('lot_size', $('#lot_size').val());
    data.append('rooms', $('#rooms').val());
    data.append('kitchen', $('#kitchen').val());
    data.append('bedrooms', $('#bedrooms').val());
    data.append('bathrooms', $('#bathrooms').val());
    data.append('build_date', $('#build_date').val());
    data.append('garages', $('#garages').val());
    data.append('garage_size', $('#garage_size').val());
    data.append('available_date', $('#available_date').val());
    data.append('basement', $('#basement').val());
    data.append('roofing', $('#roofing').val());
    data.append('external_construction', $('#external_construction').val());

    var balcony = 0;
    var garden = 0;
    var chair_accessible = 0;
    var doorman = 0;
    var elevator = 0;
    var front_yard = 0;

    if ($('#balcony').is(":checked")) {
        balcony = 1;
    }
    if ($('#garden').is(":checked")) {
        garden = 1;
    }
    if ($('#chair_accessible').is(":checked")) {
        chair_accessible = 1;
    }
    if ($('#doorman').is(":checked")) {
        doorman = 1;
    }
    if ($('#elevator').is(":checked")) {
        elevator = 1;
    }
    if ($('#front_yard').is(":checked")) {
        front_yard = 1;
    }
    data.append('balcony', balcony);
    data.append('garden', garden);
    data.append('chair_accessible', chair_accessible);
    data.append('doorman', doorman);
    data.append('elevator', elevator);
    data.append('front_yard', front_yard);

    data.append('_method', 'POST');
    button_status(add_property_btn, true, 'Creating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: api["agencyStoreProperty"],
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(add_property_btn, false);
                    window.location.replace('/agency/property');
                }, 1500);
            }
            else {
                button_status(add_property_btn, false);
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
                button_status(add_property_btn, false);
            }, 1000);
        }
    });
});


// Update Property
$('body').on('submit', '#update_property_form', function(e){
    e.preventDefault();
    var _this = $(this);
    var data = new FormData();
    var files = $('#upload-photo')[0].files;
    if (files.length > 0) {
        data.append('image', files[0]);
    }
    data.append('title', $('#title').val());
    data.append('status', $('#status').val());
    data.append('listed_in', $('#listed_in').val());
    data.append('category', $('#category').val());
    data.append('price', $('#price').val());
    data.append('country', $('#country').val());
    data.append('state', $('#state').val());
    data.append('city', $('#city').val());
    data.append('apartment', $('#apartment').val());
    data.append('address', $('#address').val());
    data.append('description', $('#description').val());
    data.append('size_square_meter', $('#size_square_meter').val());
    data.append('lot_size', $('#lot_size').val());
    data.append('rooms', $('#rooms').val());
    data.append('kitchen', $('#kitchen').val());
    data.append('bedrooms', $('#bedrooms').val());
    data.append('bathrooms', $('#bathrooms').val());
    data.append('build_date', $('#build_date').val());
    data.append('garages', $('#garages').val());
    data.append('garage_size', $('#garage_size').val());
    data.append('available_date', $('#available_date').val());
    data.append('basement', $('#basement').val());
    data.append('roofing', $('#roofing').val());
    data.append('external_construction', $('#external_construction').val());

    var balcony = 0;
    var garden = 0;
    var chair_accessible = 0;
    var doorman = 0;
    var elevator = 0;
    var front_yard = 0;

    if ($('#balcony').is(":checked")) {
        balcony = 1;
    }
    if ($('#garden').is(":checked")) {
        garden = 1;
    }
    if ($('#chair_accessible').is(":checked")) {
        chair_accessible = 1;
    }
    if ($('#doorman').is(":checked")) {
        doorman = 1;
    }
    if ($('#elevator').is(":checked")) {
        elevator = 1;
    }
    if ($('#front_yard').is(":checked")) {
        front_yard = 1;
    }
    data.append('balcony', balcony);
    data.append('garden', garden);
    data.append('chair_accessible', chair_accessible);
    data.append('doorman', doorman);
    data.append('elevator', elevator);
    data.append('front_yard', front_yard);
    data.append('_method', 'put');
    button_status(update_property_btn, true, 'Updating');
    let update_id = _this.data('id');
    let url = api["agencyUpdateProperty"];
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
                    button_status(update_property_btn, false);
                    window.location.replace('/agency/property');
                }, 1500);
            }
            else {
                button_status(update_property_btn, false);
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
                button_status(update_property_btn, false);
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
