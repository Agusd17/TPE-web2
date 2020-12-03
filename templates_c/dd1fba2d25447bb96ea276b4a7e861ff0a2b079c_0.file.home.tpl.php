<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-03 04:15:57
  from 'C:\xampp\htdocs\TPWeb\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc8586d7ce780_96976133',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd1fba2d25447bb96ea276b4a7e861ff0a2b079c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPWeb\\templates\\home.tpl',
      1 => 1606965354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fc8586d7ce780_96976133 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <main class="container-fluid"> <!-- inicio del contenido pricipal -->
        
        
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
                        <h3 class="text-center">Listado de inmuebles disponibles</h3>
                        <hr>
                    </div>
                    <?php if ((!empty($_smarty_tpl->tpl_vars['inmuebles']->value))) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inmuebles']->value, 'single');
$_smarty_tpl->tpl_vars['single']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['single']->value) {
$_smarty_tpl->tpl_vars['single']->do_else = false;
?>
                        <div class="col-sm-12 col-md-6 col-lg-4 inmueble-card">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="ver/<?php echo $_smarty_tpl->tpl_vars['single']->value->id;?>
">
                                        <img class="single-mini-img" src="resources/imgs/inmueble.jpg" >
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <hr>
                                    <a href="ver/<?php echo $_smarty_tpl->tpl_vars['single']->value->id;?>
"><h4><?php echo $_smarty_tpl->tpl_vars['single']->value->titulo;?>
</h4></a>
                                    <hr>
                                    <p class="precio">U$D: <?php echo $_smarty_tpl->tpl_vars['single']->value->precio;?>
</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
                                    <?php if (($_smarty_tpl->tpl_vars['categoria']->value->id == $_smarty_tpl->tpl_vars['single']->value->id_categoria)) {?>
                                    <p><a class="cat-link" href="cat/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</a> | <?php echo $_smarty_tpl->tpl_vars['single']->value->metros_cuadrados;?>
 m2</p>
                                    <?php }?>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <?php if ($_smarty_tpl->tpl_vars['single']->value->alquiler == 1) {?>
                                    <div class="single-alquiler text-center"><span>En alquiler</span></div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['single']->value->venta == 1) {?>
                                    <div class="single-venta text-center"><span>En venta</span></div>
                                    <?php }?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="actions">
                                    <div class="col-sm-12">
                                        <a class="btn  btn-sm" href="ver/<?php echo $_smarty_tpl->tpl_vars['single']->value->id;?>
">VER</a>
                                        <?php if (((isset($_SESSION['USER_ROLE'])) && $_SESSION['USER_ROLE'] == '1')) {?>
                                        <a class="btn  btn-sm" href="modificar_single/<?php echo $_smarty_tpl->tpl_vars['single']->value->id;?>
">MODIFICAR</a>
                                        <a class="btn danger btn-sm" href="delete_single/<?php echo $_smarty_tpl->tpl_vars['single']->value->id;?>
">ELIMINAR</a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                    <div class="col-sm-12 text-center">
                        <br>
                        <h5>No se encontraron inmuebles</h5>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
            
        </main>
        <?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php }
}
