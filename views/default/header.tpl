<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{$pageTitle}</title>
    <link rel="stylesheet" href="{$templateWebPath}css/main.css" type="text/css">
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

{include file='leftcolumn.tpl'}

<div class="center__column">
    Center
</div>