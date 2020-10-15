<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-15 06:10:12
  from 'C:\xampp\htdocs\TPWeb\templates\form_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f87cba42172a7_46842363',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9682369a383079437c4b3901e2f64f9750fd566' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPWeb\\templates\\form_login.tpl',
      1 => 1602735010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f87cba42172a7_46842363 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <main class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form method="POST" action="verify_login">
                        <h4><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h4>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Ingrese su email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña..." name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </main>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
