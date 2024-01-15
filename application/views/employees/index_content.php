<!-- Users List Table -->
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
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title"></h5>
                <table class="table">
                    <thead>
                        <tr>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)) : ?>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $row->first_name ?? 'Null' ?></td>
                                    <td><?= $row->last_name ?? 'Null' ?></td>
                                    <td><?= $row->is_active ? "Active" : "InActive" ?></td>
                                    <td>
                                        <a data-id="<?= $row->id ?>" title="View" href="javascript:void(0)" class=" view_<?= $keyword ?> badge bg-label-primary"><span class="bx bx-detail"></span></a>
                                        <a data-id="<?= $row->id ?>" title="Edit" href="javascript:void(0)" class=" edit_<?= $keyword ?> badge bg-label-info"><span class="bx bxs-pencil"></span></a>
                                        <a data-id="<?= $row->id ?>" title="Delete" href="javascript:void(0)" class=" delete_<?= $keyword ?> badge bg-label-danger"><span class="bx bxs-trash-alt"></span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7" class="text-center text-danger">No <?= ucfirst($keyword) ?> Found...</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>