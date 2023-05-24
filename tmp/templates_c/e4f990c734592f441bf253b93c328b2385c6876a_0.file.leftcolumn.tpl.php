<?php
/* Smarty version 4.3.0, created on 2023-05-20 19:24:33
  from '/var/www/motoMagazine/views/default/leftcolumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6468d821d3d040_19591513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4f990c734592f441bf253b93c328b2385c6876a' => 
    array (
      0 => '/var/www/motoMagazine/views/default/leftcolumn.tpl',
      1 => 1684592672,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6468d821d3d040_19591513 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="left__column">
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
                    <a href="#"><?php echo $_smarty_tpl->tpl_vars['category']->value['title'];?>
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
                                    <a href="#"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['title'];?>
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
    </div>
</div>
<?php }
}
