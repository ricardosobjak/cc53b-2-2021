<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ClassiAuto</title>

  <link rel="stylesheet" href="<?= webroot() ?>template/css/estilo.css">
</head>

<body>

<header>
    <h1><a href="<?= webroot() ?>"><img src="<?= webroot() ?>images/logo.png" alt="ClassiAuto" /></a></h1>

    <nav>
      <ul>
        <?php
        if (isset($_SESSION['classiauto_user_id'])) {
          $login_page = webroot() . 'auth/?action=logout';
          $login_name = explode(' ', $_SESSION["classiauto_user_nome"])[0] .' (Logout)';
        } else {
          $login_page = webroot() . 'auth';
          $login_name = 'Login';
        }
        ?>
        <li><a href="<?= $login_page ?>"><?= $login_name ?></a></li>
        <li><a href="<?= webroot() ?>entidades/usuario/?action=novo">Cadastre-se</a></li>
      </ul>
    </nav>
  </header>

  <nav class="principal">
    <?php include approot() . 'template/menu.php'; ?>
  </nav>

  <main>
    <?php
    if (isset($view))
      include $view;
    ?>
  </main>

  <footer>
    Todos os direitos reservados a ClassiAuto 2021.
  </footer>

</body>

</html>