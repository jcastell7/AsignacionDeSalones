<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" type="text/javascript"></script>
    <style>
        .myDate{
            margin: 10px 0 10px 0;	
        }
    </style>
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