<?php
  /**
   * CONTROLLER: Autenticação
   */

  include '../config.php';

  // Varificação as actions (ações do usuário)
  $action = isset($_REQUEST['action'])
  ? $_REQUEST['action'] : null;

  // Action para Logout
  if($action == 'logout') {
    echo "Logout";
  } 
  // Validar o login/senha informados
  else if($action == 'validar') {
    echo "Validar";
  } 
  // Formulário de login
  else {
    echo "Tela de login";
  }

  include approot() . 'template/index.php';
?>