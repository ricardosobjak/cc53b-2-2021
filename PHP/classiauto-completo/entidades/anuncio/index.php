<?php
// Controlador da entidade "Anúncio"
require '../../config.php';

if (!sessionValid()) exit;

require './db.php';
require '../categoria/db.php';
require '../marca/db.php';



/**
 * Validar os campos do formulário
 */
function formValido($arr)
{
  return !empty($arr['destaque'])
    && !empty($arr['descricao'])
    && !empty($arr['categoria'])
    && !empty($arr['marca']);
}

$action = isset($_REQUEST['action'])
  ? $_REQUEST['action'] : null;

if ($action == "novo") {
  $hasErros = false;

  $categorias = getCategorias($_conn);
  $marcas = getMarcas($_conn);

  $view = 'view/form.php'; // Incluindo a view de cadastro
} else if ($action == "editar") {
  $hasErros = false;

  $categorias = getCategorias($_conn);
  $marcas = getMarcas($_conn);

  $result = getAnuncio($_conn, $_REQUEST['id']);
  if ($result)
    $anuncio = $result->fetch_array();

  $view = 'view/form.php'; // Incluindo a view de edição
} else if ($action == "salvar") {
  if (!formValido($_POST)) {
    $anuncio = $_POST;
    $hasErros = true;
    include 'view/form.php';
    exit;
  }


  if (array_key_exists("id", $_POST)) {
    $sql = "UPDATE tb_anuncio SET destaque = '" . $_POST['destaque'] . "', 
      descricao = '" . $_POST['descricao'] . "', 
      preco = " . $_POST['preco'] . ", 
      id_categoria = " . $_POST['categoria'] . ", 
      id_marca = " . $_POST['marca'] . "
      WHERE id = " . $_POST['id'];

  } else {
    $sql = "INSERT INTO tb_anuncio (
      destaque, 
      descricao, 
      preco,
      id_categoria,
      id_marca,
      id_usuario) VALUES (
        '" . $_POST['destaque'] . "',
        '" . $_POST['descricao'] . "', "
      . $_POST['preco'] . ", "
      . $_POST['categoria'] . ", "
      . $_POST['marca'] . ", "
      . '1' .
      ")";
  }

  // Executando a query no DB
  if ($result = $_conn->query($sql)) {
    echo "Anúncio salvo com sucesso";
    $result = getAnuncios($_conn);

    // Mostra a lista de anúncios cadastrados
    $view = 'view/list.php'; // Incluindo a view de listagem
  } else {
    print_r($_conn);
    echo "Falha ao salvar anúncio";
    include 'view/form.php'; // Incluindo a view de cadastro
  }
}
// Excluir Anúncio
else if ($action == "excluir") {
  if (isset($_POST['id']))
    deletarAnuncio($_conn, $_POST['id']);
}

// Se nenhuma ação for especificada, então mostra a listagem 
if (!isset($view) || $view == 'view/list.php') {
  $result = getAnuncios($_conn);

  $view = 'view/list.php'; // Incluindo a view de listagem
}

include "../../template/index.php";
