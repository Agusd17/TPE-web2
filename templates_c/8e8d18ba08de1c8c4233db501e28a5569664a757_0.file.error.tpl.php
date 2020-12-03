<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-02 21:02:13
  from 'C:\xampp\htdocs\TPWeb\templates\error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc7f2c57a8899_29434670',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e8d18ba08de1c8c4233db501e28a5569664a757' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPWeb\\templates\\error.tpl',
      1 => 1606939330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fc7f2c57a8899_29434670 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <main class="container">
        <div class="row">
            <div class="col-sm-0 col-md-3"></div>
            <div class="col-sm12 col-md-6 text-center">
                <hr>
                <h1> ERROR!</h1>
                <hr>
                <h2> <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
 </h2>
                <?php if (((isset($_SESSION['USER_ROLE'])) && ($_SESSION['USER_ROLE'] === '1'))) {?>
                <div class="go-back">
                    <a href="panel" class="btn btn-primary" role="button">Volver al panel de Administración</a>
                </div>
                <?php }?>
            </div>
        </div>
    </main>
    
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
