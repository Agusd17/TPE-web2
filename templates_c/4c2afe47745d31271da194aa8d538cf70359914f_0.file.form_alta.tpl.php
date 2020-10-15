<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-01 22:30:10
  from 'C:\xampp\htdocs\web-tp-git\todo-list\templates\form_alta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f763c52958a22_22931519',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c2afe47745d31271da194aa8d538cf70359914f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web-tp-git\\todo-list\\templates\\form_alta.tpl',
      1 => 1601583970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f763c52958a22_22931519 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- formulario de alta de tarea -->
<form action="insertar" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Título</label>
                <input name="titulo" type="text" class="form-control">
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label>Prioridad</label>
                <select name="prioridad" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <textarea name="descripcion" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
<?php }
}
