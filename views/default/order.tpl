{* страница заказа *}

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
            {foreach $rsProducts as $item name=products}
                <tr>
                    <td>{$smarty.foreach.products.iteration}</td>
                    <td><a href="/?controller=product&id={$item.id}">{$item.title}</a></td>
                    <td>
                        <span id="itemCnt_{$item.id}">
                            <input type="hidden" name="itemCnt_{$item.id}" value="{$item.cnt}" />
                            {$item.cnt}
                        </span>
                    </td>
                    <td>
                        <span id="itemPrice_{$item.id}">
                            <input type="hidden" name="itemPrice_{$item.id}" value="{$item.price}" />
                            {$item.price}
                        </span>
                    </td>
                    <td>
                        <span id="itemRealPrice_{$item.id}">
                            <input type="hidden" name="itemRealPrice_{$item.id}" value="{$item.realPrice}" />
                            {$item.realPrice}
                        </span>
                    </td>
                </tr>
            {{/foreach}}
        </table>
        {if isset($arUser)}
            {$buttonClass = ""}
            <h2 class="mt-2" style="width:100%">Данные заказчика</h2>
            <div class="container mt-2 {$buttonClass}" id="orderUserInfoBox">
                {$name = $arUser.name}
                {$phone = $arUser.phone}
                {$adress = $arUser.adress}
                <table>
                    <tr class="">
                        <td>Имя*</td>
                        <td><input type="text" id="name" name="name" value="{$name}" /></td>
                    </tr>
                    <tr>
                        <td>Тел*</td>
                        <td><input type="text" id="phone" name="phone" value="{$phone}" /></td>
                    </tr>
                    <tr>
                        <td>Адрес*</td>
                        <td><textarea type="text" id="adress" name="adress">{$adress}</textarea></td>
                    </tr>
                </table>
            </div>
        {else}
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
            {$buttonClass = " display:none;"}
        {/if}
        <input style="{$buttonClass}" 
               id="btnSaveOrder" 
               type="button" 
               value="Оформить заказ" 
               onclick="saveOrder();" 
        />
    </form>
</div>