<?php
  include 'config.php';
  include approot() . 'entidades/anuncio/db.php';

  $categoria = @$_REQUEST['categoria'];

  // Disponibilizar os anúncios para a view apresentar
  $result = getAnuncios($_conn, $categoria);

  $view = approot() . 'entidades/anuncio/view/list_public.php';

  include 'template/index.php';
?>