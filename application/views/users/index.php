<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="mb-3">
            <h4>Users | <span class="text-muted">All</span></h4>
        </div>
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span>Session</span>
                                <div class="d-flex align-items-end mt-2">
                                    <h4 class="mb-0 me-2"><?= $total ?? 0 ?></h4>
                                    <small class="text-success">(+29%)</small>
                                </div>
                                <p class="mb-0">Total Users</p>
                            </div>
                            <div class="avatar">
                                <span class="avatar-initial rounded bg-label-primary">
                                    <i class="bx bx-user bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span>Active / In Active Users</span>
                                <div class="d-flex align-items-end mt-2">
                                    <h4 class="mb-0 me-2"><?= $active ?? 0 ?> / <?= $inActive ?? 0 ?></h4>
                                    <small class="text-success">(+18%)</small>
                                </div>
                                <p class="mb-0">Last week analytics </p>
                            </div>
                            <div class="avatar">
                                <span class="avatar-initial rounded bg-label-danger">
                                    <i class="bx bx-user-check bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span>Active Users</span>
                                <div class="d-flex align-items-end mt-2">
                                    <h4 class="mb-0 me-2"><?= $active ?? 0 ?></h4>
                                    <small class="text-danger">(-14%)</small>
                                </div>
                                <p class="mb-0">Last week analytics</p>
                            </div>
                            <div class="avatar">
                                <span class="avatar-initial rounded bg-label-success">
                                    <i class="bx bx-group bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span>Pending Users</span>
                                <div class="d-flex align-items-end mt-2">
                                    <h4 class="mb-0 me-2">237</h4>
                                    <small class="text-success">(+42%)</small>
                                </div>
                                <p class="mb-0">Last week analytics</p>
                            </div>
                            <div class="avatar">
                                <span class="avatar-initial rounded bg-label-warning">
                                    <i class="bx bx-user-voice bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table_section"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        get_users_table();
    });

    function get_users_table() {
        $.ajax({
            url: `${base_url}/users/users_table`,
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
</script>