{* Шаблон корзины *}

<div class="container">
    <h1 style="width:100%">Корзина</h1>

    {if !$rsProducts}
        <p>В корзине пусто.</p>
    {else}
        <form method="POST" action="/?controller=cart&action=order">
        <h2 style="width:100%">Данные заказа</h2>
        <table>
            <tr>
                <td>
                    #
                </td>
                <td>
                    Наименование
                </td>
                <td>
                    Количество
                </td>
                <td>
                    Цена за единицу
                </td>
                <td>
                    Цена
                </td>
                <td>
                    Действие
                </td>
            </tr>
            {foreach $rsProducts AS $item name=products}
                <tr>
                    <td>
                        {$smarty.foreach.products.iteration}
                    </td>
                    <td>
                        <a href="/?controller=product&id={$item.id}">{$item.title}</a>
                    </td>
                    <td>
                        <input name="itemCnt_{$item.id}" id="itemCnt_{$item.id}" type="number" value="1"
                            onchange="conversionPrice({$item.id})" min="1" max="10">
                    </td>
                    <td>
                        <span id="itemPrice_{$item.id}" value="{$item.price}">
                            {$item.price}
                        </span>
                    </td>
                    <td>
                        <span id="itemRealPrice_{$item.id}">
                            {$item.price}
                        </span>
                    </td>
                    <td>
                        <a id="removeCart_{$item.id}" onclick="removeFromCart({$item.id}); return false"
                            href="#" style="background: #d26363;">Удалить</a>
                        <a id="addCart_{$item.id}" onclick="addToCart({$item.id}); return false"
                            href="#" style="display:none">Вернуть</a>
                    </td>
                </tr>
            {{/foreach}}
        </table>
        <input type="submit" value="Оформить заказ"/>
        </form>
    {/if}
</div>