<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-15 07:42:46
  from 'C:\xampp\htdocs\TPWeb\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f87e1562dada8_52638439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f299e8a0d30766e5089ce05e7470bfb13a303a5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPWeb\\templates\\header.tpl',
      1 => 1602740560,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f87e1562dada8_52638439 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo BASE_URL;?>
">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inmobiliaria D'llano</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="resources/css/style.css">

    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-main main-nav">
            <a class="navbar-brand" href="#">Inmobiliaria D'llano</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item nav-button-main">
                  <a class="nav-link" href="#">Home</a>
                </li>
                <li class="dropdown nav-button-main">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Categorías</span> <span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-main">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
                    <li><a class="nav-link" href="cat/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</a></li>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>
              </li>
                <li class="nav-item nav-button-main">
                  <?php if (((isset($_SESSION['USER_ROLE'])) && $_SESSION['USER_ROLE'] == '1')) {?>
                  <a class="nav-link" href="panel">Panel Admin</a>
                </li>
                <li class="nav-item nav-button-main">
                  <a class="nav-link" href="logout">Salir</a>
                  <?php } else { ?>
                  <a class="nav-link" href="login">Login</a>
                  <?php }?>
                </li>
              </ul>
            </div>
        </nav>
    </header><?php }
}
