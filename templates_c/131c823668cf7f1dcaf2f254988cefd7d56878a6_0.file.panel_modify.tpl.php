<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-15 10:30:25
  from 'C:\xampp\htdocs\TPWeb\templates\panel_modify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8808a1548120_65324149',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '131c823668cf7f1dcaf2f254988cefd7d56878a6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPWeb\\templates\\panel_modify.tpl',
      1 => 1602750611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f8808a1548120_65324149 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <main class="container"> <!-- inicio del contenido pricipal -->
        <div class="row">
            <div class="col-sm-12">
                <?php if (((isset($_smarty_tpl->tpl_vars['modCat']->value)))) {?>
                    <form action="modCat/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id;?>
" method="POST" class="my-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_cat">Modifique el nombre de la categoría</label>
                                    <input type="text" name="nombre_cat" id="nombre_cat" value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button> 
                    </form>
                <?php }?>
                <?php if (((isset($_smarty_tpl->tpl_vars['modInm']->value)))) {?>
                <form action="modInm/<?php echo $_smarty_tpl->tpl_vars['inmueble']->value->id;?>
" method="POST" class="my-4">
                    <div class="row">
                        <div class="col-md-12 col-lg-9">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input name="titulo" id ="titulo" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['inmueble']->value->titulo;?>
">
                                <label for="descripcion">Descripcion</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" rows="3"><?php echo $_smarty_tpl->tpl_vars['inmueble']->value->descripcion;?>
</textarea>
                            </div>
                            <div class="form-group">
                                
                                <label for="precio">Precio en dólares</label>
                                <input type="number" name="precio" id="precio" value="<?php echo $_smarty_tpl->tpl_vars['inmueble']->value->precio;?>
">
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-lg-3">
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" id="direccion" value="<?php echo $_smarty_tpl->tpl_vars['inmueble']->value->direccion;?>
">
                            </div>
                            <div class="form-group">
                                
                                <label for="metros">Mts cuadrados</label>
                                <input type="number" name="metros" id="metros" value="<?php echo $_smarty_tpl->tpl_vars['inmueble']->value->metros_cuadrados;?>
">
                            </div>
                            <div class="form-group">
                                
                                <label for="categoria">Tipo de inmueble</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
                                        <?php if (($_smarty_tpl->tpl_vars['inmueble']->value->id_categoria == $_smarty_tpl->tpl_vars['categoria']->value->id)) {?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
" selected><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</option>
                                        <?php } else { ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</option>
                                        <?php }?>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                            <div class="form-group">
                                
                                <label for="venta">En venta</label>
                                <select name="venta" id="venta" class="form-control">
                                    <?php if (($_smarty_tpl->tpl_vars['inmueble']->value->venta == 1)) {?>
                                    <option value="1" selected>Si</option>
                                    <option value="0">No</option>
                                    <?php } else { ?>
                                    <option value="1">Si</option>
                                    <option value="0" selected>No</option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                
                                <label for="alquiler">En alquiler</label>
                                <select name="alquiler" id="alquiler" class="form-control">
                                    <?php if (($_smarty_tpl->tpl_vars['inmueble']->value->alquiler == 1)) {?>
                                    <option value="1" selected>Si</option>
                                    <option value="0">No</option>
                                    <?php } else { ?>
                                    <option value="1">Si</option>
                                    <option value="0" selected>No</option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button> 
                </form>
                <?php }?>
            </div>
        </div>
    </main>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
