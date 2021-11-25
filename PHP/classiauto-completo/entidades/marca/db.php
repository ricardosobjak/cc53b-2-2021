<?php

function getMarcas($_conn)
{
  $sql = "SELECT * FROM tb_marca ORDER by nome";
  return $_conn->query($sql);
}
