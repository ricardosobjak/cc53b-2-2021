<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
    $idade = 18;
  ?>

  <h1>Pode dirigir?</h1>

  <p>
    Alguém com <?php echo $idade; ?> anos 
    <?php if($idade < 18) echo "não"; ?> pode dirigir!
  </p>

  <p>
    Alguém com <?= $idade ?> anos 
    <?= ($idade < 18) ? "não" : "" ?> pode dirigir!
  </p>
</body>

</html>