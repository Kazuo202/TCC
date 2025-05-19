<?php 
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['nivel']==0 || $_SESSION['nivel']==1 || $_SESSION['nivel']==3) {
    header("Location: login.php");
    exit;
}
include 'Conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Painel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body class="container py-5">
    <h1>Bem-vindo, <?= $_SESSION['usuario'] ?>!</h1>
    <p>Você está logado.</p>
    <a href="logout.php" class="btn btn-danger">Sair</a><br><br>





    <a href="criar-clube.php" class="btn btn-primary mb-3">Criar clube</a>
    <h3>Clubes Existentes</h3>
    <table class="table table-bordered">
      <thead><tr><th>Nome do Clube</th><th>Descrição</th><th>Alunos</th><th>Ações</th></tr></thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM clubes WHERE status=0";
        $resultado = mysqli_query($conexao, $sql);
        while ($linha = mysqli_fetch_assoc($resultado)){
          echo "<tr>
                    <td>{$linha['nome']}</td>
                    <td>{$linha['descricao']}</td>
                    <td>{$linha['alunos']}</td>
                    <td>
                        <a href='editar.php?id={$linha['id']}' class='btn btn-sm btn-success'>Entrar</a>
                    </td>
                </tr>";
        }
        ?>
    </tbody>
    </table>
</body>
</html>