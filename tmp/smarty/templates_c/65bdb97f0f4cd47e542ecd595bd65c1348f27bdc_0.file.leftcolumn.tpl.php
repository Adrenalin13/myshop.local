<?php
/* Smarty version 3.1.30, created on 2016-08-25 15:05:20
  from "D:\Other\OpenServer\domains\myshop.local\views\default\leftcolumn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57bedf003b0e51_64602720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65bdb97f0f4cd47e542ecd595bd65c1348f27bdc' => 
    array (
      0 => 'D:\\Other\\OpenServer\\domains\\myshop.local\\views\\default\\leftcolumn.tpl',
      1 => 1472126561,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57bedf003b0e51_64602720 (Smarty_Internal_Template $_smarty_tpl) {
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
</a><br>

            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
?>
                    --<a href="/category/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a><br>
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

<div class="menuCaption">Корзина</div>
    <a href="/cart/" title="Перейти в корзину">В корзине</a>
    <span id="cartCntItems">
        <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?> <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>
 <?php } else { ?>пусто<?php }?>
    </span>
</div><?php }
}
