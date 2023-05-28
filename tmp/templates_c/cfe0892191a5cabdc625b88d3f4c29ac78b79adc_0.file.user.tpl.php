<?php
/* Smarty version 4.3.0, created on 2023-05-28 23:58:46
  from '/var/www/motoMagazine/views/default/user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6473a466a5dbd5_46966708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfe0892191a5cabdc625b88d3f4c29ac78b79adc' => 
    array (
      0 => '/var/www/motoMagazine/views/default/user.tpl',
      1 => 1685300325,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6473a466a5dbd5_46966708 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/motoMagazine/library/smarty-4.3.0/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

<div class="container">
    <h3 style="width:100%">Ваши данные</h3>
    <table border="0" style="width:100%">
        <tr>
            <td>Логин (email)</td>
            <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"/></td>
        </tr>
        <tr>
            <td>Тел</td>
            <td><input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"/></td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td><input type="text" id="newAdress" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
"/></td>
        </tr>
        <tr>
            <td>Новый пароль</td>
            <td><input type="password" id="newPwd1" value=""/></td>
        </tr>
        <tr>
            <td>Повтор пароля</td>
            <td><input type="password" id="newPwd2" value=""/></td>
        </tr>
        <tr>
            <td>Для того чтобы сохранить данные введите текущий пароль</td>
            <td><input type="password" id="curPwd" value=""/></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="button" onclick="updateUserData();" value="Сохранить изменения"/></td>
        </tr>
    </table>
    <p style="width:100%">
        <hr>
        <h3 >Ваши заказы</h3>
        <?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value) {?>
            <p>Нет заказов</p>
        <?php } else { ?>
            <table id="customers">
                <tr>
                    <th>#</th>
                    <th>Действия</th>
                    <th>ID заказа</th>
                    <th>Статус</th>
                    <th>Дата создания</th>
                    <th>Дата оплаты</th>
                    <th>Дополнительная информация</th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsUserOrders']->value, 'item', false, NULL, 'orders', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
?>
                <tr>
                    <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
                    <td><a href="#" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); return false;">Показать товар заказа</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_create'];?>
</td>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date_payment'],"%Y-%m-%d");?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
                </tr>
                <tr style="display:none" id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <td colspan="7">
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
                            <table style="width: 100%;">
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                </tr>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild', false, NULL, 'products', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['itemChild']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
                                    <tr>
                                        <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['prouct_id'];?>
</td>
                                        <td><a href="/?controller=product&id=<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['title'];?>
</a></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['count'];?>
</td>
                                    </tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </table>
                        <?php }?>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
        <?php }?>
    </p>
</div>

<?php }
}
