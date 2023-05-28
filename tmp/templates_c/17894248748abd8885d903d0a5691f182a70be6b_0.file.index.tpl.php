<?php
/* Smarty version 4.3.0, created on 2023-05-28 22:18:39
  from '/var/www/motoMagazine/views/default/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64738cefbb22e9_63737649',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17894248748abd8885d903d0a5691f182a70be6b' => 
    array (
      0 => '/var/www/motoMagazine/views/default/index.tpl',
      1 => 1685294318,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64738cefbb22e9_63737649 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'item', false, NULL, 'product', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <div class="card">
        <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['img'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
        <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</h3>
        <p class="long-text"><?php echo $_smarty_tpl->tpl_vars['item']->value['about'];?>
</p>
        <p class="price-text mt-2">Цена: <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 рублей</p>
        <a class="card-submit" href="/?controller=product&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">ПОДРОБНЕЕ</a>
    </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><?php }
}
