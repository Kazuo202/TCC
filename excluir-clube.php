<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include 'conexao.php';


$id = $_GET['id'];
$idUser = $_SESSION['usuario'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE clubes SET status=1 WHERE id = $id";
    mysqli_query($conexao, $sql);
    header('Location: painel-presidente.php');
} else {
    $sql = "SELECT * FROM clubes WHERE id=$id";
    $resultado = mysqli_query($conexao, $sql);
    $clubes = mysqli_fetch_assoc($resultado);
}
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Excluir Clube</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="label.css" rel="stylesheet">
  </head>
    <body class="container py-5">
        <h1>Excluir Clube</h1>


        <?php 
    $consulta = "SELECT * FROM clubes WHERE presidente = $idUser AND id=$id";
    $consulta_res = mysqli_query($conexao, $consulta);

        if ($clubes_assoc = mysqli_fetch_assoc($consulta_res)) {

        if ($clubes_assoc['presidente'] == $idUser){
            echo"<form method=\"POST\">
            <h2>Você realmente deseja excluir esse clube? Essa ação não pode ser revertida.<p><p>
                    <button class=\"btn btn-success\">Excluir</button>
                    <a href=\"painel-presidente.php\" class=\"btn btn-secondary\">Voltar</a>
                </form>";
        }
    }else{
        echo"Esse clube não existe ou você não é presidente";
    }
?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>