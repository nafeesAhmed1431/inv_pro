<!-- Product List Widget -->
<div class="card mb-4">
    <div class="card-widget-separator-wrapper">
        <div class="card-body card-widget-separator">
            <div class="row gy-4 gy-sm-1">
                <div class="col-sm-6 col-lg-3">
                    <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                        <div>
                            <h6 class="mb-2">Total Products</h6>
                            <h4 class="mb-2"><?= $total ?></h4>
                            <p class="mb-0"><span class="text-muted me-2">5k orders</span><span class="badge bg-label-success">+5.7%</span></p>
                        </div>
                        <div class="avatar me-sm-4">
                            <span class="avatar-initial rounded bg-label-secondary">
                                <i class="bx bx-store-alt bx-sm"></i>
                            </span>
                        </div>
                    </div>
                    <hr class="d-none d-sm-block d-lg-none me-4">
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                        <div>
                            <h6 class="mb-2">Active</h6>
                            <h4 class="mb-2"><?= $active ?></h4>
                            <p class="mb-0"><span class="text-muted me-2">21k orders</span><span class="badge bg-label-success">+12.4%</span></p>
                        </div>
                        <div class="avatar me-lg-4">
                            <span class="avatar-initial rounded bg-label-secondary">
                                <i class="bx bx-laptop bx-sm"></i>
                            </span>
                        </div>
                    </div>
                    <hr class="d-none d-sm-block d-lg-none">
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                        <div>
                            <h6 class="mb-2">In Active</h6>
                            <h4 class="mb-2"><?= $inActive ?></h4>
                            <p class="mb-0 text-muted">6k orders</p>
                        </div>
                        <div class="avatar me-sm-4">
                            <span class="avatar-initial rounded bg-label-secondary">
                                <i class="bx bx-gift bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="mb-2">Affiliate</h6>
                            <h4 class="mb-2">$8,345.23</h4>
                            <p class="mb-0"><span class="text-muted me-2">150 orders</span><span class="badge bg-label-danger">-3.5%</span></p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-secondary">
                                <i class="bx bx-wallet bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Cost</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) : ?>
                    <?php foreach ($data as $row) : ?>
                        <tr>
                            <td><?= $row->name ?></td>
                            <td><?= $row->code ?></td>
                            <td><?= $row->cost ?></td>
                            <td><?= $row->price ?></td>
                            <td><span class="badge bg-<?= $row->is_active == 1 ? "success" : "danger"  ?>"><?= $row->is_active == 1 ? "Active" : "InActive"  ?></span></td>
                            <td>
                                <a data-id="<?= $row->id ?>" title="View Product" href="javascript:void(0)" class="view_product badge bg-label-primary"><span class="bx bx-detail"></span></a>
                                <a data-id="<?= $row->id ?>" title="Edit Product" href="javascript:void(0)" class="edit_product badge bg-label-info"><span class="bx bxs-pencil"></span></a>
                                <a data-id="<?= $row->id ?>" title="Delete Product" href="javascript:void(0)" class="delete_product badge bg-label-danger"><span class="bx bxs-trash-alt"></span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>