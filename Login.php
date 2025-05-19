<?php
session_start();
include 'Conexao.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $login = $_POST['user'];
  $senha = $_POST['senha'];

  $sql = "SELECT * FROM usuarios WHERE user = '$login'";
  $res = mysqli_query($conexao, $sql);
  $usuario = mysqli_fetch_assoc($res);

  if ($usuario && password_verify($senha, $usuario['senha'])) {
    $_SESSION['usuario'] = $usuario['id'];
    $_SESSION['nivel'] = $usuario['nivel'];
    if($_SESSION['nivel']==0){
    header("Location: painel.php");
    }elseif($_SESSION['nivel']==2){
      header("Location: painel-aluno.php");
    }elseif($_SESSION['nivel']==3){
      header("Location: painel-presidente.php");
    }
  }else{
    echo"<div class=\"alert alert-danger\" role=\"alert\">
    Login ou senha incorreto!
    </div>";
  }

}

?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body style="background-color: #16a085">
    <div class="container text-center">
        <div class="row align-items-start">
          <div class="col">
            
          </div>
          <div class="col">
            <h1 style="padding-top: 5%;"></h1>
            <img src="https://images.tcdn.com.br/img/img_prod/460977/action_figure_madara_uchiha_naruto_shipudden_anime_manga_nendoroid_2175_mkp_135259_1_74f7be1225a8ed37ede97fd4012a481e.jpg" width="250px" height="250px" alt="Logo">
            <h1 style="padding-top: 10%;"></h1>

            <div class="card mx-auto p-4 shadow-lg" style="max-width: 600px; background-color: #2c3e50">
            
            <h2 style="color: white;">Login</h2>

            <h1 style="padding-top: 1;"></h1>


        <form method="POST">
              
            <input type="text" id="user" name="user" class="form-control" required="" placeholder="Usuário">
            <label class="form-label" for="user"></label>
            <h1 style="padding-top: 2%;"></h1>

            <input type="password" id="senha" name="senha" class="form-control" required="" placeholder="Senha">
            <label class="form-label" for="senha"></label>
            <h1 style="padding-top: 2%;"></h1>

            <button type="submit" class="btn btn-primary w-100">Entrar</button>
            <h1 style="padding-top: 1;"></h1>
            <p><a href="#" class="link-light link-offset-2 link-underline-opacity-75">Esqueceu a senha?</a></p>
          
          </div>
          </div>
          <div class="col">
            
          </div>
        </div>
      </div>










</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>