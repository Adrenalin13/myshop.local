<?php
/* Smarty version 3.1.30, created on 2016-09-06 17:54:34
  from "E:\Other\OpenServer\domains\myshop.local\views\admin\adminHeader.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57ced8aac0bea7_22082219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67c8afa79be9799a8de1b064bad90e72ad29257d' => 
    array (
      0 => 'E:\\Other\\OpenServer\\domains\\myshop.local\\views\\admin\\adminHeader.tpl',
      1 => 1473173671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:adminLeftcolumn.tpl' => 1,
  ),
),false)) {
function content_57ced8aac0bea7_22082219 (Smarty_Internal_Template $_smarty_tpl) {
?>

<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link rel="stylesheet" href="<?php echo TEMPLATE_ADMIN_WEB_PATH;?>
css/main.css" type="text/css">
    <?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery-3.1.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLATE_ADMIN_WEB_PATH;?>
js/admin.js"><?php echo '</script'; ?>
>
</head>

<body>
<div id="header">
    <h1>Управление сайтом</h1>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:adminLeftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div id="centerColumn"><?php }
}
