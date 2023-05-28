{* Шапка страницы Администрации *}

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$pageTitle}</title>
    <link rel="stylesheet" href="{TemplateAdminWebPath}css/main.css" type="text/css">
    <link type="image/x-icon" href="/images/logo/favicon.ico" rel="shortcut icon">
    <script type="text/javascript" src="/js/jquery-3.7.0.min.js"></script>
    <script type="text/javascript" src="/js/jquery.session.js"></script>
    <script type="text/javascript" src="{TemplateAdminWebPath}js/main.js"></script>
</head>
<body>
    <div id="header">
        <h1 style="text-align: center;">Управление сайтом</h1>
    </div>
    {include file="adminLeftColumn.tpl"}
    <div class="center">
        <div id="myModal" class="modal">
            <div class="modal-content">
                <input type="text" id="username" placeholder="Введите имя пользователя">
                <input type="password" id="password" placeholder="Введите пароль">
                <button onclick="login()">Войти</button>
            </div>
        </div>