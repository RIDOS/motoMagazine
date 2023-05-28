<?php
/* Smarty version 4.3.0, created on 2023-05-25 12:00:48
  from '/var/www/motoMagazine/views/default/cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646f07a06f14b0_66594237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df0a56debd676f294f815dd3d2844e379ef0b87c' => 
    array (
      0 => '/var/www/motoMagazine/views/default/cart.tpl',
      1 => 1684998041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646f07a06f14b0_66594237 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
    <h1 style="width:100%">Корзина</h1>

    <?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
        <p>В корзине пусто.</p>
    <?php } else { ?>
        <form method="POST" action="/?controller=cart&action=order">
        <h2 style="width:100%">Данные заказа</h2>
        <table>
            <tr>
                <td>
                    #
                </td>
                <td>
                    Наименование
                </td>
                <td>
                    Количество
                </td>
                <td>
                    Цена за единицу
                </td>
                <td>
                    Цена
                </td>
                <td>
                    Действие
                </td>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
                <tr>
                    <td>
                        <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>

                    </td>
                    <td>
                        <a href="/?controller=product&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a>
                    </td>
                    <td>
                        <input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="number" value="1"
                            onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)" min="1" max="10">
                    </td>
                    <td>
                        <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                        </span>
                    </td>
                    <td>
                        <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                        </span>
                    </td>
                    <td>
                        <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false"
                            href="#" style="background: #d26363;">Удалить</a>
                        <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false"
                            href="#" style="display:none">Вернуть</a>
                    </td>
                </tr>
            <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

        </table>
        <input type="submit" value="Оформить заказ"/>
        </form>
    <?php }?>
</div><?php }
}
