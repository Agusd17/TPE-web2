{include 'header.tpl'}

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
                    <li class=" admin-nav"><a data-toggle="tab" href="#menu1">Nuevo inmueble</a></li>
                    |
                    <li class=" admin-nav"><a data-toggle="tab" href="#menu2">Listado de categorías</a></li>
                    |
                    <li class=" admin-nav"><a data-toggle="tab" href="#menu3">Nueva categoría</a></li>
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
                            {foreach from=$inmuebles item=single}
                            <div class="row single-admin">
                                <div class="col-sm-12 col-md-7">
                                    <span>{$single->titulo}</span>
                                </div>
                                <div class="col-sm-12 col-md-5 text-right">
                                    <a class="btn btn-sm" href="ver/{$single->id}">VER</a>
                                    <a class="btn btn-sm" href="modificar_single/{$single->id}">MODIFICAR</a>
                                    <a class="btn danger btn-sm" href="delete_single/{$single->id}">ELIMINAR</a>
                                </div>
                            </div>
                            {/foreach}
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
                                {include 'form_alta.tpl'}
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
                        {foreach from=$categorias item=cat}
                            <div class="row single-admin">
                                <div class="col-sm-12 col-md-7">
                                    <span>{$cat->nombre}</span>
                                </div>
                                <div class="col-sm-12 col-md-5 text-right">
                                    <a class="btn btn-info btn-sm" href="modificar_cat/{$cat->id}">MODIFICAR</a>
                                    <a class="btn btn-danger btn-sm" 
                                        onclick="if (confirm('¡CUIDADO! Se eliminarán también todos los registros asociados a la categoría')) window.location.href='eliminar_cat/{$cat->id}'">
                                        ELIMINAR</a>
                                </div>
                            </div>
                            {/foreach}
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
                                {include 'form_category.tpl'}
                                <hr>
                            </div>
                        </div>
                    </div>
                  </div>
                
            </div>
        </div>
    </main>
    {include file='footer.tpl'}