<?php
  //error_reporting(0);

// Inicializar a sessão
session_start();

$CONFIG['webroot'] = '/aula-2-2021/classiauto/';

// Caminho absoluto da aplicação dentro do servidor web
function webroot()
{
  global $CONFIG;
  return $CONFIG['webroot'];
}

// Caminho absoluto da aplicação dentro do sistema de arquivos
function approot()
{
  global $CONFIG;
  return $_SERVER['DOCUMENT_ROOT'] . '/' . $CONFIG['webroot'];
}


// Inclui a conexão com o Banco de Dados
require_once approot() . 'conexao.php';
