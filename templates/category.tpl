{include 'header.tpl'}

<main class="container-fluid">
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
                        <h3 class="text-center">Inmuebles de tipo {$categoria}</h3>
                        <hr>
                    </div>
                    {if ($inmuebles == '')}
                        <div class="col-sm-12">
                            <h4 class="text-center">No existen inmuebles de este tipo actualmente</h4>
                        </div>
                    {else}
                        {foreach from=$inmuebles item=single}
                        <div class="col-sm-12 col-md-6 col-lg-4 inmueble-card">
                            <div class="row">
                                <div class="col-sm-12">
                                    <img class="single-mini-img" src="resources/imgs/inmueble.jpg" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <hr>
                                    <h4>{$single->titulo}</h4>
                                    <hr>
                                    <p class="precio">U$D: {$single->precio}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p><a class="cat-link" href="cat/{$categoria}">{$categoria}</a> | {$single->metros_cuadrados} m2</p>
                                    {if $single->alquiler == 1}
                                    <div class="single-alquiler text-center"><span>En alquiler</span></div>
                                    {/if}
                                    {if $single->venta == 1}
                                    <div class="single-venta text-center"><span>En venta</span></div>
                                    {/if}
                                </div>
                            </div>
                            {if (isset($smarty.session.USER_ROLE) && $smarty.session.USER_ROLE == '1')}
                            <hr>
                            <div class="row">
                                <div class="actions">
                                    <div class="col-sm-12">
                                        <a class="btn  btn-sm" href="ver/{$single->id}">VER</a>
                                        <a class="btn  btn-sm" href="modificar/{$single->id}">MODIFICAR</a>
                                        <a class="btn danger btn-sm" href="delete_single/{$single->id}">ELIMINAR</a>
                                    </div>
                                </div>
                            </div>
                            {/if}
                        </div>
                        {/foreach}
                    {/if}
                </div>
            </div>
        </div>
    </main>
    {include file='footer.tpl'}