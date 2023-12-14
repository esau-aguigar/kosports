<?php
session_start();
require_once("conexion.php");
if(!isset($_SESSION['codigoE'])){
  echo '<meta http-equiv="refresh" content="0; url=./login.php">';
}else{
if (isset($_POST['BORRARDEF'])){
require_once ("./conexion.php");
  $usuario = $_POST['codigo'];
  $borrarUsuarios = "DELETE FROM usuario WHERE codigo = '$usuario';";
  if (mysqli_query($con,$borrarUsuarios)) {
    header("Location: ./Usuarios.php");
    # code...
  }

}
else
{
  require_once ("./conexion.php");
  $Delusuario = $_POST['codigoDel'];
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
      <?php require_once("menu.php"); ?>

      <div class="w3-main" >
        <div class="w3-row w3-padding-64">
          <center><h1 class="w3-text-teal">Usuarios</h1></center>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
              <div id="contenido">
                <?php
                  $queryEliminarusuario="
                    SELECT * FROM usuario
                    WHERE codigo= '$Delusuario';
                  ";
                  $queryDelusuarioRes=mysqli_query($con,$queryEliminarusuario);
                  if(mysqli_num_rows($queryDelusuarioRes))
                  {
                    while($row=mysqli_fetch_array($queryDelusuarioRes))
                    {
                ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
              <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <?php
                        $queryusuario="
                        SELECT * FROM usuario
                        INNER JOIN rol on usuario.rol = rol.id
                        INNER JOIN area on usuario.area = area.id
                        INNER JOIN statuss on usuario.status = statuss.id
                        WHERE usuario.codigo = '$Delusuario';";
                        $queryUsuarioResult=mysqli_query($con,$queryusuario);
                        if(mysqli_num_rows($queryUsuarioResult)){
                            while($row=mysqli_fetch_array($queryUsuarioResult)){
                    ?>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <center><h2>Codigo: <?php echo $row['codigo']; ?> </h2></center>
                </div>

                <label for="inputUsuario" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                  <input type="hidden" name="codigo" value="<?php echo $row['codigo']; ?>">
                  <input type="text" class="form-control" name="nombre" id="inputUsuario" value="<?php echo $row[1]; ?>" disabled>
                </div>

                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="form-group col-md-6">
                <input type="password" step="0.01" class="form-control" name="password" id="inputPassword" value="<?php echo $row['password']; ?>" disabled>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="setRol">Status</label>
                    <select class="form-control" id="setStatus" name="status" disabled>
                        <option value="<?php echo $row[10]; ?>"><?php echo $row[11]; ?>*</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="rol">Rol</label>
                    <select class="form-control" id="rol" name="rol" disabled>
                        <option value="<?php echo $row[6]; ?>"><?php echo $row[7]; ?>*</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="setArea">Area</label>
                  <select class="form-control" id="setArea" name="area" disabled>
                      <option value="<?php echo $row[8]; ?>"><?php echo $row[9]; ?>*</option>
                  </select>
                </div>
                <?php
              }
            }
          }
                ?>
                <center>
                  <input class="btn btn-outline-danger" type="submit" name="BORRARDEF" value="Eliminar Definitivamente">
                  <a href="./usuarios.php" class="btn btn-outline-primary">Regresar</a>
                </center>                    
              </form>
              <?php
                    }
              ?>
          </div>
        </main>
      </div>
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
<?php
}
}
?>