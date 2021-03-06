<?php
/* Smarty version 3.1.30, created on 2016-09-06 12:42:07
  from "E:\Other\OpenServer\domains\myshop.local\views\default\leftcolumn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57ce8f6fc71191_09095034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '206fa7662980dc4356c37005c739d8e5d0dc0fe7' => 
    array (
      0 => 'E:\\Other\\OpenServer\\domains\\myshop.local\\views\\default\\leftcolumn.tpl',
      1 => 1472819970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ce8f6fc71191_09095034 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="leftColumn">

    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
            <a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
            <br>
            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
?>
                    --
                    <a href="/category/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a>
                    <br>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>

    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
        <div id="userBox">
            <a href="/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br>
            <a href="/user/logout/" onclick="logout();">Выход</a>
        </div>
    <?php } else { ?>
        <div id="userBox" class="hideme">
            <a href="#" id="userLink"></a><br>
            <a href="/user/logout/" onClick="logout();">Выход</a>
        </div>

        <?php if (!isset($_smarty_tpl->tpl_vars['hideLoginBox']->value)) {?>

            <div id="loginBox">
                <div class="menuCaption">Авторизация</div>
                <input type="text" id="loginEmail" name="loginEmail" value=""/><br>
                <input type="password" id="loginPwd" name="loginPwd" value=""/><br>
                <input type="button" onClick="login();" value="Войти"/>
            </div>
            <div id="registerBox">
                <div class="menuCaption showHidden" onClick="showRegisterBox();">Регистрация</div>
                <div id="registerBoxHidden">
                    email:<br>
                    <input type="text" id="email" name="email" value=""><br>
                    пароль:<br>
                    <input type="password" id="pwd1" name="pwd1" value=""><br>
                    повторить пароль:<br>
                    <input type="password" id="pwd2" name="pwd2" value=""><br>
                    <input type="button" onclick="registerNewUser();" value="Зарегистрироваться">
                </div>
            </div>

        <?php }?>

    <?php }?>

    <div class="menuCaption">Корзина</div>
    <a href="/cart/" title="Перейти в корзину">В корзине</a>
    <span id="cartCntItems">
        <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?> <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>
 <?php } else { ?>пусто<?php }?>
    </span>
</div><?php }
}
