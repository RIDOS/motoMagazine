<?php
/* Smarty version 4.3.0, created on 2023-05-25 13:13:31
  from '/var/www/motoMagazine/views/default/order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646f18abc967e0_84366566',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4958630fa0043197505a83f5b37124b749d1fa3' => 
    array (
      0 => '/var/www/motoMagazine/views/default/order.tpl',
      1 => 1685002398,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646f18abc967e0_84366566 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
    <h2 style="width:100%"></h2>
    <form id="frmOrder" action="controller=cart&action=saveorder" method="POST">
        <table>
            <tr>
                <td>#</td>
                <td>Наименование</td>
                <td>Количество</td>
                <td>Цена за единицу</td>
                <td>Стоймость</td>
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
                    <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                    <td><a href="/?controller=product&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></td>
                    <td>
                        <span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <input type="hidden" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
" />
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>

                        </span>
                    </td>
                    <td>
                        <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <input type="hidden" name="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
" />
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                        </span>
                    </td>
                    <td>
                        <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <input type="hidden" name="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
" />
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>

                        </span>
                    </td>
                </tr>
            <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

        </table>
        <?php if ((isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>
            <?php $_smarty_tpl->_assignInScope('buttonClass', '');?>
            <h2 class="mt-2" style="width:100%">Данные заказчика</h2>
            <div class="container mt-2 <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
" id="orderUserInfoBox">
                <?php $_smarty_tpl->_assignInScope('name', $_smarty_tpl->tpl_vars['arUser']->value['name']);?>
                <?php $_smarty_tpl->_assignInScope('phone', $_smarty_tpl->tpl_vars['arUser']->value['phone']);?>
                <?php $_smarty_tpl->_assignInScope('adress', $_smarty_tpl->tpl_vars['arUser']->value['adress']);?>
                <table>
                    <tr class="">
                        <td>Имя*</td>
                        <td><input type="text" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" /></td>
                    </tr>
                    <tr>
                        <td>Тел*</td>
                        <td><input type="text" id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" /></td>
                    </tr>
                    <tr>
                        <td>Адрес*</td>
                        <td><textarea type="text" id="adress" name="adress"><?php echo $_smarty_tpl->tpl_vars['adress']->value;?>
</textarea></td>
                    </tr>
                </table>
            </div>
        <?php } else { ?>
            <div id="loginBox" class="mt-2">
                <div class="menuCaption">Авторизация</div>
                <table>
                    <tr>
                        <td>Логин</td>
                        <td><input type="text" id="loginEmail" name="loginEmail" value="" /></td>
                    </tr>
                    <tr>
                        <td>Пароль</td>
                        <td><input type="password" id="loginPwd" name="loginPwd" value="" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="button" onclick="login();" value="Войти" /></td>
                    </tr>
                </table>
            </div>
            <div id="registerBox" class="mt-2">
                <div class="menuCaption">Регистрация</div>
                <p>e-mail:</p>
                <p><input type="text" id="email" name="email" value="" /></p>
                <p>пароль:</p>
                <p><input type="password" id="pwd1" name="pwd1" value="" /></p>
                <p>повторить пароль:</p>
                <p><input type="password" id="pwd2" name="pwd2" value="" /></p>
                <p>имя:</p>
                <p><input type="text" id="name" name="name" value="" /></p>
                <p>телефон:</p>
                <p><input type="text" id="phone" name="phone" value="" /></p>
                <p>адрес:</p>
                <p><input type="text" id="adress" name="adress" value="" /></p>
                <input type="button" onclick="registerNewUser();" value="Зарегистрироваться" />
            </div>
            <?php $_smarty_tpl->_assignInScope('buttonClass', " display:none;");?>
        <?php }?>
        <input style="<?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
" 
               id="btnSaveOrder" 
               type="button" 
               value="Оформить заказ" 
               onclick="saveOrder();" 
        />
    </form>
</div><?php }
}
