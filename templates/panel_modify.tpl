{include 'header.tpl'}

    <main class="container"> <!-- inicio del contenido pricipal -->
        <div class="row">
            <div class="col-sm-12">
                {if (isset($modCat))}
                    <form action="modCat/{$categoria->id}" method="POST" class="my-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_cat">Modifique el nombre de la categoría</label>
                                    <input type="text" name="nombre_cat" id="nombre_cat" value="{$categoria->nombre}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button> 
                    </form>
                {/if}
                {if (isset($modInm))}
                <form action="modInm/{$inmueble->id}" method="POST" class="my-4">
                    <div class="row">
                        <div class="col-md-12 col-lg-9">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input name="titulo" id ="titulo" type="text" class="form-control" value="{$inmueble->titulo}">
                                <label for="descripcion">Descripcion</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{$inmueble->descripcion}</textarea>
                            </div>
                            <div class="form-group">
                                
                                <label for="precio">Precio en dólares</label>
                                <input type="number" name="precio" id="precio" value="{$inmueble->precio}">
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-lg-3">
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" id="direccion" value="{$inmueble->direccion}">
                            </div>
                            <div class="form-group">
                                
                                <label for="metros">Mts cuadrados</label>
                                <input type="number" name="metros" id="metros" value="{$inmueble->metros_cuadrados}">
                            </div>
                            <div class="form-group">
                                
                                <label for="categoria">Tipo de inmueble</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    {foreach from=$categorias item=categoria}
                                        {if ($inmueble->id_categoria == $categoria->id)}
                                        <option value="{$categoria->nombre}" selected>{$categoria->nombre}</option>
                                        {else}
                                        <option value="{$categoria->nombre}">{$categoria->nombre}</option>
                                        {/if}
                                    {/foreach}
                                </select>
                            </div>
                            <div class="form-group">
                                
                                <label for="venta">En venta</label>
                                <select name="venta" id="venta" class="form-control">
                                    {if ($inmueble->venta == 1)}
                                    <option value="1" selected>Si</option>
                                    <option value="0">No</option>
                                    {else}
                                    <option value="1">Si</option>
                                    <option value="0" selected>No</option>
                                    {/if}
                                </select>
                            </div>
                            <div class="form-group">
                                
                                <label for="alquiler">En alquiler</label>
                                <select name="alquiler" id="alquiler" class="form-control">
                                    {if ($inmueble->alquiler == 1)}
                                    <option value="1" selected>Si</option>
                                    <option value="0">No</option>
                                    {else}
                                    <option value="1">Si</option>
                                    <option value="0" selected>No</option>
                                    {/if}
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button> 
                </form>
                {/if}
            </div>
        </div>
    </main>

{include file='footer.tpl'}