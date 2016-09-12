<?php
/* Smarty version 3.1.30, created on 2016-09-12 12:48:50
  from "E:\Other\OpenServer\domains\myshop.local\views\texturia\leftcolumn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d67a02ac7710_71241562',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77d186b44dc12385f16bcf39834e16cb0ac33d87' => 
    array (
      0 => 'E:\\Other\\OpenServer\\domains\\myshop.local\\views\\texturia\\leftcolumn.tpl',
      1 => 1473673434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d67a02ac7710_71241562 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="jf-right">
    <div id="Mod88" class="jfmod module">
        <div class="jfmod-top"></div>
        <div class="jfmod-mid">
            <h3>Меню</h3>
            <div class="jfmod-content">
                <ul class="menu">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <li class="item-435 current active"><a
                                    href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><span><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span></a>
                        </li>
                        <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                            <ul class="menu" style="padding: 0px 0px 10px 20px;">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
?>
                                    <li class="item44"><a
                                                href="/category/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><span><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</span></a>
                                    </li>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </ul>
                        <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>
            </div>
        </div>
        <div class="jfmod-bot"></div>
    </div>

    <div id="Mod97" class="jfmod module_blue">
        <div class="jfmod-top"></div>
        <div class="jfmod-mid">
            <h3>Корзина</h3>
            <div class="jfmod-content">
                <div class="joomimg97_main">
                    <div class="joomimg_row" style="font-size: 16px;">
                        <a href="/cart/" title="Перейти в корзину">В корзине</a>
                        <span id="cartCntItems">
                            <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?> <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>
 <?php } else { ?>пусто<?php }?>
                        </span>
                    </div>
                    <div class="joomimg_clr"></div>
                </div>
            </div>
        </div>
        <div class="jfmod-bot"></div>
    </div>

    <div id="Mod89" class="jfmod module_orangebold">
        <div class="jfmod-top"></div>
        <div class="jfmod-mid">
            <div class="jfmod-content">
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
                            <div id="form-login">
                                Введите логин и пароль
                                <fieldset class="input">
                                    <p id="form-login-username">
                                        <input type="text" id="loginEmail" name="username" value="Username"
                                               class="inputbox"
                                               alt="username" onblur="if(this.value=='') this.value='Username';"
                                               onfocus="if(this.value=='Username') this.value='';"/></p>
                                    <p id="form-login-password">
                                        <input type="password" alt="password"
                                               onfocus="if(this.value=='Password') this.value='';"
                                               onblur="if(this.value=='') this.value='Password';" value="Password"
                                               size="18"
                                               class="inputbox" name="passwd" id="loginPwd">
                                    </p>
                                    <p style="text-align:right">
                                        <input type="button" class="buttonLogin" onclick="login();" value="Войти">
                                    </p>
                                </fieldset>
                            </div>
                        </div>
                        <div id="registerBox">
                            <div class="re-link menuCaption showHidden" onClick="showRegisterBox();">Регистрация</div>
                            <div id="form-login">
                                <fieldset class="input">
                                    <div id="registerBoxHidden" class="hideme">
                                        <p>
                                            email:<br>
                                            <input type="text" id="email" name="email" value=""><br>
                                            пароль:<br>
                                            <input type="password" id="pwd1" name="pwd1" value=""><br>
                                            повторить пароль:<br>
                                            <input type="password" id="pwd2" name="pwd2" value=""><br>
                                        </p>
                                        <input type="button" class="buttonLogin" onclick="registerNewUser();"
                                               value="Зарегистрироваться">
                                    </div>
                                </fieldset>
                            </div>
                            <p></p>
                        </div>
                    <?php }?>
                <?php }?>
            </div>
        </div>
        <div class="jfmod-bot"></div>
    </div>

</div><?php }
}
