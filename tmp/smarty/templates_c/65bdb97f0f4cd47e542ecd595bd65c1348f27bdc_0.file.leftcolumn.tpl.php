<?php
/* Smarty version 3.1.30, created on 2016-08-19 13:44:51
  from "D:\Other\OpenServer\domains\myshop.local\views\default\leftcolumn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57b6e3234182d5_20694114',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65bdb97f0f4cd47e542ecd595bd65c1348f27bdc' => 
    array (
      0 => 'D:\\Other\\OpenServer\\domains\\myshop.local\\views\\default\\leftcolumn.tpl',
      1 => 1471603370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57b6e3234182d5_20694114 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
            <a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>
</div><?php }
}
