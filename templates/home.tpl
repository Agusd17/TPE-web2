{include 'header.tpl'}

    <main class="container-fluid"> <!-- inicio del contenido pricipal -->
        
        
        <div class="row">
            <div class="col-sm-12 img-header">
                <img class="header-img" src="resources/imgs/header.jpg" >
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1 col-md-2">
            </div>
            <div class="col-sm-10 col-md-8">
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <h3 class="text-center">Listado de inmuebles disponibles</h3>
                        <hr>
                    </div>
                    {if (!empty($inmuebles))}
                        {foreach from=$inmuebles item=single}
                        <div class="col-sm-12 col-md-6 col-lg-4 inmueble-card">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="ver/{$single->id}">
                                        <img class="single-mini-img" src="resources/imgs/inmueble.jpg" >
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <hr>
                                    <a href="ver/{$single->id}"><h4>{$single->titulo}</h4></a>
                                    <hr>
                                    <p class="precio">U$D: {$single->precio}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    {foreach from=$categorias item=categoria}
                                    {if ($categoria->id == $single->id_categoria)}
                                    <p><a class="cat-link" href="cat/{$categoria->nombre}">{$categoria->nombre}</a> | {$single->metros_cuadrados} m2</p>
                                    {/if}
                                    {/foreach}
                                    {if $single->alquiler == 1}
                                    <div class="single-alquiler text-center"><span>En alquiler</span></div>
                                    {/if}
                                    {if $single->venta == 1}
                                    <div class="single-venta text-center"><span>En venta</span></div>
                                    {/if}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="actions">
                                    <div class="col-sm-12">
                                        <a class="btn  btn-sm" href="ver/{$single->id}">VER</a>
                                        {if (isset($smarty.session.USER_ROLE) && $smarty.session.USER_ROLE == '1')}
                                        <a class="btn  btn-sm" href="modificar_single/{$single->id}">MODIFICAR</a>
                                        <a class="btn danger btn-sm" href="delete_single/{$single->id}">ELIMINAR</a>
                                        {/if}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {/foreach}
                        <br>
                        <div class="col-sm-12 text-center button-container">
                            {if ($pageNumber > 1)}
                            <a href="?page=1" class="badge badge-info" role="button"><< Primer página</a>
                            <a href="?page={$pageNumber-1}" class="badge badge-primary" role="button">< Página Anterior</a>
                            {/if}
                            {if ($pageNumber < $totalPages)}
                            <a href="?page={$pageNumber+1}" class="badge badge-primary" role="button">Página Siguiente ></a>
                            <a href="?page={$totalPages}"class="badge badge-info" role="button">Útlima Página >></a>
                            {/if}
                        </div>
                        <br>
                    {else}
                    <div class="col-sm-12 text-center">
                        <br>
                        <h5>No se encontraron inmuebles</h5>
                    </div>
                    {/if}
                </div>
            </div>
        </div>
            
        </main>
        {include file='footer.tpl'}
        