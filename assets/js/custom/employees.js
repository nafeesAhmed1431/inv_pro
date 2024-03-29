let keyword = 'employee';
$(document).ready(function () {
    pageUrl = base_url + 'employees';
    load_content();
});

function load_content() {
    $.ajax({
        url: `${pageUrl}/index_content`,
        dataType: 'json',
        method: 'GET',
        success: res => {
            $('.table_section').html(res.status ? res.html : `<h1>No Data Found!!!</h1>`);
        },
        error: res => {
            $('.table_section').html(`<h1>No Data Found!!!</h1>`);
        },
    });
}

$(document).on('click', `.add_${keyword}`, function () {
    $('#gc .gc_title').html(`Add ${keyword}`);
    $('#gc .gc_body').html(user_form("add", {}, `add_${keyword}`));
    $('#gc').offcanvas('show');
});

$(document).on('click', `.view_${keyword}`, function () {
    get($(this).data('id'))
        .done(res => {
            $('#gc .gc_title').html(`${keyword} Details`);
            $('#gc .gc_body').html(user_form("view", res.data, `view_${keyword}`));
            $('#gc').offcanvas('show');
        });
});

$(document).on('click', `.edit_${keyword}`, function () {
    get($(this).data('id'))
        .done(res => {
            $('#gc .gc_title').html('Edit User');
            $('#gc .gc_body').html(user_form("edit", res.data, `update_${keyword}`));
            $('#gc').offcanvas('show');
        });
});

$(document).on('submit', `#add_${keyword}`, function (e) {
    e.preventDefault();
    $.ajax({
        url: `${pageUrl}/add`,
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
$(document).on('submit', `#update_${keyword}`, function (e) {
    e.preventDefault();
    $.ajax({
        url: `${pageUrl}/update`,
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

$(document).on('click', `.delete_${keyword}`, function () {
    if (confirm(`Are you Sure you Want to delete this ${keyword}`)) {
        $.ajax({
            url: `${pageUrl}/delete`,
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

function get(id) {
    return $.ajax({
        url: `${pageUrl}/get`,
        dataType: 'json',
        method: 'GET',
        data: {
            'id': id
        }
    });
}


function user_form(status = 'view', data, id) {
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
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="${status == 'edit' || status == "view" ? data.username : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="${status == 'edit' || status == "view" ? data.email : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="${status == 'edit' || status == "view" ? data.phone : ""}" ${status == "view" ? "disabled" : ""}>
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

$(document).on('click', '.add_experience_row', function () {
    $('.experience').append(`
        <div class="row mb-3 align-items-center ">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Start Date</label>
                    <input type="date" name="start[]" class="form-control" placeholder="Start Date" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">End Date</label>
                    <input type="date" name="end[]" class="form-control" placeholder="End Date" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Job Title</label>
                    <input type="text" name="title[]" class="form-control" placeholder="Manager...." required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Company</label>
                    <input type="text" name="company[]" class="form-control" placeholder="INV Pro...." required>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label for=""></label>
                    <button  class="remove_experience_row btn btn-danger">&times</button>
                </div>
            </div>
        </div>`);
});

$(document).on('click', '.remove_experience_row', function () {
    $(this).closest('.row').remove();
});