<?php
require 'mapaComun.php';
session_start();
?>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="Archivos/css/busqueda.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <style>
        .myDate{
            margin: 10px 0 10px 0;	
        }
    </style>
    <title>Resultado</title>

</head>
<body>
<header>
            <nav class="d-flex navbar navbar-expand-lg navbar-light bg-light justify-content-between">
                <div >
                    <label class="navbar-brand">Mapa de Salones</label>
                </div>
                <div class="d-flex align-items-end flex-wrap">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ">
                            <li class="nav-item active pr-2">
                                <form action="index.php" method="post" id="botonInicio">
                                    <input type="hidden" name="botonInicio" value="inicio">
                                    <a class="nav-link" href="javascript:{}" onclick="document.getElementById('botonInicio').submit();">Inicio <span class="sr-only">(current)</span></a>
                                </form>
                            </li>
                            <li class="nav-item dropdown pr-2">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Opciones
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <form action="Reportes.php" method="post" id="formaReportes0">
                                        <div>
                                            <input type="hidden" name="reporte" value="listaSalones">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes0').submit();">Lista de Salones</a>
                                        </div>
                                    </form>
                                    <form action="Reportes.php" method="post" id="formaReportes1">
                                        <div>
                                            <input type="hidden" name="reporte" value="listaSalonesDisponibles">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes1').submit();">Lista de Salones Disponibles</a>
                                        </div>
                                    </form>

                                    <form action="Reportes.php" method="post" id="formaReportes2">
                                        <div>
                                            <input type="hidden" name="reporte" value="listaSalonesEnUso">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes2').submit();">Lista de Salones en Uso</a>
                                        </div>
                                    </form>
                                    <form action="Reportes.php" method="post" id="formaReportes3">
                                        <div>
                                            <input type="hidden" name="reporte" value="listaProgramas">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes3').submit();">Lista de Programas</a>
                                        </div>
                                    </form>
                                    <form action="FormularioReportes.php" method="post" id="formaReportes4">
                                        <div>
                                            <input type="hidden" name="reporte" value="salonesPorPrograma">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes4').submit();">Salones usados por un Programa</a>
                                        </div>
                                    </form>
                                    <form action="FormularioReportes.php" method="post" id="formaReportes5">
                                        <div>
                                            <input type="hidden" name="reporte" value="salonesPorNumEstudiantes">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes5').submit();">Lista de Salones por Cantidad de Estudiantes</a>
                                        </div>
                                    </form>
                                    <form action="FormularioReportes.php" method="post" id="formaReportes6">
                                        <div>
                                            <input type="hidden" name="reporte" value="programasPorGrupo">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes6').submit();">Lista de Programas por Grupos (Periodo)</a>
                                        </div>
                                    </form>
                                    <div class="dropdown-divider"></div>    
                                    <a class="dropdown-item" href="formularioSalones.php">Agregar Salon</a>
                                    <a class="dropdown-item" href="formularioGrupos.php">Agregar Grupo</a>
                                    <div class="dropdown-divider"></div>
                                    <form action="Reportes.php" method="post" id="formaReportes7">
                                        <div>
                                            <input type="hidden" name="reporte" value="eliminarSalon">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes7').submit();">Eliminar Salon</a>
                                        </div>
                                    </form>
                                    <form action="Reportes.php" method="post" id="formaReportes8">
                                        <div>
                                            <input type="hidden" name="reporte" value="eliminarGrupos">
                                            <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes8').submit();">Eliminar Grupo</a>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item active pr-2">
                                <form action="Reportes.php" method="post" id="formaReportes3">
                                    <div>
                                        <input type="hidden" name="reporte" value="listaProgramas">
                                        <a class="nav-link" href="javascript:{}" onclick="document.getElementById('formaReportes3').submit();">Lista de Programas</a>
                                    </div>
                                </form>
                            </li>

                            <div class="form-inline my-2 my-lg-0" >
                                <input id="search-text" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            </div>
                        </ul>
                    </div>      
                </div>
            </nav>
        </header>

    <?php
    if (isset($_POST["reporte"])) {
        switch ($_POST["reporte"]) {
            case "listaSalones":
                $mapa->reporteListaSalones();
                break;
            case "listaSalonesDisponibles":
                $mapa->reporteListaSalonesDisponibles();
                break;
            case "listaSalonesEnUso":
                $mapa->reporteListaSalonesEnUso();
                break;
            case"listaProgramas":
                $mapa->reporteListaGrupos();
                break;
            case"salonesPorPrograma":
                $programa=$_POST["dato"];
                $mapa->salonesPorPrograma($programa);
                break;
            case"salonesPorNumEstudiantes":
                $capacidad=$_POST["dato"];
                $mapa->salonesPorCapacidad($capacidad);
                break;
            case"programasPorGrupo":
                $periodo=$_POST["dato"];
                $mapa->programasPorPeriodo($periodo);
                break;
            case"eliminarGrupos":
                $mapa->reporteListaGruposELIMINAR();
                break;
            case"eliminarSalon":
                $mapa->reporteListaSalonesELIMINAR();
                break;
            default:
                echo "Para realizar una busqueda Dele click en opciones y seleccione el informe requerido";
                break;
        }
    }
    ?>


</body>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script src="Archivos/js/busqueda.js"></script>
</html>