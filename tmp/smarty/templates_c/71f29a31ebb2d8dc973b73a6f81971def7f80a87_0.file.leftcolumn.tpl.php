<?php
/* Smarty version 3.1.30, created on 2016-08-24 16:49:04
  from "D:\OpenServer\domains\myshop.local\views\default\leftcolumn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57bda5d05af793_02301733',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71f29a31ebb2d8dc973b73a6f81971def7f80a87' => 
    array (
      0 => 'D:\\OpenServer\\domains\\myshop.local\\views\\default\\leftcolumn.tpl',
      1 => 1472046541,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57bda5d05af793_02301733 (Smarty_Internal_Template $_smarty_tpl) {
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

<div class="menuCaption">Корзина</div>
    <a href="/cart/" title="Перейти в корзину">В корзине</a>
    <span id="cartCntItems">
        <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?> <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>
 <?php } else { ?>пусто<?php }?>
    </span>
</div><?php }
}
