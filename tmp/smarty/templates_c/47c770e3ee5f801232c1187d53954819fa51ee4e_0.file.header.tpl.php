<?php
/* Smarty version 3.1.30, created on 2016-08-23 12:43:02
  from "D:\OpenServer\domains\myshop.local\views\default\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57bc1aa65e30c4_58262134',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47c770e3ee5f801232c1187d53954819fa51ee4e' => 
    array (
      0 => 'D:\\OpenServer\\domains\\myshop.local\\views\\default\\header.tpl',
      1 => 1471945378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_57bc1aa65e30c4_58262134 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link rel="stylesheet" href="<?php echo TEMPLATE_WEB_PATH;?>
css/main.css" type="text/css">
</head>
<body>


<div id="header">
    <a href="http://myshop.local"><h1>My shop - Интернет магазин</h1></a>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:leftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<div id="centerColumn">

<?php }
}
