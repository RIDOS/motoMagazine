<?php
/* Smarty version 4.3.0, created on 2023-05-25 00:03:30
  from '/var/www/motoMagazine/views/default/product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646e5f822479b9_08784593',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b0d2f39283da3e4d760ae24edcce3763c8775c3' => 
    array (
      0 => '/var/www/motoMagazine/views/default/product.tpl',
      1 => 1684955009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646e5f822479b9_08784593 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
    <div class="container">
        <h4><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['title'];?>
</h4>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['rsProduct']->value['img']) {?>
        <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['img'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
">
    <?php } else { ?>
        <img src="/images/no-image/default.avif" alt="Нет изображения">
    <?php }?>
    <p class="mt-2" style="min-width: 100%;"><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['about'];?>
</p>
    <p style="font-weight: bold; min-width: 100%;" class="mt-2">Цена: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>
 рублей</p>
    
    <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false" class="card-submit"
        href="#" style="background: #d26363;<?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> display:none<?php }?>">Удалить из корзинины</a>
    <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false" class="card-submit"
        href="#" style="<?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> display:none<?php }?>">Добавить в корзину</a>
</div><?php }
}
