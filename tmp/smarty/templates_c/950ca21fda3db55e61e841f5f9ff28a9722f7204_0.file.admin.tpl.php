<?php
/* Smarty version 3.1.30, created on 2016-09-06 18:49:23
  from "E:\Other\OpenServer\domains\myshop.local\views\admin\admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57cee583ef10a1_78317852',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '950ca21fda3db55e61e841f5f9ff28a9722f7204' => 
    array (
      0 => 'E:\\Other\\OpenServer\\domains\\myshop.local\\views\\admin\\admin.tpl',
      1 => 1473176940,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57cee583ef10a1_78317852 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="blockNewCategory">
    Новая категория:
    <input type="text" name="newCategoryName" id="newCategoryName" value=""><br>

    Является подкатегорией для
    <select name="generalCatId">
        <option value="0">Главная категория
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </select>
    <br>

    <input type="button" onclick="newCategory();" value="Добавить категорию">
</div><?php }
}
