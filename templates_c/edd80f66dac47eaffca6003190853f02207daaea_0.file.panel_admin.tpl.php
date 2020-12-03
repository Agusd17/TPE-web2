<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-03 03:33:23
  from 'C:\xampp\htdocs\TPWeb\templates\panel_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc84e730b7466_64720610',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edd80f66dac47eaffca6003190853f02207daaea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPWeb\\templates\\panel_admin.tpl',
      1 => 1606962800,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:form_alta.tpl' => 1,
    'file:form_category.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fc84e730b7466_64720610 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <main class="container-fluid"> <!-- inicio del contenido pricipal -->
        
        
        <div class="row">
            <div class="col-sm-12 img-header">
                <img class="header-img" src="resources/imgs/header.jpg" >
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <hr>
                <h3 class="text-center">Panel de administración de contenidos</h3>
                <h5 class="text-center">Por favor, elija una opción de abajo:</h5>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-0 col-md-2"></div>
            <div class="col-sm-12 col-md-8">
                <ul class="nav nav-tabs">
                    <li class="active admin-nav"><a data-toggle="tab" href="#menu0">Listado de inmuebles</a></li>
                    |
                    <li class="admin-nav"><a data-toggle="tab" href="#menu1">Nuevo inmueble</a></li>
                    |
                    <li class="admin-nav"><a data-toggle="tab" href="#menu2">Listado de categorías</a></li>
                    |
                    <li class="admin-nav"><a data-toggle="tab" href="#menu3">Nueva categoría</a></li>
                    |
                    <li class="admin-nav"><a data-toggle="tab" href="#menu4">Listado de usuarios</a></li>
                  </ul>
                  
                  <div class="tab-content">
                    <div id="menu0" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                <h3 class="text-center">Inmuebles</h3>
                                <hr>
                            </div>
                        </div>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inmuebles']->value, 'single');
$_smarty_tpl->tpl_vars['single']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['single']->value) {
$_smarty_tpl->tpl_vars['single']->do_else = false;
?>
                        <div class="row single-admin">
                            <div class="col-sm-12 col-md-7">
                                <span><?php echo $_smarty_tpl->tpl_vars['single']->value->titulo;?>
</span>
                            </div>
                            <div class="col-sm-12 col-md-5 text-right">
                                <a class="btn btn-sm" href="ver/<?php echo $_smarty_tpl->tpl_vars['single']->value->id;?>
">VER</a>
                                <a class="btn btn-sm" href="modificar_single/<?php echo $_smarty_tpl->tpl_vars['single']->value->id;?>
">MODIFICAR</a>
                                <a class="btn danger btn-sm" href="delete_single/<?php echo $_smarty_tpl->tpl_vars['single']->value->id;?>
">ELIMINAR</a>
                            </div>
                        </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                <h3 class="text-center">Nuevo inmueble</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-sm-12 col-md-8">
                                <?php $_smarty_tpl->_subTemplateRender('file:form_alta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                <h3 class="text-center">Categorías</h3>
                                <hr>
                            </div>
                        </div>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
                            <div class="row single-admin">
                                <div class="col-sm-12 col-md-7">
                                    <span><?php echo $_smarty_tpl->tpl_vars['cat']->value->nombre;?>
</span>
                                </div>
                                <div class="col-sm-12 col-md-5 text-right">
                                    <a class="btn btn-info btn-sm" href="modificar_cat/<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
">MODIFICAR</a>
                                    <a class="btn btn-danger btn-sm" 
                                        onclick="if (confirm('¡CUIDADO! Se eliminarán también todos los registros asociados a la categoría')) window.location.href='eliminar_cat/<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
'">
                                        ELIMINAR</a>
                                </div>
                            </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                <h3 class="text-center">Nueva categoría</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-sm-12 col-md-8">
                                <?php $_smarty_tpl->_subTemplateRender('file:form_category.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div id="menu4" class="tab-pane fade">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                <h3 class="text-center">Usuarios</h3>
                                <hr>
                            </div>
                        </div>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                            <div class="row single-admin">
                                <div class="col-sm-12 col-md-4">
                                    <span><?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</span>
                                </div>
                                <div class="col-sm-12 col-md-4 text-center">
                                    <?php if (($_smarty_tpl->tpl_vars['user']->value->role === '0')) {?>
                                    <span class="badge badge-primary">No es administrador</span>
                                    <?php } elseif (($_smarty_tpl->tpl_vars['user']->value->role === '1')) {?>
                                    <span class="badge badge-success">Es administrador</span>
                                    <?php } else { ?>
                                    <span class="badge badge-danger">Rol fuera de rango</span>
                                    <?php }?>
                                </div>
                                <div class="col-sm-12 col-md-4 text-right">
                                    <?php if ((($_smarty_tpl->tpl_vars['user']->value->role === '0') && ($_SESSION['ID_USER'] != $_smarty_tpl->tpl_vars['user']->value->id))) {?>
                                    <a class="btn btn-primary btn-sm" 
                                        onclick="if (confirm('¡CUIDADO! Está a punto de otorgarle permisos de administrador al usuario <?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
')) 
                                        window.location.href='give_admin/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
'">
                                        Dar Admin</a>
                                    <?php } elseif (($_SESSION['ID_USER'] === $_smarty_tpl->tpl_vars['user']->value->id)) {?> 
                                    <span class="badge badge-secondary">No puede cambiar sus propios permisos!</span>
                                    <?php }?>
                                    <?php if ((($_smarty_tpl->tpl_vars['user']->value->role === '1') && ($_SESSION['ID_USER'] != $_smarty_tpl->tpl_vars['user']->value->id))) {?>
                                    <a class="btn btn-warning btn-sm" 
                                        onclick="if (confirm('¡CUIDADO! Está a punto de quitarle permisos de administrador al usuario <?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
')) 
                                        window.location.href='remove_admin/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
'">
                                        Quitar Admin</a>
                                    <?php }?>
                                    <?php if (($_SESSION['ID_USER'] != $_smarty_tpl->tpl_vars['user']->value->id)) {?>
                                    <a class="btn btn-danger btn-sm" 
                                        onclick="if (confirm('¡CUIDADO! Está a punto de borrar el usuario <?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
')) 
                                        window.location.href='remove_user/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
'">
                                        Borrar</a>
                                    <?php }?>
                                </div>
                            </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                </div>
                
            </div>
        </div>
    </main>
    <?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
