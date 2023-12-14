<?php
  $sessionUser = $_SESSION['codigoE'];
?>
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Close Menu</a>
<?php
    if ($sessionUser<2) {
?>
      <a href="./usuarios.php" onclick="w3_close()" class="w3-bar-item w3-button">Usuarios</a>
      <a href="./provedores.php" onclick="w3_close()" class="w3-bar-item w3-button">Provedores</a>
<?php
    }
?>
      <a href="./roductos.php" onclick="w3_close()" class="w3-bar-item w3-button">Productos</a>

      <a href="./compras.php" onclick="w3_close()" class="w3-bar-item w3-button">Compras</a>
      <a href="./pventa.php" onclick="w3_close()" class="w3-bar-item w3-button">Ventas</a>
<?php
    if ($sessionUser<2) {
?>
      <a href="./reportes.php" onclick="w3_close()" class="w3-bar-item w3-button">Reportes</a>
<?php
    }
?>
</nav>


<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
     <a href="./logout.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right" style="text-decoration: none; color: black;">Salir</a>
      <a href="./inicio.php" class="w3-bar-item w3-button w3-right">
        <?php
        $code = $_SESSION['codigoE'];
        $user=mysqli_query($con,"SELECT nombre FROM usuario WHERE codigo = '$code'");
        $row=mysqli_fetch_array($user);
        echo $row['nombre'];
        ?>
      </a>
    <div class="w3-center w3-padding-16">KoSports</div>
  </div>
</div>
