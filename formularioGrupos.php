<?php 
require_once 'mapaComun.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

        <title>Agregar Grupo</title>

    </head>
    <body>
        <header>
            <nav class="d-flex navbar navbar-expand-lg navbar-light bg-light justify-content-between">
                <div >
                    <a class="navbar-brand" href="#">Mapa de salones</a>
                </div>
                <div class="d-flex align-items-end flex-wrap">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ">
                            <li class="nav-item active pr-2">
                                <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown pr-2">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Opciones
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Lista de Salones Disponibles</a>
                                    <a class="dropdown-item" href="#">Lista de Salones en Uso</a>
                                    <a class="dropdown-item" href="#">Salones en usados por un Programa</a>
                                    <a class="dropdown-item" href="#">Lista de Programas</a>
                                    <a class="dropdown-item" href="#">Lista de Programas por Fecha de Finalizacion</a>
                                    <a class="dropdown-item" href="#">Lista de Programas por Cantidad de Estudiantes</a>
                                    <a class="dropdown-item" href="#">Lista de Grupos (Periodo) por Nombre de Programa</a>
                                    <a class="dropdown-item" href="#">Lista de Programas por Grupos (Periodo)</a>
                                    <div class="dropdown-divider"></div>    
                                    <a class="dropdown-item" href="formularioSalones.php">Agregar Salon</a>
                                    <a class="dropdown-item" href="formularioGrupos.php">Agregar Grupo</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Editar Salon</a>
                                    <a class="dropdown-item" href="#">Editar Grupo</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Eliminar Salon</a>
                                    <a class="dropdown-item" href="#">Eliminar Grupo</a>
                                </div>
                            </li>
                            <li class="nav-item active pr-2">
                                <a class="nav-link " href="#">Lista de Grupos <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active pr-2">
                                <a class="nav-link" href="#">Cerrar Sesion <span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                    </div>      
                </div>
            </nav>
        </header>
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Example multiple select</label>
                <select multiple class="form-control" id="exampleFormControlSelect2">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </body>
</html>

