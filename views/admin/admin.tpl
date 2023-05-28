<div id="blockNewCategory">
    <p>Новая категория:
        <input name="newCategoryName" id="newCategoryName" type="text" value="" />
    </p>

    <p>Является подкатегорией для
        <select name="generalCatId">
            <option value="0">Главная категория</option>
            {foreach $rsCaterories as $item}
                <option value="{$item.id}">{$item.title}</option>
            {/foreach}
        </select>
    </p>
    <input type="button" onclick="newCategory();" value="Добавить категорию"/>
</div>