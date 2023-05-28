{* Шаблон заказов *}

{if ! $rsOrders}
    Нет заказов
{else}
    <div class="container">
    <table id="customers">
        <tr>
            <th>#</th>
            <th>Действие</th>
            <th>ID заказа</th>
            <th>Статус</th>
            <th>Дата создания</th>
            <th>Дата оплаты</th>
            <th>Дополнительная информация</th>
            <th>Дата изменения заказа</th>
        </tr>
        {foreach $rsOrders $item name=orders}
            <tr>
                <td>{$smarty.foreach.orders.iteration}</td>
                <td><a href="#" onclick="showProducts('{$item.id}'); return false;">Показать товары заказа</a></td>
                <td>{$item.id}</td>
                <td>
                    <input type="checkbox" onclick="updateOrderStatus({$item.id});" id="itemStatus_{$item.id}" {if $item.status} checked="checked" {/if}> Закрыт</input>
                </td>
                <td>{$item.date_create}</td>
                <td>
                    <input type="date" id="datePayment_{$item.id}" value="{$item.date_payment|date_format:"%Y-%m-%d"}"/>
                    <input type="button" value="Сохранить" onclick="updateDatePayment({$item.id});"/>
                </td>
                <td>{$item.comment}</td>
                <td>{$item.date_modification}</td>
            </tr>
            <tr style="display:none" id="purchasesForOrderId_{$item.id}">
                    <td colspan="8">
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
    </div>
{/if}