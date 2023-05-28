<?php
/* Smarty version 4.3.0, created on 2023-05-24 20:59:06
  from '/var/www/motoMagazine/views/default/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646e344a4de1f5_93016113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2de5c1726e482bf60fb3def0f65332ef59313807' => 
    array (
      0 => '/var/www/motoMagazine/views/default/category.tpl',
      1 => 1684943945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646e344a4de1f5_93016113 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
    <h1>Товары категории "<?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['title'];?>
"</h1>
</div>
<div class="container mt-2" <?php if (!$_smarty_tpl->tpl_vars['products']->value) {?> style="display: block;" <?php }?>>
<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'item', false, NULL, 'products', array (
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
            <img src="/images/no-image/default.avif" alt="Нет изображения">
        <?php }?>
        <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</h3>
        <p class="long-text"><?php echo $_smarty_tpl->tpl_vars['item']->value['about'];?>
</p>
        <p class="price-text mt-2">Цена: <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 рублей</p>
        <a class="card-submit" href="/?controller=product&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">ПОДРОБНЕЕ</a>
    </div>
    <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

<?php } elseif (!$_smarty_tpl->tpl_vars['rsChildCats']->value) {?>
    <h2>Товаров нет</h2>
<?php }?>
<ul>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsChildCats']->value, 'item', false, NULL, 'childCats', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <li><h2 style="margin-top: 20px"><a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></h2></li>
<?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>

</ul>
</div>


<?php }
}
