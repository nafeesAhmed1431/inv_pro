let get_item = `get_${content}`;
let view = `view_${content}`;
let add = `add_${content}`;
let upd = `update_${content}`;
let edit = `edit_${content}`;
let del = `delete_${content}`;

$(document).ready(function () {
    pageUrl = `${base_url}suppliers`;
    load_content();
});

function load_content() {
    payload = "index_content";
    $.ajax({
        url: `${pageUrl}/${payload}`,
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

// --------------------------------------------------------------------------Misc Functions--------------------------------------------------------------------------

// Get Item
function get(id) {
    return $.ajax({
        url: `${pageUrl}/${get_item}`,
        dataType: 'json',
        method: 'GET',
        data: {
            'id': id
        }
    });
}

// On Click view
$(document).on('click', `.${view}`, function () {
    get($(this).data('id'))
        .done(res => {
            $('#gc .gc_title').html(view);
            $('#gc .gc_body').html(content_form("view", res.data, view));
            $('#gc').offcanvas('show');
        });
});

// On Click add
$(document).on('click', `.${add}`, function () {
    $('#gc .gc_title').html(add);
    $('#gc .gc_body').html(content_form("add", {}, add));
    $('#gc').offcanvas('show');
});

// On Click Edit
$(document).on('click', `.${edit}`, function () {
    get($(this).data('id'))
        .done(res => {
            $('#gc .gc_title').html(edit);
            $('#gc .gc_body').html(content_form("edit", res.data, upd));
            $('#gc').offcanvas('show');
        });
});

// Add
$(document).on('submit', `#${add}`, function (e) {
    e.preventDefault();
    $.ajax({
        url: `${pageUrl}/${add}`,
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

// Update
$(document).on('submit', `#${upd}`, function (e) {
    e.preventDefault();
    $.ajax({
        url: `${pageUrl}/${upd}`,
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

// Delete
$(document).on('click', `.${del}`, function () {
    if (confirm('Are you Sure you Want to delete?')) {
        $.ajax({
            url: `${pageUrl}/${del}`,
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

function content_form(status = "view", data, id) {
    switch (content) {
        case "supplier":
            return supplier_form(status, data, id);
            break;
    }
}

// Forms-------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function supplier_form(status, data, id) {
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
                <label class="form-label">Opening Balance</label>
                <input type="number" class="form-control" name="opening_balance" value="${status == 'edit' || status == "view" ? data.opening_balance : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">City</label>
                <input type="text" class="form-control" name="city" value="${status == 'edit' || status == "view" ? data.city : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">State</label>
                <input type="text" class="form-control" name="state" value="${status == 'edit' || status == "view" ? data.state : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Country</label>
                <input type="text" class="form-control" name="country" value="${status == 'edit' || status == "view" ? data.country : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="${status == 'edit' || status == "view" ? data.address : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="desc" value="${status == 'edit' || status == "view" ? data.desc : ""}" ${status == "view" ? "disabled" : ""}>
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