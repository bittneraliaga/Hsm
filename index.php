<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de franjas</title>
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
                            <a class="nav-link" href="#">Link</a>
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
                        <div class="card bg-warning text-center text-white">
                            <h3>Registro de franjas</h3>
                        </div>
                        <form action="controladores/registrofranja.php" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <hr>
                                        <!-- Agrupar formularios -->
                                        <div class="form-group">
                                            <label for="franja">Codigo de Franja</label>
                                            <input type="text" class="form-control" name="franja" id="franja" placeholder="Digite codigo de franja" require>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Franja</label>
                                            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Digite descripcion franja" require>
                                        </div>
                                        <div class="form-group">
                                            <label for="has_franja">Has Franja</label>
                                            <input type="text" class="form-control" name="has_franja" id="has_franja" placeholder="Digite hectareas">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-danger btn-lg">Registrar</button>
                            </div>
                        </form>
                    </div>
                <div class="col-md-4"></div>
            </div>
        </div>

    </section>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>