{* Шаблон меню *}

<div class="left__column">
    <div class="left__menu">
        <div class="menu__caption">Меню:</div>
        {foreach from=$categories item=category}
            <ul class="menu__item">
                <li>
                    <a href="/?controller=category&id={$category.id}">{$category.title}</a>
                    {if isset($category.children)}
                        <ul class="submenu">
                            {foreach $category.children as $itemChild}
                                <li>
                                    <a href="/?controller=category&id={$itemChild.id}">{$itemChild.title}</a>
                                </li>
                            {/foreach}
                        </ul>
                    {/if}
                </li>
            </ul>
        {/foreach}
        <div class="mt-2">
            <div class="menuCaption">Корзина</div>
            <a href="/?controller=cart" title="Перейти в корзину">В корзину</a>
            <span id="cartCntItems">
                {if $cartCntItems > 0} {$cartCntItems}{else}пусто{/if}
            </span>
        </div>
        {* Форма авторизации/регистрации *}
        <div class="mt-2">
            {if isset($arUser)}
                <div id="userBox">
                    <p><a href="/?controller=user" id="userLink">{$arUser['displayName']}</a></p>
                    <p><a href="/?controller=user&action=logout" id="userLink">Выход</a></p>
                </div>
            {else}
                <div id="userBox" style="display: none">
                    <p><a href="/?controller=user" id="userLink"></a></p>
                    <p><a href="/?controller=user&action=logout" id="userLink">Выход</a></p>
                </div>
                {if ! isset($hideLoginBox)}
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
                {/if}
            {/if}
        </div>
    </div>
</div>
</div>
