{* 
    Карточки с товарами 
*}
<div class="container">
    {foreach $products as $item name=product}
    <div class="card">
        {if $item.img}
            <img src="/images/products/{$item.img}" alt="{$item.id}">
        {else}
            <img src="/images/no-image/default.avif" alt="Нет изображения">
        {/if}
        <h3>{$item.title}</h3>
        <p class="long-text">{$item.about}</p>
        <p class="price-text mt-2">Цена: {$item.price} рублей</p>
        <a class="card-submit" href="/?controller=product&id={$item.id}">ПОДРОБНЕЕ</a>
    </div>
    {/foreach}
</div>