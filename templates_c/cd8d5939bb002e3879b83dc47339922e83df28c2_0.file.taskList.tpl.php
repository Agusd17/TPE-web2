<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-01 22:30:10
  from 'C:\xampp\htdocs\web-tp-git\todo-list\templates\taskList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f763c52892124_65284583',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd8d5939bb002e3879b83dc47339922e83df28c2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web-tp-git\\todo-list\\templates\\taskList.tpl',
      1 => 1601583970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:form_alta.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f763c52892124_65284583 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo BASE_URL;?>
">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOList</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>

    <?php $_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <main class="container"> <!-- inicio del contenido pricipal -->
        
        <?php $_smarty_tpl->_subTemplateRender('file:form_alta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        
        <ul class='list-group mt-5'>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks']->value, 'task');
$_smarty_tpl->tpl_vars['task']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['task']->value) {
$_smarty_tpl->tpl_vars['task']->do_else = false;
?>
            <li class='list-group-item d-flex justify-content-between'>
                <div class='info'>
                    <strong><?php echo $_smarty_tpl->tpl_vars['task']->value->titulo;?>
</strong> | <?php echo $_smarty_tpl->tpl_vars['task']->value->descripcion;?>
 | <?php echo $_smarty_tpl->tpl_vars['task']->value->finalizada;?>
 
                </div>

                <div class='actions'>
                    <a class='btn btn-success btn-sm' href="ver/<?php echo $_smarty_tpl->tpl_vars['task']->value->id;?>
">VER</a>
                    <a class='btn btn-info btn-sm' href="finalizar/<?php echo $_smarty_tpl->tpl_vars['task']->value->id;?>
">FINALIZAR</a>
                    <a class='btn btn-danger btn-sm' href="eliminar/<?php echo $_smarty_tpl->tpl_vars['task']->value->id;?>
">ELIMINAR</a>
                </div>
            </li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>

    </main>
    <?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html>    
<?php }
}
