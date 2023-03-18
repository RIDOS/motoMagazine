<?php
/* Smarty version 4.3.0, created on 2023-03-19 04:47:35
  from '/var/www/motoMagazine/views/default/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64164d97599828_78589964',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e70248ae236c2dc7d21700eaa4f5a64d249577e' => 
    array (
      0 => '/var/www/motoMagazine/views/default/header.tpl',
      1 => 1679183254,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_64164d97599828_78589964 (Smarty_Internal_Template $_smarty_tpl) {
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
<header class="header">
    <div class="header__top d-none d-md-block">
        <div class="container">
            <div class="row flex-nowrap no-gutters align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="header-top-info">
                        <span class="header-top-info__text">Город:</span>
                        <span class="header-top-info__link js-city-modal-open"><span>Уфа</span>
                        </span><a href="tel:+74959265201" class="header-top-info__phone">+7 495 926-52-01</a></div>
                </div>
                <div class="col-auto col-xl text-right">
                    <div class="header-top-info">
                        <span class="header-top-info__text">Интернет-магазин:</span>
                        <a href="tel:88005553535" class="header-top-info__phone">8 800 555-35-35</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header__middle">
        <h1>Интернет магазин</h1>
    </div>
</header>

<?php $_smarty_tpl->_subTemplateRender('file:leftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="center__column">
    Center
</div><?php }
}
