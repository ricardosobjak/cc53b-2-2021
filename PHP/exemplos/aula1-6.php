<?php
  // Arrays

  $frutas = array("Maçã", "Banana", "Morango", "Abacaxi");
  $cidades = ["Medianeira", "Curitiba", "Cascavel"];

  print_r($frutas);
  echo "<hr/>";

  print_r($cidades);
  echo "<hr/>";

  // Adicionando elementos ao array
  array_push($frutas, "Amora");
  array_push($frutas, "Abacate", "Laranja", "Uva");

  // Alterando o valor de um elemento do array
  $frutas[0] = "Jaca";

  // Ordenando arrays
  //sort($frutas);
  rsort($frutas);

  // Percorrendo um array
  foreach($frutas as $f) {
    echo $f . " - ";
  }

  echo "<hr/>";

  for($i=0; $i<count($frutas); $i++) {
    echo $frutas[$i] . " - ";
  }

  echo "<hr/>";

  // Array com chave string
  $endereco['logradouro'] = "Rua X";
  $endereco['numero'] = 1445;
  $endereco['cep'] = "85884-000";
  $endereco['cidade'] = "Medianeira";

  print_r($endereco)

?>