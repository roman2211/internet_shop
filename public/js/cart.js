/**
 * Created by 1234 on 28.07.2017.
 */

$(document).ready(function () {

    getGrandTotal();

    $('.user_choice .quantity_inp').on('input', function() {
        var target = $(this);
        var targetIndex = $('.user_choice .quantity_inp').index(target);

        var curQuantity = target.val();
        var curPrice = parseFloat($('.price_par span').eq(targetIndex).text());
        $('.subtotal span').eq(targetIndex).text(curPrice * curQuantity);
        getGrandTotal();
    });

    $('.user_choice').on('click', '.delete_icon', function () {
        var targetIndex = $('.delete_icon').index($(this));
        var basketRow = $('.user_choice .hidden').eq(targetIndex).text();
        $('.basket_row').eq(targetIndex).remove();
        getGrandTotal();

        $.ajax({
            type: "GET",
            url: "/basketController/DeleteItem",
            data:{
                basketRow: basketRow
            }
        });
    });

    $('#clear_cart').on('click', function () {
       $('#basket_choice').empty();

        $.ajax({
            type: "GET",
            url: "/basketController/DeleteBasket",
        });
    });


    $("#order_btn").on('click', function () {
        
        $('.quantity_inp').prop('disabled', true);


        var amount = $('#grand_total').text().substring(1);
        
        $.get({
            url: "/orderController/CreateOrder",
            data: {
                amount: amount
            },
            success: function (data) {
                console.log(data);
            }
        });
    });

});

function getGrandTotal() {
    var subTotalArray = $('.subtotal span');
    var grandTotal = 0;

    for(var i = 0; i < subTotalArray.length; i++){
        grandTotal += parseFloat(subTotalArray[i].textContent);
    }

    $('#grand_total').text('$' + grandTotal);
    $('#sum').text('$' + grandTotal);
}


