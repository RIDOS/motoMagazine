{* 
    Карточки с товарами 
*}
<div class="container">
    {foreach $products as $item name=product}
    <div class="card">
        <img src="/images/products/{$item.img}" alt="{$item.id}">
        <h3>{$item.title}</h3>
        <p class="long-text">{$item.about}</p>
        <p class="price-text mt-2">Цена: {$item.price} рублей</p>
        <a class="card-submit" href="/?controller=product&id={$item.id}">ПОДРОБНЕЕ</a>
    </div>
    {/foreach}
    <div class="container">
        <div class="paginator">
            {if $paginator.currentPage != 1}
                <span class="p_prev"><a style="text-decoration:none" href="{$paginator.link}{$paginator.currentPage - 1}"><-</a></span>
            {/if}

            <strong><span>{$paginator.currentPage}</span></strong>

            {if $paginator.currentPage  < $paginator.pageCnt}
                <span class="p_prev"><a style="text-decoration:none" href="{$paginator.link}{$paginator.currentPage + 1}">-></a></span>
            {/if}
        </div>
    </div>
</div>