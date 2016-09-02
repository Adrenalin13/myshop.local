<?php
/* Smarty version 3.1.30, created on 2016-08-31 13:52:35
  from "D:\Other\OpenServer\domains\myshop.local\views\default\user.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c6b6f3b5b9d7_97753216',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3dc4e3a2e7470d6a771eda1336e9e02b56a6b1b0' => 
    array (
      0 => 'D:\\Other\\OpenServer\\domains\\myshop.local\\views\\default\\user.tpl',
      1 => 1472640316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c6b6f3b5b9d7_97753216 (Smarty_Internal_Template $_smarty_tpl) {
?>


<h1>Ваши регистрационные данные:</h1>
<table border="0">
    <tr>
        <td>Логин (email)</td>
        <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
    </tr>
    <tr>
        <td>Имя</td>
        <td><input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"></td>
    </tr>
    <tr>
        <td>Тел</td>
        <td><input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><textarea  id="newAdress" ><?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
</textarea></td>
    </tr>
    <tr>
        <td>Новый пароль</td>
        <td><input type="password" id="newPwd1" value=""></td>
    </tr>
    <tr>
        <td>Повтор пароля</td>
        <td><input type="password" id="newPwd2" value=""></td>
    </tr>
    <tr>
        <td>Для того чтобы сохранить данные введите текущий пароль</td>
        <td><input type="password" id="сurPwd" value=""></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="button" value="Сохранить изменения" onClick="updateUserData();"/></td>
    </tr>
</table><?php }
}
