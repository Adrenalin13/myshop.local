<?php
/* Smarty version 3.1.30, created on 2016-08-23 12:01:58
  from "D:\OpenServer\domains\myshop.local\views\default\product.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57bc110683dc53_55821904',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c76709f0fa0b090ce5e92b080bc6509747632e44' => 
    array (
      0 => 'D:\\OpenServer\\domains\\myshop.local\\views\\default\\product.tpl',
      1 => 1471942917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57bc110683dc53_55821904 (Smarty_Internal_Template $_smarty_tpl) {
?>


<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" width="575">
    Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>


<a href="#" alt="Добавить в карзину">Добавить в карзину</a>
<p>Описание:  <br><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p><?php }
}
