<div class="left__column">
    <div class="left__menu">
        <div class="menu__caption">Меню:</div>
        {foreach from=$categories item=category}
            <ul class="menu__item">
                <li>
                    <a href="#">{$category.title}</a>
                    {if isset($category.children)}
                        <ul class="submenu">
                            {foreach $category.children as $itemChild}
                                <li>
                                    <a href="#">{$itemChild.title}</a>
                                </li>
                            {/foreach}
                        </ul>
                    {/if}
                </li>
            </ul>
        {/foreach}
    </div>
</div>
