<?php
session_start();
require_once("conexion.php");
if(!isset($_SESSION['codigoE'])){
  echo '<meta http-equiv="refresh" content="0; url=./login.php">';
}else{
require_once ("./conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>KoSports</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="./bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
</head>
<body>

<!-- Navbar -->
<?php require_once("menu.php"); ?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" >

  <div class="w3-row w3-padding-64">
      <center>
        <h1 class="w3-text-teal">Productos</h1>

        <main role="main"  style="padding-right: 20px; padding-left: 20px" >

            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>Barcode</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Tamaño</th>
                    <th>Precio (Venta)</th>
                    <th>Precio (Compra)</th>
                    <th>Existencia</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $queryProductos="
                        SELECT * FROM producto
                        JOIN marca on producto.marca = marca.id
                        JOIN tamanio on producto.tamanio = tamanio.id
                        ORDER BY producto.barcode ASC";
                        $queryProductos=mysqli_query($con,$queryProductos);
                        if(mysqli_num_rows($queryProductos)){
                            while($row=mysqli_fetch_array($queryProductos)){
                                ?>
                                  <tr>
                                    <td><?php echo $row['barcode']; ?></td>
                                    <td><?php echo $row[1]; ?></td>
                                    <td><?php echo $row[7]; ?></td>
                                    <td><?php echo $row[9]; ?></td>
                                    <td><?php echo $row['precioVenta']; ?></td>
                                    <td><?php echo $row['precioCompra']; ?></td>
                                    <td><?php echo $row['existencia']; ?></td>
                                    <td>
                                        <form method="post" action="infoProducto.php">
                                            <input type="hidden" name="barcodep" value="<?php echo $row['barcode']; ?>">
                                            <input class="btn btn-outline-warning" type="submit"value="Ver">
                                        </form>
                                    </td>
                                  </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
              </table>
            </div>
            <form method="post" action="productosForm.php">
                <input class="btn btn-outline-success" type="submit" name="addProductoForm" value="Agregar">
                
                <a href="./inicio.php" class="btn btn-outline-primary">Regresar</a>
            </form>
        </main>
      </center>
  </div>
<!-- END MAIN -->
</div>
<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
</body>
</html>
<?php } ?>