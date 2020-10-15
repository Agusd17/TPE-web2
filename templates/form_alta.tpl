<!-- formulario de alta de inmueble -->
<div class="row">
    <div class="col-sm-12">
        <h3>Panel de administración</h3>
    </div>
</div>
<div class="row">
    <h4></h4>
</div>
<div class="row">
    <div class="col-sm-12">

        <h4>Cargar nuevo inmueble</h4>
        <form action="new_single" method="POST" class="my-4">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input name="titulo" id ="titulo" type="text" class="form-control">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        
                        <label for="precio">Precio en dólares</label>
                        <input type="number" name="precio" id="precio">
                    </div>
                </div>
                
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion">
                    </div>
                    <div class="form-group">
                        
                        <label for="metros">Mts cuadrados</label>
                        <input type="number" name="metros" id="metros">
                    </div>
                    <div class="form-group">
                        
                        <label for="categoria">Tipo de inmueble</label>
                        <select name="categoria" id="categoria" class="form-control">
                            {foreach from=$categorias item=categoria}
                            <option value="{$categoria->nombre}">{$categoria->nombre}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group">
                        
                        <label for="venta">En venta</label>
                        <select name="venta" id="venta" class="form-control">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        
                        <label for="alquiler">En alquiler</label>
                        <select name="alquiler" id="alquiler" class="form-control">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
    