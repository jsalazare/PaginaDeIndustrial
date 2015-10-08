<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Sistema de noticias</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/styles2.css" />
	
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
	
	<div class="login">
  <div class="heading">
    <h2>SISTEMA DII</h2>
    <img src="assets/images/escudogris.png" width="200px" class="img-responsive logo">
    <form method="post" action="" role="login">

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" class="form-control txtn" name="user" placeholder="Nombre de usuario">
          </div>

        <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Contraseña" >
        </div>

        <button type="submit" name="submit" class="float">Iniciar Sesión</button>
       </form>
 		</div>
 </div>
	

</body>
</html>

<?php
//incluidos la clase de conxion

include "../conexion.php";

 $errorLogin=false;
//header("Content-Type: text/html;charset=utf-8");
mysqli_set_charset($conn, 'utf8');
mysqli_query($conn, "SET NAMES 'utf8'");
if (mysqli_connect_errno())
  {
  echo "Error de conexion: " . mysqli_connect_error();
  } 

if (isset($_POST['submit'])) 
{
   $sql1= "select * from usuariosnoticias where username= '".$_POST['user']."' &&  password ='".$_POST['password']."'";
 
   $result=mysqli_query($conn, $sql1)
      or exit("Sql Error".mysqli_error($result));
       
    $row = mysqli_fetch_array($result);
   
  if ($row["username"] == $_POST['user'] && $row['password']== $_POST['password']) {
      //se crea session
      session_start();  
      $_SESSION['usuario']=$row['username'];
     
 	  header("Location:agregarnoticias.php");

  }
  else {

      echo'<script type="text/javascript">
                alert("Usuario o Contraseña Incorrecta");
                </script>';
  }
  mysqli_close($conn);
    }
?>