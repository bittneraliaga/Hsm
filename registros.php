<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.php">GA</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="registros.php">Registros</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" href="registros.php">Registro</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        </div>
                    </div>
                    </nav>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>

    <section class="content">
        <div clas="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">    
                    <div class="card bg-warning card-outlibe text-center">
                        <h5>Registro de Franjas</h5>
                        <?php
                            include "controladores/conexion.php";
                            $consulta = $conexion -> query("SELECT * FROM franja");
                            $row = mysqli_num_rows($consulta);
                        ?>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Franja</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Has</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($guardar =$consulta -> fetch_assoc()){?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo mb_strtoupper($guardar['franja'])?>
                                        </th>
                                        <td>
                                            <?php echo mb_strtoupper($guardar['descripcion'])?>
                                        </td>
                                        <td>
                                            <?php echo $guardar['has_franja']?>
                                        </td>
                                    
                                    </tr>  
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <hr>
                <div class="text-center">
                    <a href="index.php" class="btn btn-success btn-lg">Nuevo registro</a>
                </div>
            </div>
        </div>
    </section>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>