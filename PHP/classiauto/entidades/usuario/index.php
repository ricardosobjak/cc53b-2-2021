<?php
// Controlador da entidade "Usuário"

  include '../../config.php';

/**
 * Consultar os usuários no banco de dados
 */
function getUsuarios($_conn)
{
  $sql = "SELECT * FROM tb_usuario";

  #$result = $_conn->query($sql);
  return mysqli_query($_conn, $sql);
}

/**
 * Validar os campos do formulário
 */
function formValido($arr)
{
  return !empty($arr['nome'])
    && !empty($arr['telefone'])
    && !empty($arr['email'])
    && !empty($arr['senha'])
    && ($arr['senha'] == $arr['senha2']);
}

$action = isset($_REQUEST['action'])
  ? $_REQUEST['action'] : null;

if ($action == "novo") {
  $hasErros = false;
  $view = 'view/form.php'; // Incluindo a view de cadastro
} else if ($action == "editar") {
  $hasErros = false;
  $view = 'view/form.php'; // Incluindo a view de edição
} else if ($action == "salvar") {
  require('../../conexao.php');

  $sql = "INSERT INTO tb_usuario (
      nome, 
      nascimento, 
      cidade, 
      uf,
      pais,
      email,
      telefone,
      password) VALUES (
        '" . $_POST['nome'] . "',
        '" . $_POST['nascimento'] . "',
        '" . $_POST['cidade'] . "',
        '" . $_POST['uf'] . "',
        '" . $_POST['pais'] . "',
        '" . $_POST['email'] . "',
        '" . $_POST['telefone'] . "',
        '" . $_POST['senha'] . "'
      )";

  // Executando a query no DB
  if ($result = $_conn->query($sql))
    echo "Usuário salvo com sucesso";
  else
    echo "Falha ao salvar usuário";

  $result = getUsuarios($_conn);

  // Mostra a lista de usuários cadastrados
  $view = 'view/list.php'; // Incluindo a view de listagem
} 
// View default (caso nenhuma action seja chamada)
else {
  require('../../conexao.php');
  $result = getUsuarios($_conn);

  $view = 'view/list.php'; // Incluindo a view de listagem
}

// Inclusão do Template
include '../../template/index.php';
