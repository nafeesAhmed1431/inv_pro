<!-- Users List Table -->
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-lg-3 mb-4">
        <div class="card card-border-shadow-primary h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck"></i></span>
                    </div>
                    <h4 class="ms-1 mb-0"><?= $total ?? 0 ?></h4>
                </div>
                <p class="mb-1">Total</p>
                <p class="mb-0">
                    <span class="fw-medium me-1">+18.2%</span>
                    <small class="text-muted">than last week</small>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
        <div class="card card-border-shadow-warning h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-error"></i></span>
                    </div>
                    <h4 class="ms-1 mb-0"><?= $inActive ?? 0 ?></h4>
                </div>
                <p class="mb-1">Inactive</p>
                <p class="mb-0">
                    <span class="fw-medium me-1">-8.7%</span>
                    <small class="text-muted">than last week</small>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
        <div class="card card-border-shadow-danger h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-git-repo-forked"></i></span>
                    </div>
                    <h4 class="ms-1 mb-0"><?= $active ?? 0 ?></h4>
                </div>
                <p class="mb-1">Active</p>
                <p class="mb-0">
                    <span class="fw-medium me-1">+4.3%</span>
                    <small class="text-muted">than last week</small>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
        <div class="card card-border-shadow-info h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-info"><i class="bx bx-time-five"></i></span>
                    </div>
                    <h4 class="ms-1 mb-0">13</h4>
                </div>
                <p class="mb-1">Late vehicles</p>
                <p class="mb-0">
                    <span class="fw-medium me-1">-2.5%</span>
                    <small class="text-muted">than last week</small>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title"></h5>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Email</td>
                            <td>Balance</td>
                            <td>City</td>
                            <td>Address</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)) : ?>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $row->name ?? 'Null' ?></td>
                                    <td><?= $row->phone ?? 'Null' ?></td>
                                    <td><?= $row->email ?? 'Null' ?></td>
                                    <td><?= $row->opening_balance ?? 'Null' ?></td>
                                    <td><?= $row->city ?? 'Null' ?></td>
                                    <td><?= $row->address ?? 'Null' ?></td>
                                    <td>
                                        <a data-id="<?= $row->id ?>" title="View Details" href="javascript:void(0)" class="view_customer badge bg-label-primary"><span class="bx bx-detail"></span></a>
                                        <a data-id="<?= $row->id ?>" title="Edit" href="javascript:void(0)" class="edit_customer badge bg-label-info"><span class="bx bxs-pencil"></span></a>
                                        <a data-id="<?= $row->id ?>" title="Delete" href="javascript:void(0)" class="delete_customer badge bg-label-danger"><span class="bx bxs-trash-alt"></span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7" class="text-center text-danger">No Suppliers Found...</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>