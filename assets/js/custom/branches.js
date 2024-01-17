$(document).ready(function () {
    pageUrl = base_url + 'branches';
    load_content();
});

function load_content() {
    $.ajax({
        url: `${pageUrl}/index_content`,
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

$(document).on('click', '.add_branch', function () {
    $('#gc .gc_title').html('Add Branch');
    $('#gc .gc_body').html(branch_form("add", {}, 'add_branch'));
    $('#gc').offcanvas('show');
});

$(document).on('click', '.view_branch', function () {
    get_branch($(this).data('id'))
        .done(res => {
            $('#gc .gc_title').html('Branch Details');
            $('#gc .gc_body').html(branch_form("view", res.data, 'view_branch'));
            $('#gc').offcanvas('show');
        });
});

$(document).on('click', '.edit_branch', function () {
    get_branch($(this).data('id'))
        .done(res => {
            $('#gc .gc_title').html('Edit Branch');
            $('#gc .gc_body').html(branch_form("edit", res.data, 'update_branch'));
            $('#gc').offcanvas('show');
        });
});

$(document).on('submit', '#add_branch', function (e) {
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
                    $(`input[name="${key}"], textarea[name="${key}"]`).after(`<small class="err_msg text-danger">${msg}</small>`);
                })
            }
        },
        error: res => { },
    });
});
$(document).on('submit', '#update_branch', function (e) {
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
                    $(`input[name="${key}"], textarea[name="${key}"]`).after(`<small class="err_msg text-danger">${msg}</small>`);
                })
            }
        },
        error: res => { },
    });
});

$(document).on('click', '.delete_branch', function () {
    if (confirm('Are you Sure you Want to delete this Branch')) {
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

function get_branch(id) {
    return $.ajax({
        url: `${pageUrl}/get`,
        dataType: 'json',
        method: 'GET',
        data: {
            'id': id
        }
    });
}

function branch_form(status = 'view', data, id) {
    return `<form id="${id}">
            <input type="hidden" name="id" value="${status == 'edit' ? data.id : ""}">
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="${status == 'edit' || status == "view" ? data.name : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Phone</label>
                <input type="number" class="form-control" name="phone" value="${status == 'edit' || status == "view" ? data.phone : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="${status == 'edit' || status == "view" ? data.email : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Landline 1</label>
                <input type="text" class="form-control" name="landline_1" value="${status == 'edit' || status == "view" ? data.landline_1 : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Landline 2</label>
                <input type="text" class="form-control" name="landline_2" value="${status == 'edit' || status == "view" ? data.landline_2 : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Landline 3</label>
                <input type="text" class="form-control" name="landline_3" value="${status == 'edit' || status == "view" ? data.landline_3 : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address"  id="" rows="3" ${status == "view" ? "disabled" : ""} >${status == 'edit' || status == "view" ? data.address : ""}</textarea>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="desc"  id="" rows="3" ${status == "view" ? "disabled" : ""} >${status == 'edit' || status == "view" ? data.description : ""}</textarea>
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