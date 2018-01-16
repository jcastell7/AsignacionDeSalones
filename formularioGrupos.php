<?php
require_once 'mapaComun.php';
session_start();
if ($_SESSION["recargaGrupos"] >= 1) {
    unset($_SESSION["recargaGrupos"]);
}
?>
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
                                        <input type="hidden" name="reporte1" value="salonesPorPrograma">
                                        <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes4').submit();">Salones usados por un Programa</a>
                                    </div>
                                </form>
                                <form action="FormularioReportes.php" method="post" id="formaReportes5">
                                    <div>
                                        <input type="hidden" name="reporte2" value="ProgramasPorNumEstudiantes">
                                        <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes5').submit();">Lista de Programas por Cantidad de Estudiantes</a>
                                    </div>
                                </form>
                                <form action="FormularioReportes.php" method="post" id="formaReportes6">
                                    <div>
                                        <input type="hidden" name="reporte3" value="programasPorGrupo">
                                        <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('formaReportes6').submit();">Lista de Programas por Grupos (Periodo)</a>
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
    <form action='index.php' method='post'>
        <h4>Agregar Nuevo Programa</h4>
        </br>
        <div class="form-group">
            </br>
            <label for="exampleFormControlInput1">Id Grupo</label>
            <input name="id"  class="form-control" id="exampleFormControlInput1" placeholder="<?php echo $mapa->getIdGrupo(); ?>" readonly>
        </div>
        <div>
            <label for="exampleFormControlInput1">Tipo Programa</label>  
            <select class="form-control form-control" name="tipoPrograma" >
                <option vale="Diplomado">Diplomado</option>
                <option value="Especializacion">Especializacion</option>
                <option Value="Maestria">Maestria</option>
                <option Value="Doctorado">Doctorado</option>
            </select>
        </div>
        <div class="form-group">
            </br>
            <label for="exampleFormControlInput1">Nombre Programa</label>
            <input name="nombrePrograma"  class="form-control" id="exampleFormControlInput1" placeholder="" required>
        </div>
        <div class="form-group">
            </br>
            <label for="exampleFormControlInput1">Periodo</label>
            <input name="periodo" class="form-control" id="exampleFormControlInput1" placeholder="" required>
        </div>
        <div class="form-group">
            </br>
            <label for="exampleFormControlInput1">Numero de Estudiantes</label>
            <input name="numEstudiantes" class="form-control" id="exampleFormControlInput1" placeholder="" required type="number">
        </div>
        <div class="form-group">
            </br>
            <label for="exampleFormControlInput1">Fecha de Finalizacion</label>
            <input name="fechaFinalizacion" type="text" class="form-control datepicker" placeholder="AAAA-MM-DD" required pattern="\d{4}-\d{2}-\d{2}"> 
        </div>
        <div class="form-group">
            </br>
            <label for="exampleFormControlInput1">Semestre</label>
            <input name="semestre" class="form-control" id="exampleFormControlInput1" placeholder="" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Informacion adicional</label>
            <textarea name="info"class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Agregar nuevo Grupo</button>
    </form>
    <script src="Archivos/js/datePicker.js"></script>
</body>
</html>

