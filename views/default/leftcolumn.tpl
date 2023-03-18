<div class="left__column">
    <div class="left__menu">
        <div class="menu__caption">Меню:</div>
        {foreach from=$categories item=category}
            <p>{$category.title}</p>
        {/foreach}
    </div>
</div>