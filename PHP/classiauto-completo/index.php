<?php
  include 'config.php';
  include 'conexao.php';

  require 'entidades/anuncio/db.php';
  require 'entidades/categoria/db.php';
  require 'entidades/marca/db.php';

  $view = 'entidades/anuncio/view/list_public.php';

  $categoria = @$_REQUEST['categoria'];

  $result = getAnuncios($_conn, $categoria);

  include 'template/index.php';
