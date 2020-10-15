<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="{BASE_URL}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inmobiliaria D'llano</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="resources/css/style.css">

    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-main main-nav">
            <a class="navbar-brand" href="#">Inmobiliaria D'llano</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item nav-button-main">
                  <a class="nav-link" href="#">Home</a>
                </li>
                <li class="dropdown nav-button-main">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Categorías</span> <span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-main">
                    {foreach from=$categorias item=$categoria}
                    <li><a class="nav-link" href="cat/{$categoria->nombre}">{$categoria->nombre}</a></li>
                    {/foreach}
                  </ul>
              </li>
                <li class="nav-item nav-button-main">
                  {if ( isset($smarty.session.USER_ROLE) && $smarty.session.USER_ROLE == '1')}
                  <a class="nav-link" href="panel">Panel Admin</a>
                </li>
                <li class="nav-item nav-button-main">
                  <a class="nav-link" href="logout">Salir</a>
                  {else}
                  <a class="nav-link" href="login">Login</a>
                  {/if}
                </li>
              </ul>
            </div>
        </nav>
    </header>