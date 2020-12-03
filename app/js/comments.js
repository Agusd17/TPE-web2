"use strict"

const app = new Vue({
    el: "#app",
    methods: {
        onDelete(id) {
            deleteComment(id) 
        },
    },
    data: {
        comments: [],
        permission: false,
    }, 
});

document.addEventListener('DOMContentLoaded', e => {
    getComments();
    
    try { // este try funcionará solo si hay un usuaro logueado
        document.querySelector('#comment-form').addEventListener('submit', e => {
            e.preventDefault();
            addComment();
        });
        
        let rol = document.querySelector('input[name=rol]').value;
        if (rol === '1') {
            app.permission = true;
        } else {
            app.permission = false;
        }

    } catch (e) {
        console.log('parece no haber ningun usuario logueado...');
    }

    console.log(app.permission);

});

async function getComments() {
    try {
        let inmuebleID = document.querySelector('input[name=inmID]').value;
        const response = await fetch('api/comments/'+inmuebleID);
        console.log(response);
        const comments = await response.json();
        console.log(comments);
     
        // guardo los comentarios en mi array comments

        app.comments = comments;
        console.log(app.comments);
    } catch(e) {
        console.log(e);
    }
}


async function addComment() {

    // armo el comentario
    const comment = {
        id_inmueble: document.querySelector('input[name=inmID]').value,
        author: document.querySelector('input[name=authorName]').value,
        contenido: document.querySelector('textarea[name=contenido]').value,
        puntaje: document.querySelector('select[name=puntuacion]').value
    }
    if (comment.puntaje > 5 || comment.puntaje < 1) {

        console.log('puntaje fuera de rango');

    } else {

        
        try {
            const response = await fetch('api/comments' , {
                method: 'POST',
                headers: {'Content-Type': 'application/json'}, 
                body: JSON.stringify(comment)
            });
            
            const t = await response.json();
            // app.comments.push(t);
            getComments();
            
        } catch(e) {
            console.log(e);
        }
    }
        

}

async function deleteComment(id) {
    
    console.log('deleted the id: '+id);
    try {
        const response = await fetch('api/comments/'+id , {
            method: 'DELETE',
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify()
        });
        
        const t = await response.json();
        // app.comments.push(t);
        getComments();
        
    } catch(e) {
        console.log(e);
    }
}
