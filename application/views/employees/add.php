<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h4>Employees | <span class="text-muted">Add</span></h4>
            <div></div>
        </div>
        <h5>Personal Information.</h5>
        <hr>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name..">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="last Name..">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="user@mail.com">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" name="phone" class="form-control" placeholder="0300-0000000">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">CNIC</label>
                    <input type="number" name="cnic" class="form-control" placeholder="00000-0000000-0">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="text" class="form-control" placeholder="ABC.....">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Residance</label>
                    <select name="residance" class="form-control">
                        <option value="0">Own</option>
                        <option value="1">Company</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
            </div>
        </div>
        <div class="row mb-3 reference">
            <div class="col-md-3">
                <input type="text" name="reference[]" class="form-control" placeholder="Reference..." >
            </div>
            <div class="col-md-1">
                <button class="btn btn-info add_reference">+</button>
            </div>
        </div>
        <h5>Professional Information.</h5>
        <hr>
        <div class="experience">
            <div class="row mb-3">
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
                        <label for="">More</label>
                        <button class="add_experience_row btn btn-info">+</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="<?= base_url('assets/js/custom/employees.js?v=1.1') ?>"></script>