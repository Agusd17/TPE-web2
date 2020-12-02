{include 'header.tpl'}
        <main class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form method="POST" action="on_register">
                        <br>
                        <h4>{$message}</h4>
                        <hr>
                        <div class="form-group">
                            <label for="register-name">Nombre de usuario</label>
                            <input type="name" class="form-control" id="register-name" placeholder="Ingrese su nombre de usuario..." name="register-name">
                        </div>
                        <div class="form-group">
                            <label for="register-email">Email</label>
                            <input type="email" class="form-control" id="register-email" placeholder="Ingrese su email..." name="register-email">
                        </div>
                        <div class="form-group">
                            <label for="register-passwd">Contraseña</label>
                            <input type="password" class="form-control" id="register-passwd" placeholder="Ingrese su contraseña..." name="register-passwd">
                        </div>
                        <button type="submit" class="btn btn-primary">Registrarme</button>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </main>
{include file='footer.tpl'}