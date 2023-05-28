{* Шаблон категорий *}

<h2>Категории</h2>
<div class="container">
    <table id="customers">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Название</th>
            <th>Родительская категория</th>
            <th>Действия</th>
        </tr>
        {foreach $rsCategories as $item name=categories}
            <tr>
                <td>{$smarty.foreach.categories.iteration}</td>
                <td>{$item.id}</td>
                <td><input type="edit" id="itemName_{$item.id}" value="{$item.title}"></td>
                <td>
                    <select id="parentId_{$item.id}">
                        <option value="0">Главная категория</option>
                        {foreach $rsMainCategories as $mainItem}
                            <option value="{$mainItem.id}" {if $item.parent_id == $mainItem.id} selected {/if}>{$mainItem.title}
                            </option>
                        {/foreach}
                    </select>
                </td>
                <td>
                    <input type="button" value="Сохранить" onclick="updateCat({$item.id})"/>
                </td>
            </tr>
        {/foreach}
    </table>
</div>