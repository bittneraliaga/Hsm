<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="../img/logo-mywebsite-urian-viera.svg"/>
  <title>Importar datos de lotes</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/cargando.css">
  <link rel="stylesheet" type="text/css" href="../css/cssGenerales.css">
</head>
<body>

<div class="cargando">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<!-- 
<nav class="navbar navbar-expand-lg navbar-light navbar-dark fixed-top" style="background-color: #563d7c !important;">
    <ul class="navbar-nav mr-auto collapse navbar-collapse">
      <li class="nav-item active">
        <a href="index_personal.php"> 
          <img src="../img/logo-mywebsite-urian-viera.svg" alt="Web Developer Urian Viera" width="120">
        </a>
      </li>
    </ul>
    <div class="my-2 my-lg-0">
      <h5 class="navbar-brand">Web Developer bap </h5>
    </div>
</nav>
-->

<div class="container">

<h3 class="text-center">
    Importar datos de lotes de Excel
</h3>
<hr>
<br><br>
 <div class="row">
    <div class="col-md-12">
      <form action="masiva_lotes.php" method="POST" enctype="multipart/form-data"/>
        <div class="file-input text-center">
            <input  type="file" name="dataCliente" id="file-input" class="file-input__input"/>
            <label class="file-input__label" for="file-input">
              <i class="zmdi zmdi-upload zmdi-hc-2x"></i>
              <span>Elegir Archivo Excel</span></label>
        </div>
        <div class="text-center mt-5">
          <input type="submit" name="subir" class="btn-enviar" value="Subir Excel"/>
        </div>
      </form>
    </div>
  
  <div class="col-md-12">
  <?php
  header('Content-Type: text/html; charset=UTF-8');
  include('../controladores/conexion.php');
  $sqlLotes = ("SELECT * FROM lote ORDER BY lote ASC");
  $queryData   = mysqli_query($conexion, $sqlLotes);
  $total_client = mysqli_num_rows($queryData);
  ?>
      <h6 class="text-center">
        Lista de lotes <strong>(<?php echo $total_client; ?>)</strong>
      </h6>

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Lote</th>
              <th>Franja</th>
              <th>Has_lote</th>
              <th>PEP</th>
              <th>Etapa1</th>
              <th>Etapa2</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i = 1;
            while ($data = mysqli_fetch_array($queryData)) { ?>
            <tr>
              <th scope="row"><?php echo $i++; ?></th>
              <td><?php echo $data['lote']; ?></td>
              <td><?php echo $data['franja']; ?></td>
              <td><?php echo $data['has_lote']; ?></td>
              <td><?php echo $data['pep']; ?></td>
              <td><?php echo $data['etapa1']; ?></td>
              <td><?php echo $data['etapa2']; ?></td>
              <td><?php echo $data['estado']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>

    </div>
  </div>

</div>


<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        });      
});
</script>

</body>
</html>