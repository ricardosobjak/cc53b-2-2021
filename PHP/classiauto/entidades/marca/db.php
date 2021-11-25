<?php
  function getMarcas($_conn) {
    $sql = "SELECT * FROM tb_marca ORDER BY nome";

    return $_conn->query($sql);
  }
?>