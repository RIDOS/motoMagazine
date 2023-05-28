{* Шаблон товаров *}

<h2>Товар</h2>
<div class="container">
    <table id="customers">
        <caption>Добавить продукт</caption>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Описание</th>
            <th>Сохранить</th>
        </tr>
        <tr>
            <td>
                <input type="edit" id="newItemName" value="" placeholder="Название" />
            </td>
            <td>
                <input type="edit" id="newItemPrice" value="" placeholder="Цена" />
            </td>
            <td>
                <select id="newItemCatId">
                    <option value="0">Главная категория</option>
                    {foreach $rsCaterories as $item }
                        <option value="{$item.id}">{$item.title}</option>
                    {/foreach}
                </select>
            </td>
            <td>
                <textarea id="newItemDesc"></textarea>
            </td>
            <td>
                <input type="button" onclick="addProduct();" value="Сохранить" />
            </td>
        </tr>
    </table>
</div>
<div class="container mt-2">
    <table id="customers">
        <caption>Редактированть</caption>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Описание</th>
            <th>Удалить</th>
            <th>Изображение</th>
            <th>Сохранить</th>
        </tr>
        {foreach $rsProducts as $item name=products}
            <tr>
                <td>{$smarty.foreach.products.iteration}</td>
                <td>{$item.id}</td>
                <td>
                    <input type="edit" id="itemName_{$item.id}" value="{$item.title}" />
                </td>
                <td>
                    <input type="edit" id="itemPrice_{$item.id}" value="{$item.price}" />
                </td>
                <td>
                    <select id="itemCatId_{$item.id}">
                        <option value="0">Главная категория</option>
                        {foreach $rsCaterories as $itemCat }
                            <option value="{$itemCat.id}" {if $item.id_category == $itemCat.id} selected {/if}>{$itemCat.title}
                            </option>
                        {/foreach}
                    </select>
                </td>
                <td>
                    <textarea id="itemDesc_{$item.id}">
                            {$item.about}
                        </textarea>
                </td>
                <td>
                    <input type="checkbox" id="itemStatus_{$item.id}" {if $item.status == 0} checked="checked" {/if} />
                </td>
                <td>
                    {if $item.img}
                        <img src="/images/products/{$item.img}" width="100" />
                    {else}
                        <img src="/images/products/default.avif" width="100" />
                    {/if}
                    <form action="/?controller=admin&action=upload" method="post" enctype="multipart/form-data">
                        <p><input type="file" name="filename"></p>
                        <p><input type="hidden" name="itemId" value="{$item.id}"></p>
                        <p><input type="submit" value="Загрузить"></p>
                    </form>
                </td>
                <td>
                    <input type="button" value="Сохранить" onclick="updateProduct('{$item.id}');" class="card-submit">
                </td>
            </tr>
        {/foreach}
    </table>
</div>