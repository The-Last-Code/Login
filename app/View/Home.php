<?php
    include ('../Dao/Client.php');
    require_once('../Controllers/clientsController.php');
    require_once ('../Conection/Conn.php');
    session_start();

    print_r($_SESSION);exit;


    $controller=new clientsController();

    $action=!empty($_GET['a'])?$_GET['a']:'getAll';

    $controller->{$action}();

    $resultData = $_SESSION['var'];

   
?>
<!DOCTYPE php>
<php lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./bootstrap/css/" />
    <link rel="stylesheet" href="./bootstrap/app/Views/bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="./bootstrap/app/Views/bootstrap/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="./bootstrap/app/Views/bootstrap/css/home.css" />
    <title>Scilink</title>
  </head>
  <body>
    
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <img src="./bootstrap/app/Views/bootstrap/images/logopb.png" style="width: 2%; padding-left: 1vh; padding-right: 1vh">
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#"
          >Scilink</a> 
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0" method="GET" action="">
            <div class="input-group">
              <input
                id="searchbar"
                class="form-control"
                type="text"
                placeholder="Pesquise a tag desejada"
                aria-label="Search"
                onkeyup="search_animal()"
              />

            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="./PaginaPerfil.php">Meu Perfil</a></li>
                <li><a class="dropdown-item" href="./CadastroPerfil.php">Editar Perfil</a></li>
                <li>
                  <a class="dropdown-item" href="./LoginCadastro.php">Sair</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0" style="background-color: #353c42">
        <nav class="navbar-dark" >
          <ul class="navbar-nav">
            

            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="./Home.php"
              >
              
                <span class="me-2"><i class='bi bi-bookmarks-fill'></i></span>
                <span>Publica????es</span>
                <span class="ms-auto">
                  <span class="right-icon">
                  </span>
                </span>
              </a>
              
            </li>
            <li>
              <a href="./FormularioPubli.php" class="nav-link px-3">
                <span class="me-2"><i class='bi bi-pencil-square'></i></span>
                <span>Criar Publica????o</span>
              </a>
            </li>
            
              <a href="./PaginaPerfil.php" class="nav-link px-3">
                <span class="me-2"><i class='bi bi-people-fill'></i></span>
                <span>Meu Perfil</span>
              </a>
            </li>
            <li>
              <a href="./LoginCadastro.php" class="nav-link px-3">
                <span class="me-2"><i class='bi bi-box-arrow-left'></i></span>
                <span>Sair</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Publica????es</h4><h6 style="color: rgb(148, 148, 148);">Publica????es feitas pelos usu??rios</h6>
          </div>
        </div>
      </div>

      
      <?php while($data = $resultData->fetch(PDO::FETCH_ASSOC)){  ?> 
      <table id="lista" class="pub">
        <tr>
          <td class="titulo">
            <a href="./PaginaPublicacao.php" style="text-decoration: none; color: white;">
              <h4><?= $data['tit_projeto'] ?></h4>
            </a>
          </td>
        </tr>
        <tr>
          <td class="res">
            <p>
              <a href="./PaginaPublicacao.php" style="text-decoration: none; color: rgb(3, 3, 3);">
                <?= $data['res_projeto'] ?>
				</a>
              <a href="./PaginaPublicacao.php">Ver Mais</a>
            </p>
          </td>
        </tr>
          <td class="dt">
            <div>
              <p> Data da Publica????o: <?= $data['dti_projeto'] ?></p> <p><b> Tags:</b> <span>#LoremIpsum</span> <span>#Lorem</span> <span>#Ipsum</span></p>
            </div>
          </td>
        </table>
        <?php }?>

        <script>
          // JavaScript code
        function search_animal() {
            let input = document.getElementById('searchbar').value
            input=input.toLowerCase();
            let x = document.getElementsByClassName('pub');
              
            for (i = 0; i < x.length; i++) { 
                if (!x[i].innerHTML.toLowerCase().includes(input)) {
                    x[i].style.display="none";
                }
                else {
                    x[i].style.display="table";                 
                }
            }
        }
        </script>

      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="?pg=<?=$anterior?>" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="?pg=1">1</a></li>
          <li class="page-item"><a class="page-link" href="?pg=2">2</a></li>
          <li class="page-item"><a class="page-link" href="?pg=3">3</a></li>
          <li class="page-item"></li>
            <a class="page-link" href="?pg=<?=$proximo?>">Next</a>
          </li>
        </ul>
    </nav>
    </main>

    <script src="./bootstrap/app/Views/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./bootstrap/app/Views/bootstrap/js/jquery-3.5.1.js"></script>
    <script src="./bootstrap/app/Views/bootstrap/js/jquery.dataTables.min.js"></script>
    <script src="./bootstrap/app/Views/bootstrap/js/dataTables.bootstrap5.min.js"></script>
    <script src="./bootstrap/app/Views/bootstrap/js/script.js"></script>
  </body>
</php>