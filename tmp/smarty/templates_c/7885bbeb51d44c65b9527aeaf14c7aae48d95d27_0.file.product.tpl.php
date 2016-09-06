<?php
/* Smarty version 3.1.30, created on 2016-09-06 12:42:23
  from "E:\Other\OpenServer\domains\myshop.local\views\default\product.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57ce8f7fe6a681_34151824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7885bbeb51d44c65b9527aeaf14c7aae48d95d27' => 
    array (
      0 => 'E:\\Other\\OpenServer\\domains\\myshop.local\\views\\default\\product.tpl',
      1 => 1472110892,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ce8f7fe6a681_34151824 (Smarty_Internal_Template $_smarty_tpl) {
?>


<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" width="575">
    Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>

<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?>class="hideme"<?php }?> href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Удалить из корзины">Удалить из корзины</a>
<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?>class="hideme"<?php }?> href="#" onClick="addToCart (<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Добавить в карзину">Добавить в карзину</a>
<p>Описание:  <br><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p><?php }
}
