<?php
/* Smarty version 4.3.0, created on 2023-05-25 13:03:59
  from '/var/www/motoMagazine/views/default/leftcolumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646f166f4c7a58_46720495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4f990c734592f441bf253b93c328b2385c6876a' => 
    array (
      0 => '/var/www/motoMagazine/views/default/leftcolumn.tpl',
      1 => 1685001836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646f166f4c7a58_46720495 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="left__column">
    <div class="left__menu">
        <div class="menu__caption">Меню:</div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
            <ul class="menu__item">
                <li>
                    <a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['title'];?>
</a>
                    <?php if ((isset($_smarty_tpl->tpl_vars['category']->value['children']))) {?>
                        <ul class="submenu">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['children'], 'itemChild');
$_smarty_tpl->tpl_vars['itemChild']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->do_else = false;
?>
                                <li>
                                    <a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['title'];?>
</a>
                                </li>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                    <?php }?>
                </li>
            </ul>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <div class="mt-2">
            <div class="menuCaption">Корзина</div>
            <a href="/?controller=cart" title="Перейти в корзину">В корзину</a>
            <span id="cartCntItems">
                <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?> <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;
} else { ?>пусто<?php }?>
            </span>
        </div>
                <div class="mt-2">
            <?php if ((isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>
                <div id="userBox">
                    <p><a href="/?controller=user" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a></p>
                    <p><a href="/?controller=user&action=logout" id="userLink">Выход</a></p>
                </div>
            <?php } else { ?>
                <div id="userBox" style="display: none">
                    <p><a href="/?controller=user" id="userLink"></a></p>
                    <p><a href="/?controller=user&action=logout" id="userLink">Выход</a></p>
                </div>
                <?php if (!(isset($_smarty_tpl->tpl_vars['hideLoginBox']->value))) {?>
                <div id="loginBox">
                    <div class="menuCaption">Авторизация</div>
                    <p><input type="text" id="loginEmail" name="loginEmail" value="" /></p>
                    <p><input type="password" id="loginPwd" name="loginPwd" value="" /></p>
                    <input type="button" onclick="login();" value="Войти" />
                </div>
                <div id="registerBox">
                    <div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
                    <div id="registerBoxHidden">
                        <p>e-mail:</p>
                        <p><input type="text" id="email" name="email" value="" /></p>
                        <p>пароль:</p>
                        <p><input type="password" id="pwd1" name="pwd1" value="" /></p>
                        <p>повторить пароль:</p>
                        <p><input type="password" id="pwd2" name="pwd2" value="" /></p>
                        <input type="button" onclick="registerNewUser();" value="Зарегистрироваться" />
                    </div>
                </div>
                <?php }?>
            <?php }?>
        </div>
    </div>
</div>
</div>
<?php }
}
