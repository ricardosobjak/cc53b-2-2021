<?php
  function getCategorias($_conn) {
    $sql = "SELECT * FROM tb_categoria ORDER BY nome";

    return $_conn->query($sql);
  }
?>