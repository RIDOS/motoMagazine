<?php
/* Smarty version 4.3.0, created on 2023-02-14 03:16:02
  from '/var/www/motoMagazine/views/default/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63eab6a28f8573_24355414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e70248ae236c2dc7d21700eaa4f5a64d249577e' => 
    array (
      0 => '/var/www/motoMagazine/views/default/header.tpl',
      1 => 1676323387,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_63eab6a28f8573_24355414 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css">
</head>
<body>
<div class="header">
    <h1>Интернет магазин</h1>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:leftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="center__column">
    Center
</div><?php }
}
