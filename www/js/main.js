/**
 * Функция добавления товара в корзину
 * 
 * @param integer itemId ID продукта
 * @return в случае успеха обновятся данные корзины на странице
 */
function addToCart(itemId) {
    console.log("js - addToCard()");
    $.ajax({
        type: "POST",
        async: false,
        url: "/?controller=cart&action=addtocart&id=" + itemId,
        dataType: "json",
        success: function (data) {
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' +  itemId).hide();
                $('#removeCart_' + itemId).show();
            }
        }
    });
}

/**
 * Удаление продукта из корзины
 * 
 * @param integer itemsId ID продукта
 * @return в случае успеха обнавляются данные корзины на странице
 */
function removeFromCart(itemId)
{
    console.log("js - removeFromCart()");
    $.ajax({
        type: "POST",
        async: false,
        url: "/?controller=cart&action=removefromcart&id=" + itemId,
        dataType: "json",
        success: function (data) {
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' +  itemId).show();
                $('#removeCart_' + itemId).hide();
            }
        }
    });
}

/**
 * Подсчет стоймости купленного товара
 * 
 * @param integer itemId ID продукта
 */
function conversionPrice(itemId)
{
    let newCnt = $('#itemCnt_' + itemId).val();
    let itemPrice = $('#itemPrice_' + itemId).attr('value');
    let itemRealPrice = newCnt * itemPrice;

    $('#itemRealPrice_' + itemId).html(itemRealPrice);
}