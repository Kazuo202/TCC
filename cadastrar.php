<?php 
include 'Conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = $_POST['user'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (user, senha, nivel) VALUE ('$login', '$senha' , 2)";

    mysqli_query($conexao, $sql);

    header("Location: Login.php?sucesso=1");
    

}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="label.css" rel="stylesheet">
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
            <h2 style="color: white;">Cadastrar</h2>
          <form method="POST">
        <div class="mb-3">
            <label>Login:</label>
            <input type="text" name="user" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Senha:</label>
            <input type="password" name="senha" class="form-control" required>
        </div>
        <button class="btn btn-primary">Registrar</button>
        <a href="login.php" class="btn btn-link">Já tenho conta</a>
</div>
    </form>
          </div>
          <div class="col">
            
          </div>
        </div>
      </div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>