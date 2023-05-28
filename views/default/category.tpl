{* Страница категории *}

<div class="container">
    <h1>Товары категории "{$rsCategory.title}"</h1>
</div>
<div class="container mt-2" {if !$products} style="display: block;" {/if}>
{if $products}
    {foreach $products as $item name=products}
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
    {{/foreach}}
{elseif !$rsChildCats}
    <h2>Товаров нет</h2>
{/if}
<ul>
{foreach $rsChildCats as $item name=childCats}
    <li><h2 style="margin-top: 20px"><a href="/?controller=category&id={$item.id}">{$item.title}</a></h2></li>
{{/foreach}}
</ul>
</div>


