<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h4 class="py-3 mb-4"> <span class="text-muted">Products</span> | All</h4>
            <a title="Add Product" href="javascript:void(0)" class="add_product btn btn-info"> <span class="bx bx-plus"></span></a>
        </div>
        <div class="content"></div>
    </div>
</div>
<script>
    let content = 'product';
</script>
<script src="<?= base_url('assets/js/custom/products.js?v=1.1') ?>"></script>
<script>
    $("#add_item").autocomplete({
        source: function(request, response) {
            $.ajax({
                type: 'get',
                url: 'https://bkwf.adroitsol.co/admin/purchases/suggestions',
                dataType: "json",
                data: {
                    term: request.term,
                    supplier_id: $("#posupplier").val()
                },
                success: function(data) {
                    $(this).removeClass('ui-autocomplete-loading');
                    response(data);
                }
            });
        },
        minLength: 1,
        autoFocus: false,
        delay: 250,
        response: function(event, ui) {
            if ($(this).val().length >= 16 && ui.content[0].id == 0) {
                //audio_error.play();
                bootbox.alert('No matching result found! Product might be out of stock in the selected warehouse.', function() {
                    $('#add_item').focus();
                });
                $(this).removeClass('ui-autocomplete-loading');
                $(this).val('');
            } else if (ui.content.length == 1 && ui.content[0].id != 0) {
                ui.item = ui.content[0];
                $(this).data('ui-autocomplete')._trigger('select', 'autocompleteselect', ui);
                $(this).autocomplete('close');
                $(this).removeClass('ui-autocomplete-loading');
            } else if (ui.content.length == 1 && ui.content[0].id == 0) {
                //audio_error.play();
                bootbox.alert('No matching result found! Product might be out of stock in the selected warehouse.', function() {
                    $('#add_item').focus();
                });
                $(this).removeClass('ui-autocomplete-loading');
                $(this).val('');
            }
        },
        select: function(event, ui) {
            event.preventDefault();
            if (ui.item.id !== 0) {
                var row = add_purchase_item(ui.item);
                if (row)
                    $(this).val('');
            } else {
                //audio_error.play();
                bootbox.alert('No matching result found! Product might be out of stock in the selected warehouse.');
            }
        }
    });
</script>