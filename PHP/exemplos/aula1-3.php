<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabuada</title>
</head>

<body>
  <?php $tabuada = 10; ?>

  <h1>Tabuada do número <?= $tabuada ?></h1>

  <table border="1">
    <tr>
      <td>A</td>
      <td>B</td>
      <td>Resultado</td>
    </tr>

    <?php
    for ($i = 0; $i <= 10; $i++) {
      echo "<tr>
          <td>$tabuada</td>
          <td>$i</td>
          <td>" . $tabuada * $i . "</td>
        </tr>";
    }
    ?>
  </table>


  <table border="1">
    <tr>
      <td>A</td>
      <td>B</td>
      <td>Resultado</td>
    </tr>

    <?php for ($i = 0; $i <= 10; $i++) : ?>
      <tr>
        <td><?= $tabuada ?></td>
        <td><?= $i ?></td>
        <td><?= $tabuada * $i ?></td>
      </tr>
    <?php endfor; ?>

  </table>

</body>

</html>