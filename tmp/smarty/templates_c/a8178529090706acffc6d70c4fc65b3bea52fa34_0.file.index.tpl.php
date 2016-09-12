<?php
/* Smarty version 3.1.30, created on 2016-09-12 11:49:46
  from "E:\Other\OpenServer\domains\myshop.local\views\texturia\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d66c2ae249a7_94075058',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8178529090706acffc6d70c4fc65b3bea52fa34' => 
    array (
      0 => 'E:\\Other\\OpenServer\\domains\\myshop.local\\views\\texturia\\index.tpl',
      1 => 1473670182,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d66c2ae249a7_94075058 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="joomcat">
    <div class="joomcat96_row">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
        <div class="joomcat65_imgct" style="width: 216px !important; margin-right:10px;">
            <div class="joomcat96_img cat_img">
                <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                    <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="100"/>
                </a>
            </div>
            <div style="padding-bottom:10px;padding-top:0px;" class="joomcat96_txt">
                <ul>
                    <li><a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
                </ul>
            </div>
        </div>

        <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
        <div class="joomcat96_clr"></div>
    </div>

    <div class="joomcat96_row">
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>
</div><?php }
}
