<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4>Users | <span class="text-muted">All</span></h4>
        <div class="row">
            <div class="col-12">
                <div class="content"></div>
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
                $('.content').html(res.status ? res.html : `<h1>No Data Found!!!</h1>`);
            },
            error: res => {
                $('.content').html(`<h1>No Data Found!!!</h1>`);
            },
        });
    }
</script>