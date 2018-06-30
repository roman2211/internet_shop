/**
 * Created by 1234 on 06.08.2017.
 */

$(function () {

    $('#browse_all').on('click', function () {
        var $countPar = $('#count_items');
        var start = parseInt($countPar.text());
        console.log(start);
        
        $.get({
            url: "/catalogController/MoreItems",
            data: {
                start: start
            },
            success: function (data) {
                $countPar.text(start + 4);
                $('#item_row').append(data);
            }
        });

    });
});