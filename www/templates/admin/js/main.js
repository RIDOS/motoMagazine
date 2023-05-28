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

function newCategory()
{
    let postData = getData('#blockNewCategory');

    $.ajax({
        type: "POST",
        url: "/?controller=admin&action=addnewcat",
        data: postData,
        dataType: "JSON",
        success: function (data) {
            if (data['success']) {
                alert(data['message'])
                $('#newCategoryName').val('');
            } else {
                alert(data['message'])
            }
        }
    });
}

function updateCat(itemId)
{
    let parentId = $('#parentId_' + itemId).val();
    let newName = $('#itemName_' + itemId).val();
    let postData = {itemId: itemId, parentId: parentId, newName: newName};

    console.log(postData);
    $.ajax({
        type: "POST",
        url: "/?controller=admin&action=updatecategory",
        data: postData,
        dataType: "json",
        success: function (data) {
            alert(data['message']);
        }
    });
}

function addProduct()
{
    let itemName = $('#newItemName').val();
    let itemPrice = $('#newItemPrice').val();
    let itemCatId = $('#newItemCatId').val();
    let itemDesc = $('#newItemDesc').val();

    let postData = {itemName: itemName, 
                    itemPrice: itemPrice, 
                    itemCatId: itemCatId, 
                    itemDesc: itemDesc};
    
    $.ajax({
        type: "POST",
        url: "/?controller=admin&action=addproduct",
        data: postData,
        dataType: "JSON",
        success: function (data) {
            alert(data['message']);
            if (data['success']) {
                $('#newItemName').val('');
                $('#newItemPrice').val('');
                $('#newItemCatId').val('');
                $('#newItemDesc').val('');
            }
        }
    });
}


/**
 * Изменение данных продукта
 * 
 * @param int itemId 
 */
function updateProduct(itemId)
{
    let itemName = $('#itemName_' + itemId).val();
    let itemPrice = $('#itemPrice_' + itemId).val();
    let itemCatId = $('#itemCatId_' + itemId).val();
    let itemDesc = $('#itemDesc_' + itemId).val();
    let itemStatus = $('#itemStatus_' + itemId).prop('checked');

    console.log(itemId);
    console.log(itemStatus);

    if (! itemStatus) {
        itemStatus = 1;
    } else {
        itemStatus = 0;
    }

    let postData = {
        itemId: itemId, itemName: itemName, itemPrice: itemPrice, 
        itemCatId: itemCatId, itemDesc: itemDesc, itemStatus: itemStatus
    };

    $.ajax({
        type: "POST",
        url: "/?controller=admin&action=updateproduct",
        data: postData,
        dataType: "json",
        success: function (data) {
            alert(data['message']);
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


function updateOrderStatus(itemId)
{
    let status = $('#itemStatus_' + itemId).prop('checked');

    status = !status ? 0 : 1;

    let postData = {itemId: itemId, status: status};

    $.ajax({
        type: "POST",
        url: "/?controller=admin&action=setorderstatus",
        data: postData,
        dataType: "json",
        success: function (data) {
            if (! data['success']) {
                alert(data['message']);
            }
        }
    });
}


/**
 * Изменене информации об оплате заказа
 */
function updateDatePayment(itemId)
{
    let datePayment = $('#datePayment_' + itemId).val();
    let postData = {itemId: itemId, datePayment: datePayment};

    $.ajax({
        type: "POST",
        url: "/?controller=admin&action=setorderdatepayment",
        data: postData,
        dataType: "JSON",
        success: function (data) {
            if (! data['success']) {
                alert(data['message']);
            }
        }
    });
}

/**
 * Авторизация пользователя
 */
function login()
{
    let email = $('#username').val();
    let pwd = $('#password').val();

    let postData = "email=" + email + "&pwd=" + pwd;

    $.ajax({
        type: "POST",
        url: "/?controller=user&action=login",
        data: postData,
        dataType: "json",
        success: function (data) {
            if (data['is_admin'] == '2') {
                $('.modal').hide();
                $.session.set('is_admin', '2');
            }
        }
    });
}

$(document).ready ( function(){
    if ($.session.get("is_admin") !== '2') {
        $('.modal').show();
    } else {
        $('.modal').hide();
    }
});