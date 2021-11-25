<?php

/**
 * CONTROLLER: Autenticação
 */

include '../config.php';


/**
 * Validar os campos do formulário
 */
function formValido($arr)
{
  return !empty($arr['usuario']) && !empty($arr['senha']);
}


// Varificação as actions (ações do usuário)
$action = isset($_REQUEST['action'])
  ? $_REQUEST['action'] : null;

// Action para Logout
if ($action == 'logout') {
  session_destroy();

  Header('Location: ' . webroot());
  exit;
}
// Validar o login/senha informados
else if ($action == 'validar') {
  $usuario = trim($_POST['usuario']);
  $senha = trim($_POST['senha']);

  if (!formValido($_POST)) {
    $message = "Usuário e/ou senha inválidos";
    $view = 'view/form.php';
  } else {
    $sql = "SELECT distinct id, nome, email, password FROM tb_usuario
      WHERE email = '$usuario' AND password = '$senha'";

    $result = $_conn->query($sql);

    if (mysqli_num_rows($result) > 0) { // O usuário existe no DB
      $user = $result->fetch_array();

      session_start(); // Inicializar a sessão

      $_SESSION['classiauto_user_id'] = $user['id'];
      $_SESSION['classiauto_user_nome'] = $user['nome'];
      $_SESSION['classiauto_user_email'] = $user['email'];

      Header("Location: " . webroot());
      exit;
    } else { // Usuário não existe no DB ou a senha é inválida
      $message = "Usuário e/ou senha inválidos";
      $view = 'view/form.php';
    }
  }
}
// Formulário de login
else {
  $view = 'view/form.php';
}

include approot() . 'template/index.php';
