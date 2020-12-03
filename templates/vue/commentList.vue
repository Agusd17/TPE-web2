{literal}
<hr>
<h4>Comentarios:</h4>
<section id="app">
    <div v-if="comments == ''" class="no-comments">
        <p>
            Aún no existen comentarios (sé el primero!)
        </p>
    </div>
    <ul class="list-group mt-5" v-if="comments != ''">
        <li v-for="comment in comments"
            class="list-group-item"
            > 
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <p>Escrito por: <strong>{{ comment.author }}</strong></p>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <span class="badge" 
                    :class="{'badge-danger': comment.puntaje <= 2, 'badge-warning': comment.puntaje == 3, 'badge-success': comment.puntaje >= 4}"
                    >{{ comment.puntaje }} Estrellas</span>
                </div>
                <hr>
                <div class="col-sm-12 comment-box">
                    <p>{{ comment.contenido }}</p>
                </div>
                <div class="col-sm-12 text-right">
                    <button v-if="permission === true" id="detele-comment" v-on:click="onDelete(comment.id)" class="btn btn-danger">Borrar comentario</button>
                </div>
            </div>
        </li>
    </ul>
</section>
{/literal}