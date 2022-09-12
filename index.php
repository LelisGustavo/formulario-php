<?php

// Require_once para chamar a pasta/pagina de funções
require_once 'function/function.php';

// If para conferir os valores vindo via POST depois do click do botão Enviar
if (isset($_POST['btnSend'])) {
  $userName = trim($_POST['userName']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $passwordConfirmation = trim($_POST['passwordConfirmation']);

  //Variaveis de atribuição do CSS de ERROR e/ou SUCCESS nos campos preenchidos/mensagens 
  $css_userName = 'success';
  $css_email = 'success';
  $css_password = 'success';
  $css_passwordConfirmation = '';

  // Variavél auxiliar para mensagens de Erro e/ ou Sucesso
  $check = '';

  echo '<center>';

  // If para validações dos campos input 'Nome do Usuário'
  if (!ValidarUsuario($userName, 3)) {
    $check = 'Nome deverá conter no mínimo 3 caracteres<br>';
    $css_userName = 'error';
  }
  // If para validações dos campos input 'Email do Usuário'
  if (!ValidarUsuario($email, 10)) {
    $check .= 'Digite um email váldio<br>';
    $css_email = 'error';
  }
  // If para validações dos campos input 'Senha'
  if (!ValidarUsuario($password, 6)) {
    $check .= 'Senha deverá conter no mínimo 6 caracteres<br>';
    $css_password = 'error';
  }
  // If para validações dos campos input 'Confirmar Senha'
  if (!ValidarSenha($password, $passwordConfirmation)) {
    $check .= 'As senhas devem ser iguais<br>';
    $css_passwordConfirmation = 'error';
  } else {
    $css_passwordConfirmation = 'success';
  }

  // If para validação de mensagem de sucesso  de todos os campos input
  if ($check === '') {
    echo 'Campos validdos com sucesso';
  } else {
    echo $check;
  } 

  echo '</echo>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet" />

  <title>Formulário</title>

</head>

<body>

  <center>
    <div class="container">
      <div class="header">
        <h2>Criar Uma Conta</h2>
      </div>

      <form class="form" action="index.php" method="post">

        <div class="container">

          <div class="form-control">
            <label for="uesername">Nome do Usuário</label>
            <input type="text" name="userName" id="userName" placeholder="Digite o nome do usuário..." value="<?= isset($userName) ? $userName : '' ?>" class="<?= isset($css_userName) ? $css_userName : '' ?>">
          </div>

          <div class="form-control">
            <label for="email">Email do Usuário</label>
            <input type="text" name="email" id="email" placeholder="Digite o email do usuário..." value="<?= isset($email) ? $email : '' ?>" class="<?= isset($css_email) ? $css_email : '' ?>">
          </div>

          <div class="form-control">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" placeholder="Digite a senha..." value="<?= isset($password) ? $password : '' ?>" class="<?= isset($css_password) ? $css_password : '' ?>">
          </div>

          <div class="form-control">
            <label for="passwordConfirmation">Confirmar Senha</label>
            <input type="password" name="passwordConfirmation" id="passwordConfirmation" placeholder="Confirme sua senha..." value="<?= isset($passwordConfirmation) ? $passwordConfirmation : '' ?>" class="<?= isset($css_passwordConfirmation) ? $css_passwordConfirmation : '' ?>">
          </div>

          <button class="form-button" name="btnSend">Entrar</button>

        </div>
      </form>
  </center>

</body>

</html>