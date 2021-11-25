<?php

/**
 * CONTROLADOR: Anúncio
 */

include '../../config.php';
include 'db.php';
include '../marca/db.php';


// Verificar qual é a ação que o usuário deseja executar
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;

// Exibir o formulário para cadastrar um novo anúncio
if ($action == "novo") {
  $marcas = getMarcas($_conn);
  $hasErros = false;
  $view = 'view/form.php'; // Incluindo a view de cadastro
}
// Exibir o formulário para editar um anúncio existente
else if ($action == "editar") {
  $result = getAnuncio($_conn, $_REQUEST['id']);

  if ($result)
    $anuncio = $result->fetch_array();

  $marcas = getMarcas($_conn);
  $hasErros = false;
  $view = 'view/form.php'; // Incluindo a view de edição
}
// Salvar no DB um anúncio
else if ($action == "salvar") {
  // Executando a query no DB
  $_POST['usuario'] = $_SESSION['classiauto_user_id'];

  $id = $_POST['id'];

  if (isset($id) && $id > 0) {
    echo "update";

    $sql = "UPDATE tb_anuncio SET destaque = '" . $_POST['destaque'] . "', 
      descricao = '" . $_POST['descricao'] . "', 
      preco = " . $_POST['preco'] . ", 
      id_categoria = " . $_POST['categoria'] . ", 
      id_marca = " . $_POST['marca'] . "
      WHERE id = " . $_POST['id'];

    if ($result = mysqli_query($_conn, $sql))
      echo "Anúncio salvo com sucesso";
    else
      echo "Falha ao salvar anúncio";

/*
    if ($result = atualizarAnuncio($_conn, $_POST))
      echo "Anúncio salvo com sucesso";
    else
      echo "Falha ao salvar anúncio";
  */
  } else {
    if ($result = inserirAnuncio($_conn, $_POST))
      echo "Anúncio salvo com sucesso";
    else
      echo "Falha ao salvar anúncio";
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

// Incluir o arquivo de template da aplicação
include approot() . 'template/index.php';
