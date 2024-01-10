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
                            <a href="javascript:void(0)" class="badge bg-label-info"><span class="fa fa-pencil"></span></a>
                            <a href="javascript:void(0)" class="badge bg-label-primary"><span class="fa fa-pencil"></span></a>
                            <a href="javascript:void(0)" class="badge bg-label-danger"><span class="times"></span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>