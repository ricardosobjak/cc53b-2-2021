<?php 
  // Trabalhando com datas

  $d = getdate();

  print_r($d);

  echo "<hr>";
  
  var_dump($d);

  echo "<hr>";

  $d['wday'] = 0;

  switch( $d['wday'] ) {
    case 5:  
      echo "Finalmente sexta!"; 
      break;
    case 6:
      echo "Sabadão!";
      break;
    case 0: echo "Domingão fazendo trabalho de PHP!"; break;
    default: 
      echo "Aguardando sexta-feira!";
  }

  echo "<hr>";

  $i = 0;
  while($i < 10) {
    echo $i++ . " ";
  }
  
  echo "<hr>";

  do {
    echo $i-- . " ";
  } while($i > 0);

?>