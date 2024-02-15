let get_item = `get_${content}`;
let view = `view_${content}`;
let add = `add_${content}`;
let upd = `update_${content}`;
let edit = `edit_${content}`;
let del = `delete_${content}`;

$(document).ready(function () {
    pageUrl = base_url + 'products';
    load_content();
});

function load_content() {
    payload = "index_content";
    switch (content) {
        case "product":
            payload = "index_content";
            break;
        case "category":
            payload = "category_content";
            break;
        case "brand":
            payload = "brand_content";
            break;
        case "unit":
            payload = "unit_content";
            break;
    }
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

function to_upper(str) {
    return str.replace(/_/g, ' ').replace(/\w\S*/g, function (txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}

// On Click view
$(document).on('click', `.${view}`, function () {
    get($(this).data('id'))
        .done(res => {
            $('#gc .gc_title').html(to_upper(view));
            $('#gc .gc_body').html(content_form("view", res.data, view));
            $('#gc').offcanvas('show');
        });
});

// On Click add
$(document).on('click', `.${add}`, function () {
    $('#gc .gc_title').html(to_upper(add));
    $('#gc .gc_body').html(content_form("add", {}, add));
    $('#gc').offcanvas('show');
});

// On Click Edit
$(document).on('click', `.${edit}`, function () {
    get($(this).data('id'))
        .done(res => {
            $('#gc .gc_title').html(to_upper(edit));
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
        case "product":
            return product_form(status, data, id);
            break;
        case "category":
            return category_form(status, data, id);
            break;
        case "brand":
            return brand_form(status, data, id);
            break;
        case "unit":
            return unit_form(status, data, id);
            break;

    }
}

// Forms-------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function product_form(status, data, id) {


    return `<form id="${id}">
            <input type="hidden" name="id" value="${status == 'edit' ? data.id : ""}">
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="${status == 'edit' || status == " view" ? data.name : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Code</label>
                <input type="text" class="form-control" name="code" value="${status == 'edit' || status == " view" ? data.code : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Cost</label>
                <input type="text" class="form-control" name="cost" value="${status == 'edit' || status == " view" ? data.cost : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price" value="${status == 'edit' || status == " view" ? data.price : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Details</label>
                <input type="text" class="form-control" name="details" value="${status == 'edit' || status == " view" ? data.details : ""}" ${status == "view" ? "disabled" : ""}>
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
function category_form(status, data, id) {
    return `<form id="${id}">
            <input type="hidden" name="id" value="${status == 'edit' ? data.id : ""}">
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control" name="name" value="${status == 'edit' || status == " view" ? data.name : ""}" ${status == "view" ? "disabled" : ""}>
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

function unit_form(status, data, id) {
    return `<form id="${id}">
            <input type="hidden" name="id" value="${status == 'edit' ? data.id : ""}">
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control" name="name" value="${status == 'edit' || status == " view" ? data.name : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Symbol</label>
                <input type="text" class="form-control" name="symbol" value="${status == 'edit' || status == " view" ? data.symbol : ""}" ${status == "view" ? "disabled" : ""}>
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

function brand_form(status, data, id) {
    return `<form id="${id}">
            <input type="hidden" name="id" value="${status == 'edit' ? data.id : ""}">
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Brand Name</label>
                <input type="text" class="form-control" name="name" value="${status == 'edit' || status == " view" ? data.name : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="${status == 'edit' || status == " view" ? data.email : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Mobile</label>
                <input type="number" class="form-control" name="mobile" value="${status == 'edit' || status == " view" ? data.mobile : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Phone</label>
                <input type="number" class="form-control" name="phone" value="${status == 'edit' || status == " view" ? data.phone : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">LandLine 1</label>
                <input type="number" class="form-control" name="landline_1" value="${status == 'edit' || status == " view" ? data.landline_1 : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">LandLine 2</label>
                <input type="number" class="form-control" name="landline_2" value="${status == 'edit' || status == " view" ? data.landline_2 : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">LandLine 3</label>
                <input type="number" class="form-control" name="landline_3" value="${status == 'edit' || status == " view" ? data.landline_3 : ""}" ${status == "view" ? "disabled" : ""}>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="${status == 'edit' || status == " view" ? data.address : ""}" ${status == "view" ? "disabled" : ""}>
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