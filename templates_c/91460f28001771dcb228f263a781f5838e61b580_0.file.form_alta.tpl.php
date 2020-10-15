<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-15 10:28:12
  from 'C:\xampp\htdocs\TPWeb\templates\form_alta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f88081c2c69c6_64115778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91460f28001771dcb228f263a781f5838e61b580' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPWeb\\templates\\form_alta.tpl',
      1 => 1602750355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f88081c2c69c6_64115778 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- formulario de alta de inmueble -->
<div class="row">
    <div class="col-sm-12">
        <h3>Panel de administración</h3>
    </div>
</div>
<div class="row">
    <h4></h4>
</div>
<div class="row">
    <div class="col-sm-12">

        <h4>Cargar nuevo inmueble</h4>
        <form action="new_single" method="POST" class="my-4">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input name="titulo" id ="titulo" type="text" class="form-control">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        
                        <label for="precio">Precio en dólares</label>
                        <input type="number" name="precio" id="precio">
                    </div>
                </div>
                
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion">
                    </div>
                    <div class="form-group">
                        
                        <label for="metros">Mts cuadrados</label>
                        <input type="number" name="metros" id="metros">
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
                            <option value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                    <div class="form-group">
                        
                        <label for="venta">En venta</label>
                        <select name="venta" id="venta" class="form-control">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        
                        <label for="alquiler">En alquiler</label>
                        <select name="alquiler" id="alquiler" class="form-control">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
    <?php }
}
