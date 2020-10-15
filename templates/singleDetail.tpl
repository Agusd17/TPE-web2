{include 'header.tpl'}

    <main class="container"> <!-- inicio del contenido pricipal -->
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <img class="single-img" src="resources/imgs/inmueble.jpg" >
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1>{$single->titulo}</h1>
                                {foreach from=$categorias item=categoria}
                                {if ($categoria->id == $single->id_categoria)}
                                <h4><a class="cat-link" href="cat/{$categoria->nombre}">{$categoria->nombre}</a> | {$single->metros_cuadrados} m2</h4>
                                {/if}
                                {/foreach}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Descripcion:</h6>
                                <p class="desc">{$single->descripcion}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-8 col-md-4">
                                <p>Precio: {$single->precio}</p>
                            </div>
                            <div class="col-sm-4">
                                {if $single->venta == '1'}
                                <p class="venta"> En venta </p>
                                {/if}
                            </div>
                            <div class="col-sm-4">
                                {if $single->alquiler == '1'}
                                <p class="alquiler"> En alquiler </p>
                                {/if}
                            </div>
                            <div class="col-sm-12">
                                <a href="{BASE_URL}home">volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>

    </main>

{include file='footer.tpl'}