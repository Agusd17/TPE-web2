<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-15 10:37:15
  from 'C:\xampp\htdocs\TPWeb\templates\singleDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f880a3b3ac229_68264235',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd75d03e4a0011b870321a44f5d4eb0e07059a61b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPWeb\\templates\\singleDetail.tpl',
      1 => 1602751033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f880a3b3ac229_68264235 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <main class="container"> <!-- inicio del contenido pricipal -->
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <img class="single-img" src="resources/imgs/inmueble.jpg" >
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1><?php echo $_smarty_tpl->tpl_vars['single']->value->titulo;?>
</h1>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
                                <?php if (($_smarty_tpl->tpl_vars['categoria']->value->id == $_smarty_tpl->tpl_vars['single']->value->id_categoria)) {?>
                                <h4><a class="cat-link" href="cat/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</a> | <?php echo $_smarty_tpl->tpl_vars['single']->value->metros_cuadrados;?>
 m2</h4>
                                <?php }?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Descripcion:</h6>
                                <p class="desc"><?php echo $_smarty_tpl->tpl_vars['single']->value->descripcion;?>
</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-8 col-md-4">
                                <p>Precio: <?php echo $_smarty_tpl->tpl_vars['single']->value->precio;?>
</p>
                            </div>
                            <div class="col-sm-4">
                                <?php if ($_smarty_tpl->tpl_vars['single']->value->venta == '1') {?>
                                <p class="venta"> En venta </p>
                                <?php }?>
                            </div>
                            <div class="col-sm-4">
                                <?php if ($_smarty_tpl->tpl_vars['single']->value->alquiler == '1') {?>
                                <p class="alquiler"> En alquiler </p>
                                <?php }?>
                            </div>
                            <div class="col-sm-12">
                                <a href="<?php echo BASE_URL;?>
home">volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>

    </main>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
