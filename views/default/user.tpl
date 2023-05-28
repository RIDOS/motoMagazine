{* Шаблон страницы пользователя *}

<div class="container">
    <h3 style="width:100%">Ваши данные</h3>
    <table border="0" style="width:100%">
        <tr>
            <td>Логин (email)</td>
            <td>{$arUser['email']}</td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><input type="text" id="newName" value="{$arUser['name']}"/></td>
        </tr>
        <tr>
            <td>Тел</td>
            <td><input type="text" id="newPhone" value="{$arUser['phone']}"/></td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td><input type="text" id="newAdress" value="{$arUser['adress']}"/></td>
        </tr>
        <tr>
            <td>Новый пароль</td>
            <td><input type="password" id="newPwd1" value=""/></td>
        </tr>
        <tr>
            <td>Повтор пароля</td>
            <td><input type="password" id="newPwd2" value=""/></td>
        </tr>
        <tr>
            <td>Для того чтобы сохранить данные введите текущий пароль</td>
            <td><input type="password" id="curPwd" value=""/></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="button" onclick="updateUserData();" value="Сохранить изменения"/></td>
        </tr>
    </table>
    <p style="width:100%">
        <hr>
        <h3 >Ваши заказы</h3>
        {if !$rsUserOrders}
            <p>Нет заказов</p>
        {else}
            <table id="customers">
                <tr>
                    <th>#</th>
                    <th>Действия</th>
                    <th>ID заказа</th>
                    <th>Статус</th>
                    <th>Дата создания</th>
                    <th>Дата оплаты</th>
                    <th>Дополнительная информация</th>
                </tr>
                {foreach $rsUserOrders as $item name=orders}
                <tr>
                    <td>{$smarty.foreach.orders.iteration}</td>
                    <td><a href="#" onclick="showProducts('{$item.id}'); return false;">Показать товар заказа</td>
                    <td>{$item.id}</td>
                    <td>{$item.status}</td>
                    <td>{$item.date_create}</td>
                    <td>{$item.date_payment}</td>
                    <td>{$item.comment}</td>
                </tr>
                <tr style="display:none" id="purchasesForOrderId_{$item.id}">
                    <td colspan="7">
                        {if $item.children}
                            <table style="width: 100%;">
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                </tr>
                                {foreach $item.children as $itemChild name=products}
                                    <tr>
                                        <td>{$smarty.foreach.products.iteration}</td>
                                        <td>{$itemChild.prouct_id}</td>
                                        <td><a href="/?controller=product&id={$itemChild.id}">{$itemChild.title}</a></td>
                                        <td>{$itemChild.amount}</td>
                                        <td>{$itemChild.count}</td>
                                    </tr>
                                {/foreach}
                            </table>
                        {/if}
                    </td>
                </tr>
                {/foreach}
            </table>
        {/if}
    </p>
</div>

