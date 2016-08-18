<?php
/* Smarty version 3.1.30, created on 2016-08-18 18:51:57
  from "D:\Other\OpenServer\domains\myshop.local\views\default\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57b5d99dc5f735_92601437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85c127234ab0d4e452539ed223bc63ecaa60e4fd' => 
    array (
      0 => 'D:\\Other\\OpenServer\\domains\\myshop.local\\views\\default\\header.tpl',
      1 => 1471535511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_57b5d99dc5f735_92601437 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link rel="stylesheet" href="<?php echo TemplateWebPath;?>
css/main.css" type="text/css">
</head>
<body>


<div id="header">
    <h1>My shop - Интернет магазин</h1>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:leftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<div id="centerColumn">
    centerColumn


<?php }
}
