<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <title>Asignacion de Salones</title>
    </head>
    <body>
        <header>

            <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
                <a class="navbar-brand" href="#">Mapa de salones</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex align-items-start flex-column">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Opciones
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Lista de Salones Disponibles</a>
                                    <a class="dropdown-item" href="#">Lista de Salones en Uso</a>
                                    <a class="dropdown-item" href="#">Salones en usados por un Programa</a>
                                    <a class="dropdown-item" href="#">Lista de Programas</a>
                                    <a class="dropdown-item" href="#">Lista de Programas por nombre de </a>
                                    <a class="dropdown-item" href="#">Lista de Programas por Fecha de Finalizacion</a>
                                    <a class="dropdown-item" href="#">Lista de Programas por Cantidad de Estudiantes</a>
                                    <a class="dropdown-item" href="#">Lista de Grupo (Periodo) por Nombre de Programa</a>
                                    <a class="dropdown-item" href="#">Lista de Programas por Grupo (Periodo)</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Agregar Salon</a>
                                    <a class="dropdown-item" href="#">Agregar Grupo</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Eliminar Salon</a>
                                    <a class="dropdown-item" href="#">Eliminar Grupo</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Cerrar Sesion</a>
                                </div>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <div class="d-flex flex-row flex-wrap salones">
            <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                <div class="card-header ">
                    <div class="d-flex justify-content-between"> # Salon
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">grupo 1</a>
                                <a class="dropdown-item" href="#">grupo 2</a>
                                <a class="dropdown-item" href="#">grupo 3</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Grupo 1</h4>
                    <p class="card-text">
                        Tipo programa - programa <br>
                        Periodo <br>
                        # estudiantes <br>
                        Fecha Finalizacion <br>
                    </p>
                </div>
                <div class="card-footer text-muted">
                    # de cupos en el salon
                </div>
            </div>
        </div>
    </div>
</body>
</html>
