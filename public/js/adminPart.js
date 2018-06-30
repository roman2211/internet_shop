$(function () {

    $('.prod_row_adm').on('click', '.edit_btn', function () {
        var idItem = parseInt($(this).attr('id').split('_')[2]);

        $.get({
            url: '/adminPartController/GetModalWindow',
            data: {
                isNew: 0,
                idItem: idItem
            },
            success: function (data) {
                dialogForItem('/adminPartController/UpdateItem', data);
            }
        });
    });

    $('.prod_row_adm').on('click', '.delete_btn', function () {
        var idItem = parseInt($(this).attr('id').split('_')[2]);
        var targetIndex = $('.delete_btn').index($(this));
        $('.prod_row_adm').eq(targetIndex).remove();
        $('hr').eq(targetIndex + 3).remove();

        $.get({
            url: '/adminPartController/DeleteItem',
            data: {
                idItem: idItem
            }
        });
    });

    $('#new_prod').on('click', function () {
        
        $.get({
            url: '/adminPartController/getModalWindow',
            data: {
                isNew: 1
            },
            success: function (data) {
                dialogForItem('/adminPartController/CreateItem', data);
            }
        });
    });

});

function dialogForItem(url, data) {
    $('#wrapper_controls').html(data).dialog({
        buttons: [
            {
                text: "OK", click: function () {
                var idItem = $('#id_modal span').text();
                var title = $('#title_inp').val();
                var price = $('#price_inp').val();
                var description = $('#descr_area').val();
                var material = $('#material_inp').val();
                var designer = $('#design_inp').val();

                $.get({
                    url: url,
                    data: {
                        idItem: idItem,
                        title: title,
                        price: price,
                        description: description,
                        material: material,
                        designer: designer
                    },
                    success: function (data) {
                        console.log(data);
                    }
                });
                $(this).dialog('close');
            }
            },
            {
                text: "Cancel", click: function () {
                $(this).dialog('close');
            }
            }
        ],
        width: 700,
        height: 700,
        title: 'Edit product'
    });
}
