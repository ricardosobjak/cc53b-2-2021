<?php

/**
 * Consultar os anúncios no banco de dados
 */
function getAnuncios($_conn, $categoria = null)
{
  $sql = "SELECT 
          tb_anuncio.id,
          tb_anuncio.descricao, 
          tb_anuncio.destaque,
          tb_categoria.nome AS categoria,
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

  $sql .= $categoria ? ' WHERE id_categoria = ' . $categoria : '';

  #$result = $_conn->query($sql);
  return mysqli_query($_conn, $sql);
}
?>