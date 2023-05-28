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

/**
 * Получение данных с формы
 */
function getData(obj_form)
{
    let hData = {};

    $('input, textarea, select', obj_form).each(function(){
        if (this.name && this.name != '') {
            hData[this.name] = this.value;
            console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }
    })

    return hData;
}

/**
 * Регистрация новго пользователя
 */
function registerNewUser()
{
    let postData = getData('#registerBox');

    $.ajax({
        type: "POST",
        url: "/?controller=user&action=register",
        data: postData,
        dataType: "json",
        success: function (data) {
            if (data['success']) {
                alert('Регистарция прошла успешно');

                //> блок в левом столбце
                $('#registerBox').hide();
                $('#userLink').attr('href', '/?controller=user');
                $('#userLink').html(data['userName']);
                $('#userBox').show();
                //<

                //> страница заказа
                $('#loginBox').hide();
                $('#btnSaveOrder').show();
                //<
            } else {
                alert(data['message']);
            }
            console.log(data);
        }
    });
}

/**
 * Авторизация пользователя
 */
function login()
{
    let email = $('#loginEmail').val();
    let pwd = $('#loginPwd').val();

    let postData = "email=" + email + "&pwd=" + pwd;

    $.ajax({
        type: "POST",
        url: "/?controller=user&action=login",
        data: postData,
        dataType: "json",
        success: function (data) {
            if (data['success']) {
                $('#registerBox').hide();
                $('#loginBox').hide();

                $('#userLink').attr('href', '/?controller=user');
                $('#userLink').html(data['displayName']);
                $('#userBox').show();

                $('#name').val(data['name']);
                $('#phone').val(data['phone']);
                $('#adress').val(data['adress']);

                $('#btnSaveOrder').show();
            } else {
                alert(data['message']);
            }
        }
    });
}

/**
 * Обновление данных пользователя
 */
function updateUserData()
{
    console.log('js - updateUserData()');
    let phone = $('#newPhone').val();
    let adress = $('#newAdress').val();
    let pwd1 = $('#newPwd1').val();
    let pwd2 = $('#newPwd2').val();
    let curPwd = $('#curPwd').val();
    let name = $('#newName').val();

    let postData = {
        phone: phone,
        adress: adress,
        pwd1: pwd1,
        pwd2: pwd2,
        curPwd: curPwd,
        name: name
    };

    $.ajax({
        type: "POST",
        url: "/?controller=user&action=update",
        data: postData,
        dataType: "json",
        success: function (data) {
            if (data['success']) {
                $('#userLink').html(data['userName']);
                alert(data['message']);
            } else {
                alert(data['message']);
            }
        }
    });
}

/**
 * Сохранение заказа
 */
function saveOrder()
{
    let postData = getData('form');

    $.ajax({
        type: "POST",
        url: "/?controller=cart&action=saveorder",
        data: postData,
        dataType: "json",
        success: function (data) {
            if (data['success']) {
                alert(data['message']);
                window.location.replace("/?controller=user");
            } else {
                alert(data['message']);
            }
        }
    });
}

/**
 * Показать или спрятать данные о заказе
 */
function showProducts(id)
{
    let objName = "#purchasesForOrderId_" + id;

    if ($(objName).css('display') != 'table-row') {
        $(objName).show();
    } else {
        $(objName).hide();
    }
}
