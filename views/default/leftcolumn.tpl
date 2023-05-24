<div class="left__column">
    <div class="left__menu">
        <div class="menu__caption">Меню:</div>
            {foreach from=$categories item=category}
                <ul class="menu__item">
                    <li>
                        <a href="/?controller=category&id={$category.id}">{$category.title}</a>
                        {if isset($category.children)}
                            <ul class="submenu">
                                {foreach $category.children as $itemChild}
                                    <li>
                                        <a href="/?controller=category&id={$itemChild.id}">{$itemChild.title}</a>
                                    </li>
                                {/foreach}
                            </ul>
                        {/if}
                    </li>
                </ul>
            {/foreach}
            <div class="menuCaption">Корзина</div>
            <a href="/?controller=cart" title="Перейти в корзину">В корзину</a>
            <span id="cartCntItems">
                {if $cartCntItems > 0} {$cartCntItems}{else}пусто{/if}
            </span>
        </div>
    </div>
</div>