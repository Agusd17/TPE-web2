<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-15 10:37:18
  from 'C:\xampp\htdocs\TPWeb\templates\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f880a3e6ae6a8_22653581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5adeb29bff50f352f442b827601ef8fa70ca1a63' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPWeb\\templates\\category.tpl',
      1 => 1602750404,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f880a3e6ae6a8_22653581 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<main class="container-fluid">
    <div class="row">
        <div class="col-sm-12 img-header">
            <img class="header-img" src="resources/imgs/header.jpg" >
        </div>
    </div>
    <div class="row">
            <div class="col-sm-1 col-md-2">
            </div>
            <div class="col-sm-10 col-md-8">
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <h3 class="text-center">Inmuebles de tipo <?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>
</h3>
                        <hr>
                    </div>
                    <?php if (($_smarty_tpl->tpl_vars['inmuebles']->value == '')) {?>
                        <div class="col-sm-12">
                            <h4 class="text-center">No existen inmuebles de este tipo actualmente</h4>
                        </div>
                    <?php } else { ?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inmuebles']->value, 'single');
$_smarty_tpl->tpl_vars['single']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['single']->value) {
$_smarty_tpl->tpl_vars['single']->do_else = false;
?>
                        <div class="col-sm-12 col-md-6 col-lg-4 inmueble-card">
                            <div class="row">
                                <div class="col-sm-12">
                                    <img class="single-mini-img" src="resources/imgs/inmueble.jpg" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <hr>
                                    <h4><?php echo $_smarty_tpl->tpl_vars['single']->value->titulo;?>
</h4>
                                    <hr>
                                    <p class="precio">U$D: <?php echo $_smarty_tpl->tpl_vars['single']->value->precio;?>
</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p><a class="cat-link" href="cat/<?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>
</a> | <?php echo $_smarty_tpl->tpl_vars['single']->value->metros_cuadrados;?>
 m2</p>
                                    <?php if ($_smarty_tpl->tpl_vars['single']->value->alquiler == 1) {?>
                                    <div class="single-alquiler text-center"><span>En alquiler</span></div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['single']->value->venta == 1) {?>
                                    <div class="single-venta text-center"><span>En venta</span></div>
                                    <?php }?>
                                </div>
                            </div>
                            <?php if (((isset($_SESSION['USER_ROLE'])) && $_SESSION['USER_ROLE'] == '1')) {?>
                            <hr>
                            <div class="row">
                                <div class="actions">
                                    <div class="col-sm-12">
                                        <a class="btn  btn-sm" href="ver/<?php echo $_smarty_tpl->tpl_vars['single']->value->id;?>
">VER</a>
                                        <a class="btn  btn-sm" href="modificar/<?php echo $_smarty_tpl->tpl_vars['single']->value->id;?>
">MODIFICAR</a>
                                        <a class="btn danger btn-sm" href="delete_single/<?php echo $_smarty_tpl->tpl_vars['single']->value->id;?>
">ELIMINAR</a>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
                </div>
            </div>
        </div>
    </main>
    <?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
