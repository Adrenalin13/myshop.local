<?php
/* Smarty version 3.1.30, created on 2016-08-24 17:55:54
  from "D:\OpenServer\domains\myshop.local\views\default\product.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57bdb57a06ce30_26898126',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c76709f0fa0b090ce5e92b080bc6509747632e44' => 
    array (
      0 => 'D:\\OpenServer\\domains\\myshop.local\\views\\default\\product.tpl',
      1 => 1472050519,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57bdb57a06ce30_26898126 (Smarty_Internal_Template $_smarty_tpl) {
?>


<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" width="575">
    Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>

<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProducts']->value['id'];?>
); return false;" alt="Удалить из корзины">Удалить из корзины</a>
<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" href="#" onClick="addToCart (<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Добавить в карзину">Добавить в карзину</a>
<p>Описание:  <br><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p><?php }
}
