<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-15 08:32:42
  from 'C:\xampp\htdocs\TPWeb\templates\form_category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f87ed0a1f6794_56611313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9503ace8735bdf4eafc0b94b546ee01164fb7d1b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPWeb\\templates\\form_category.tpl',
      1 => 1602743173,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f87ed0a1f6794_56611313 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <div class="col-sm-12">
        <h3>Panel de administración</h3>
    </div>
</div>
<div class="row">
    <h4></h4>
</div>
<div class="row">
    <div class="col-sm-12">

        <h4>Cargar nueva categoría</h4>
        <form action="insertar_cat" method="POST" class="my-4">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="form-group">
                        <label for="titulo">Nombre</label>
                        <input name="nombre_cat" id ="nombre_cat" type="text" class="form-control">
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
    <?php }
}
