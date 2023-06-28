<?php
    session_start();
    //Verificamos si hay sesion de usuario
    if(isset($_SESSION['admin'])){
        echo 'Hola';
    }else{
        header('Location: index.php');
    }
    include 'conexion.php';
    $conn = conectar();
    $usu_id = $_SESSION['id'];
    $sql_leer = "SELECT cursos.nombre, cursos.cursos_id, cursos.descripcion FROM alumno_cursos, cursos  WHERE usuario_id = '$usu_id' and alumno_cursos.cursos_id = cursos.cursos_id";
    $query = mysqli_query($conn, $sql_leer);
     //echo $query;
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Proyecto final</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="shortcut icon" href="./img2/LOGO3.png" type="image/x-icon" />
  />
  </head>
  <body>
    <!-- #region ENCABEZADO -->
    <header class="header" id="header">
      <nav class="nav container">
        <a href="./index.php" class="nav__logo">
          <img src="./img2/LOGO3.png" alt="" class="nav__logo-img" />
          Wookie
        </a>
        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="#home" class="nav__link ">Mis cursos</a>
            </li>
            <li class="nav__item">
              <a href="./cursos_dis.php" class="nav__link">Cursos disponibles</a>
            </li>
            <a href="./editarusu.php" class="button button--ghost">Actualizar</a>
            <a href="./cerrarsesion.php" class="button button--ghost">Cerrar sesion</a>
          </ul>
          <div class="nav__close" id="nav-close">
            <i class="bx bx-x"></i>
          </div>
          <img src="./img/nav-img.png" alt="" class="nav__img" />
        </div>
        <div class="nav__toggle" id="nav-toggle">
          <i class="bx bx-grid-alt"></i>
        </div>
      </nav>
    </header>
    <!-- #endregion -->
    <!-- #region Principal-->
    <main>
    <section class="section newsletter">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
              while($resultado = mysqli_fetch_array($query)){?>
               <form action="eliminar_curso.php" method="POST">
                <div class="col">
                <div class="card text-secondary">
                  <img src="./img2/tarjeta.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $resultado['nombre'] ?></h5>
                    <p class="card-text"><?php echo $resultado['descripcion'] ?></p>
                    <input type="hidden" name="cursos_id" value="<?php echo $resultado['cursos_id']; ?>">
                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['id']; ?>">
                    <button type="submit" class="btn btn-outline-dark">Eliminar</button>
                  </div>
                </div>
                </div>
               </form>
            <?php
            }
            ?></div>   
      </section>
      <!--Menu inicial-->
    </main>
     <!--Pie de pagina-->
     <footer class="footer section">
      <div class="footer__container container grid">
        <div class="footer__content">
          <a href="#" class="footer__logo">
            <img src="./img2/LOGO3.png" alt="" class="footer__logo-img" />
            WOOKIE
          </a>
          <p class="footer__description">
            ¡¡Siguenos!!
          </p>
        
          <div class="footer__social">
            <a
              href="https://www.facebook.com/LizzAuwu3"
              target="_blank"
              class="footer__social-link"
            >
              <i class="bx bxl-facebook"></i>
            </a>
            <a
              href="https://www.instagram.com/lizzawate"
              target="_blank"
              class="footer__social-link"
            >
              <i class="bx bxl-instagram-alt"></i>
            </a>
            <a
              href="https://twitter.com/LizzA65751591"
              target="_blank"
              class="footer__social-link"
            >
              <i class="bx bxl-twitter"></i>
            </a>
          </div> 
          <span class="footer__copy" >&#169; WOOKIE</span>
        </div>
      <img src="./img2/MONS4.png" alt="" class="footer__img-one" />
      <img src="./img2/MONS3.png" alt="" class="footer__img-two" />
    </footer>
    <!-- #endregion -->
    <a href="#" class="scrollup" id="scroll-up">
      <i class="bx bx-up-arrow-alt scrollup__icon"></i>
    </a>
    <!--Scroll para que se revelen los elementos de forma suave-->
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <!--Deslizar elementos en una lista-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="./js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/delete.js"></script>
  </body>
</html>