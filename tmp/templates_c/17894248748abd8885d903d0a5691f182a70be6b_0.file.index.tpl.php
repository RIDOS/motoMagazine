<?php
/* Smarty version 4.3.0, created on 2023-05-21 09:10:32
  from '/var/www/motoMagazine/views/default/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646999b8c847e8_53558070',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17894248748abd8885d903d0a5691f182a70be6b' => 
    array (
      0 => '/var/www/motoMagazine/views/default/index.tpl',
      1 => 1684642202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646999b8c847e8_53558070 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'item', false, NULL, 'product', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <div class="card">
        <?php if ($_smarty_tpl->tpl_vars['item']->value['img']) {?>
            <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['img'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
        <?php } else { ?>
            <img src="/images/no-image/default.avif" alt="Product 1">
        <?php }?>
        <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</h3>
        <p class="long-text"><?php echo $_smarty_tpl->tpl_vars['item']->value['about'];?>
</p>
        <a class="card-submit" href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">ПОДРОБНЕЕ</a>
    </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

</div><?php }
}
