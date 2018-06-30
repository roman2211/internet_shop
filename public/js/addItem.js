/**
 * Created by USER on 26.07.2017.
 */

$(function () {

    $('.add_btn').on('click', function () {
        var idItem = $('#idItem').text();
        var color = $('#color_par').text();
        var size = $('#size_par').text();
        var quantity = $('#quan_inp').val();

        $.get({
            url: "/basketController/AddItem",
            data:{
                idItem: idItem,
                color: color,
                size: size,
                quantity: quantity
            },
            success: function (data) {
               alert(data);
            }
        });
    });
});

