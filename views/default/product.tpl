{* Страница продукта *}

<div class="container">
    <div class="container">
        <h4>{$rsProduct.title}</h4>
    </div>

    {if $rsProduct.img}
        <img src="/images/products/{$rsProduct.img}" alt="{$rsProduct.id}">
    {else}
        <img src="/images/no-image/default.avif" alt="Нет изображения">
    {/if}
    <p class="mt-2" style="min-width: 100%;">{$rsProduct.about}</p>
    <p style="font-weight: bold; min-width: 100%;" class="mt-2">Цена: {$rsProduct.price} рублей</p>
    
    <a id="removeCart_{$rsProduct.id}" onclick="removeFromCart({$rsProduct.id}); return false" class="card-submit"
        href="#" style="background: #d26363;{if !$itemInCart} display:none{/if}">Удалить из корзинины</a>
    <a id="addCart_{$rsProduct.id}" onclick="addToCart({$rsProduct.id}); return false" class="card-submit"
        href="#" style="{if $itemInCart} display:none{/if}">Добавить в корзину</a>
</div>