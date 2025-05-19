<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include 'conexao.php';

echo $_SESSION['usuario'];

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    $nivel = $_POST['nivel'];
    $sql = "UPDATE usuarios SET user='$user', nivel='$nivel' WHERE id=$id";
    mysqli_query($conexao, $sql);
    header('Location: painel.php');
} else {
    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $resultado = mysqli_query($conexao, $sql);
    $usuario = mysqli_fetch_assoc($resultado);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Editar Usúario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="label.css" rel="stylesheet">
  </head>
    <body class="container py-5">
        <h1>Editar Usúario</h1>

  <form method="POST">
        <div class="mb-3">
            <label>Login:</label>
            <input type="text" name="user" class="form-control"  value="<?= $usuario['user'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Nivel:</label>
            <input type="number" name="nivel" class="form-control" value="<?= $usuario['nivel'] ?>" required>
        </div>
        <button class="btn btn-success">Atualizar</button>
        <a href="painel.php" class="btn btn-secondary">Voltar</a>
</div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>