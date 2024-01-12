<!-- Users List Table -->
<div class="card">
    <div class="card-header border-bottom">
        <h5 class="card-title"></h5>
        <table class="table">
            <thead>
                <tr>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>User Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user->first_name ?? 'Null' ?></td>
                        <td><?= $user->last_name ?? 'Null' ?></td>
                        <td><?= $user->username ?? 'Null' ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->phone ?></td>
                        <td><?= $user->is_active ? "Active" : "InActive" ?></td>
                        <td>
                            <a data-id="<?= $user->id ?>" title="View Details" href="javascript:void(0)" class=" view_user badge bg-label-primary"><span class="bx bx-detail"></span></a>
                            <a data-id="<?= $user->id ?>" title="Edit User" href="javascript:void(0)" class=" edit_user badge bg-label-info"><span class="bx bxs-pencil"></span></a>
                            <a data-id="<?= $user->id ?>" title="Delete User" href="javascript:void(0)" class=" delete_user badge bg-label-danger"><span class="bx bxs-trash-alt"></span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).on('click', '.view_user', function() {
        let id = $(this).data('id');
        get_user(id)
            .done(res => {
                $('#gc .gc_title').html('User Details');
                $('#gc .gc_body').html(user_form(true, res.data, 'view_form'));
                $('#gc').offcanvas('show');
            });
    });

    $(document).on('click', '.edit_user', function() {
        let id = $(this).data('id');
        get_user(id)
            .done(res => {
                $('#gc .gc_title').html('Edit User');
                $('#gc .gc_body').html(user_form(true, res.data, 'view_form'));
                $('#gc').offcanvas('show');
            });


    });
    $(document).on('click', '.delete_user', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `${base_url}/users/delete`,
            dataType: 'json',
            method: 'GET',
            data: {},
            success: res => {},
            error: res => {}
        });
    });

    function get_user(id) {
        return $.ajax({
            url: `${base_url}/users/get`,
            dataType: 'json',
            method: 'GET',
            data: {
                'id': id
            }
        });
    }

    function user_form(edit = false, data, id) {
        return `<form id="${id}">
                    <input type="hidden" name="id" value="${edit ? data.id : "" }" >
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="${edit ? data.first_name : "" }" ${!edit ? "disabled" : "" }  >
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="${edit ? data.last_name : "" }" ${!edit ? "disabled" : "" } >
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="${edit ? data.username : "" }" ${!edit ? "disabled" : "" } >
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="${edit ? data.email : "" }" ${!edit ? "disabled" : "" } >
                    </div>
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" value="${edit ? data.phone : "" }" ${!edit ? "disabled" : "" } >
                    </div>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" >Submit</button>
                </form>`;
    }
</script>