<?php 
  function mostrarTexto($nome = "Juca") {
    echo "Oi " . $nome;
  }

  function soma($a, $b) {
    return $a + $b;
  }

  mostrarTexto('Barnabé');

  $res = soma(4, 6);
  echo "<br> $res";
?>