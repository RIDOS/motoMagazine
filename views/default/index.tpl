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
</div>