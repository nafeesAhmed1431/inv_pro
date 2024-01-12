$(document).ready(function () {
    drivers = base_url + 'drivers';
    load_content();
});

function load_content() {
    $.ajax({
        url: `${drivers}/index_content`,
        dataType: 'json',
        method: 'GET',
        success: res => {
            $('.content').html(res.status ? res.html : `<h1>No Data Found!!!</h1>`);
        },
        error: res => {
            $('.content').html(`<h1>No Data Found!!!</h1>`);
        },
    });
}

$(document).on('click', '.add_driver', function () {
    $('#gc .gc_title').html('Add User');
    $('#gc .gc_body').html(driver_form("add", {}, 'add_driver'));
    $('#gc').offcanvas('show');
});

$(document).on('click', '.view_driver', function () {
    get_driver($(this).data('id'))
        .done(res => {
            $('#gc .gc_title').html('User Details');
            $('#gc .gc_body').html(driver_form("view", res.data, 'view_driver'));
            $('#gc').offcanvas('show');
        });
});

$(document).on('click', '.edit_driver', function () {
    get_driver($(this).data('id'))
        .done(res => {
            $('#gc .gc_title').html('Edit User');
            $('#gc .gc_body').html(driver_form("edit", res.data, 'update_driver'));
            $('#gc').offcanvas('show');
        });
});

$(document).on('submit', '#add_driver', function (e) {
    e.preventDefault();
    $.ajax({
        url: `${drivers}/add`,
        method: 'POST',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: new FormData(this),
        success: res => {
            $('.err_msg').remove();
            if (res.status) {
                $('#gc').offcanvas('hide');
                load_content();
            } else {
                $.each(res.errors, (key, msg) => {
                    $(`input[name="${key}"]`).after(`<small class="err_msg text-danger">${msg}</small>`);
                })
            }
        },
        error: res => { },
    });
});
$(document).on('submit', '#update_driver', function (e) {
    e.preventDefault();
    $.ajax({
        url: `${drivers}/update`,
        method: 'POST',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: new FormData(this),
        success: res => {
            $('.err_msg').remove();
            if (res.status) {
                $('#gc').offcanvas('hide');
                load_content();
            } else {
                $.each(res.errors, (key, msg) => {
                    $(`input[name="${key}"]`).after(`<small class="err_msg text-danger">${msg}</small>`);
                })
            }
        },
        error: res => { },
    });
});

$(document).on('click', '.delete_driver', function () {
    if (confirm('Are you Sure you Want to delete this Driver')) {
        $.ajax({
            url: `${drivers}/delete`,
            dataType: 'json',
            method: 'POST',
            data: {
                id: $(this).data('id')
            },
            success: res => {
                if (res.status) {
                    load_content();
                }
            },
            error: res => { }
        });
    }
});

function get_driver(id) {
    return $.ajax({
        url: `${drivers}/get`,
        dataType: 'json',
        method: 'GET',
        data: {
            'id': id
        }
    });
}

function driver_form(status = 'view', data, id) {
    return `<form id="${id}">
            <input type="hidden" name="id" value="${status == 'edit' ? data.id : ""}">
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" value="${status == 'edit' || status == "view" ? data.first_name : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="${status == 'edit' || status == "view" ? data.last_name : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">CNIC</label>
                <input type="number" class="form-control" name="cnic" value="${status == 'edit' || status == "view" ? data.cnic : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="${status == 'edit' || status == "view" ? data.email : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Vehicle No</label>
                <input type="text" class="form-control" name="vehicle_no" value="${status == 'edit' || status == "view" ? data.vehicle_no : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Phone 1</label>
                <input type="text" class="form-control" name="phone_1" value="${status == 'edit' || status == "view" ? data.phone_1 : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Phone 2</label>
                <input type="text" class="form-control" name="phone_2" value="${status == 'edit' || status == "view" ? data.phone_2 : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Phone 3</label>
                <input type="text" class="form-control" name="phone_3" value="${status == 'edit' || status == "view" ? data.phone_3 : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="status" value="1" ${data.is_active == 1 ? "checked" : ""} id="active">
                    <label class="btn btn-outline-info" for="active">Active</label>
                    <input type="radio" class="btn-check" name="status" value="0" ${data.is_active == 0 ? "checked" : ""} id="inactive">
                    <label class="btn btn-outline-danger" for="inactive">Inactive</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
        </form>`;
}