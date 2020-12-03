<hr>
<h5>Dejar un comentario...</h5>
<form action="add-comment" id="comment-form" class="my-4">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <textarea name="contenido" class="form-control" id="contenido" cols="30" rows="3"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 text-right">
                <select name="puntuacion" class="form-control" id="puntuacion">
                    <option default selected value="1">1 estrella</option>
                    <option value="2">2 estrellas</option>
                    <option value="3">3 estrellas</option>
                    <option value="4">4 estrellas</option>
                    <option value="5">5 estrellas</option>
                </select>
            </div>
            <div class="col-sm-6 text-left">
                <button type="submit" class="btn btn-primary">Enviar comentario</button>
            </div>
        </div>
    </div>
</form>