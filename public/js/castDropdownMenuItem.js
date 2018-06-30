/**
 * Created by 1234 on 25.07.2017.
 */

$(document).ready(function () {

    castParameterMenu('size_menu', 'size_menu_item', 'size_par');
    castParameterMenu('color_menu', 'color_menu_item', 'color_par');
});

function castParameterMenu(menu, menuItem, castNode) {
    $('#' + menu).on('click', '.' + menuItem, function () {
        $('#' + castNode).text($(this).text());

        if (menu == 'color_menu'){
            $('.color').css('background-color', $(this).text());
        }
    })
}