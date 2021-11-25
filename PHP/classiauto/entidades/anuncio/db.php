<?php

  $SQL_GET_ANUNCIO_DEFAULT = "SELECT 
      tb_anuncio.id,
      tb_anuncio.descricao, 
      tb_anuncio.destaque,
      tb_anuncio.preco,
      tb_categoria.id AS categoria_id,
      tb_categoria.nome AS categoria,
      tb_marca.id AS marca_id,
      tb_marca.nome AS marca,
      tb_usuario.nome,
      tb_usuario.telefone
    FROM 
    tb_anuncio
    INNER JOIN tb_usuario
      ON tb_anuncio.id_usuario = tb_usuario.id
    INNER JOIN tb_categoria
      ON tb_anuncio.id_categoria = tb_categoria.id
    INNER JOIN tb_marca
      ON tb_anuncio.id_marca = tb_marca.id";

/**
 * Consultar os anúncios no banco de dados
 */
function getAnuncios($_conn, $categoria = null)
{
  global $SQL_GET_ANUNCIO_DEFAULT;
  $sql = $SQL_GET_ANUNCIO_DEFAULT;
  $sql .= $categoria ? ' WHERE id_categoria = ' . $categoria : '';

  #$result = $_conn->query($sql);
  return mysqli_query($_conn, $sql);
}

/**
 * Consultar os anúncios no banco de dados
 */
function getAnuncio($_conn, $id)
{
  global $SQL_GET_ANUNCIO_DEFAULT;
  $sql = $SQL_GET_ANUNCIO_DEFAULT . ' WHERE tb_anuncio.id = ' . $id;

  #$result = $_conn->query($sql);
  return mysqli_query($_conn, $sql);
}


function inserirAnuncio($_conn, $anuncio)
{
  $sql = "INSERT INTO tb_anuncio (
    destaque, 
    descricao, 
    preco,
    id_categoria,
    id_marca,
    id_usuario) VALUES (
      '" . $anuncio['destaque'] . "',
      '" . $anuncio['descricao'] . "', "
    . $anuncio['preco'] . ", "
    . $anuncio['categoria'] . ", "
    . $anuncio['marca'] . ", "
    . $anuncio['usuario'] .
    ")";

    echo $sql;
  return $_conn->query($sql);
}



/**
 * Deletar um anúncio
 */
function deletarAnuncio($_conn, $id)
{
  $sql = "DELETE FROM tb_anuncio WHERE id = " . $id;

  #$result = $_conn->query($sql);
  return mysqli_query($_conn, $sql);
}
