<?php
require './mapaComun.php';
session_start();
if (!isset($_SESSION["recargaGRupos"])) {
    $_SESSION["recargaGrupos"] = 1;
} else {
    $_SESSION["recargaGrupos"] ++;
}
if (!isset($_SESSION["recargaSalones"])) {
    $_SESSION["recargaSalones"] = 1;
} else {
    $_SESSION["recargaSalones"] ++;
}

if (isset($_SERVER['HTTP_REFERER'])) {
    $url = $_SERVER['HTTP_REFERER'];
    if ($url == "http://localhost/asignaciondesalones/formularioGrupos.php") {
        if (!isset($_POST["botonInicio"]) && $_SESSION["recargaGrupos"] == 1) {
            $idGrupo = $mapa->getIdGrupo();
            $tipoPrograma = $_POST["tipoPrograma"];
            $programa = $_POST["nombrePrograma"];
            $periodo = $_POST["periodo"];
            $numEstudiantes = $_POST["numEstudiantes"];
            $fechaFinalizacion = $_POST["fechaFinalizacion"];
            if (!empty($_POST["info"])) {
                $info = $_POST["info"];
            } else {
                $info = null;
            }
            if (!empty($_POST["semestre"])) {
                $semestre = $_POST["semestre"];
            } else {
                $semestre = null;
            }
            $mapa->crearGrupo($idGrupo, $tipoPrograma, $programa, $periodo, $numEstudiantes, $fechaFinalizacion, $info, $semestre);
        }
    } else if ($url == "http://localhost/asignaciondesalones/formularioSalones.php") {
        if (!isset($_POST["botonInicio"]) && $_SESSION["recargaSalones"] == 1) {
            $idSalon = $mapa->getIdSalon();
            $numeroSalon = $_POST["numeroSalon"];
            $capacidad = $_POST["capacidad"];
            if (!empty($_POST["info"])) {
                $info = $_POST["info"];
            } else {
                $info = null;
            }
            $mapa->crearSalon($idSalon, $numeroSalon, $capacidad, $info);
        }
    }
}
?>
<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
        <link rel="stylesheet" href="Archivos/css/style.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="Archivos/js/alerts.js"></script>
        <script>
            function recargarTarjetas() {<?php
if (isset($_POST['submit'])) {
    $mapa->cambiarGrupos();
}
?>
            }
            function llenarTarjetas() {
<?php $mapa->sobrecupo(); ?>
                $("#tarjetas").append("<?php $mapa->llenarSalonesIndex(); ?>")
            }

        </script>


        <title>Asignacion de Salones</title>
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
                                    <form action="Reportes.php" method="post" id="formaReportes">
                                        <div>
                                            <input type="hidden" name="reporte" value="listaSalonesDisponibles">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes').submit();">Lista de Salones Disponibles</a>
                                        </div>
                                        <div>
                                            <input type="hidden" name="reporte" value="listaSalonesEnUso">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes').submit();">Lista de Salones en Uso</a>
                                        </div>
                                        <div>
                                            <input type="hidden" name="reporte" value="listaProgramas">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes').submit();">Lista de Programas</a>
                                        </div>
                                    </form>
                                    <form action="FormularioReportes.php" method="post" id="formaReportes1">
                                        <div>
                                            <input type="hidden" name="reporte" value="salonesPorPrograma">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes1').submit();">Salones usados por un Programa</a>
                                        </div>
                                        <div>
                                            <input type="hidden" name="reporte" value="ProgramasPorNumEstudiantes">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes1').submit();">Lista de Programas por Cantidad de Estudiantes</a>
                                        </div>
                                        <div>
                                            <input type="hidden" name="reporte" value="programasPorGrupo">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes1').submit();">Lista de Programas por Grupos (Periodo)</a>
                                        </div>
                                    </form>
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
        <div class="d-flex flex-row flex-wrap salones" id="tarjetas">
            <script id="anuncio">llenarTarjetas();
                <?php $mapa->cerrarConexion(); ?>
            </script>
        </div>

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="Archivos/js/js.js"></script>

    </body>
</html>