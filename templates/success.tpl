{include 'header.tpl'}

    <main class="container">
        <div class="row">
            <div class="col-sm-0 col-md-3"></div>
            <div class="col-sm12 col-md-6 text-center">
                <hr>
                <h1>EXITO!</h1>
                <hr>
                <h2> {$msg} </h2>
                {if (isset($smarty.session.USER_ROLE) && ($smarty.session.USER_ROLE === '1'))}
                <div class="go-back">
                    <a href="panel" class="btn btn-primary" role="button">Volver al panel de Administración</a>
                </div>
                {else}
                <div class="go-back">
                    <a href="home" class="btn btn-primary" role="button">Volver al inicio</a>
                </div>
                {/if}
            </div>
        </div>
    </main>
    
{include 'footer.tpl'}