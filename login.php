<?php
      include_once 'conexion.php';
      $conn = conectar();
      
         session_start();

         $usuario_login = $_POST['login_usuario'];
         $contrasena_login = $_POST['login_contrasena'];

         //Verificar que existe el usuario
         $sql = "SELECT * FROM usuarios WHERE correo= '$usuario_login'";
         $query = mysqli_query($conn, $sql);
         $usuario = mysqli_fetch_array($query);

         if(!$query){
            echo 'poki guapo nalgon';
            header('Location: entrar.php');
         }else{
            if(!password_verify($contrasena_login, $usuario['contrasena'])){
               $_SESSION['admin'] = $usuario_login;
               $_SESSION['id'] = $usuario['usuario_id'];
               header('Location: cursos.php');
            }else{
               echo 'Contraseña Incorrecta!!!';
               header('Location: entrar.php');
            } 
         }  

      
      