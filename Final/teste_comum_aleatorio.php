<?php
  session_start();
  include "conexao.php";

  $resultado_questoes = mysqli_query($conn, "SELECT * FROM questoes ORDER BY id_questao");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Criar Teste</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap-datepicker.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="bootstrap-datepicker.js"></script>

  <script>
  $(function() {
    $(".numbers-row").append('<div class="button btn btn-primary"> + </div><span> </span><div type="button" class="button btn btn-danger"> - </div>');
    $(".button").on("click", function() {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    if ($button.text() == " + ") {
      var newVal = parseFloat(oldValue) + 1;
    } else {
       // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
        } else {
        newVal = 0;
        }
      }
    $button.parent().find("input").val(newVal);
    });
  });
  </script>

  
  <style>
   a, a:hover{
     text-decoration: none;
   }

   .glyphicon-log-in{
     right: 10px;
   }

   h1, h2, h3{
     font-weight: bold;
   }

  .afastartop{
    position: relative;
    top: 30px;
  }

  .borda{
    border: 3px solid;
  }

  #quantity{
    width: 50px;
  }

  .tamanho{
    width: 50px;
    height: 30px;
  }
  
  </style>

</head>

<body>
  <?php include_once"topo.php"; ?>

  <div class="container afastartop">
    <h1>Quantidade de Questões</h1>
    <form method="post" action="">
    <div class="numbers-row">
      <label for="name">Dificuldade 1:</label>
      <input type="text" class="tamanho" name="dificuldade1" value="0">
    </div>
    <br>
    <div class="numbers-row">
      <label for="name">Dificuldade 2:</label>
      <input type="text" class="tamanho" name="dificuldade2" value="0">
    </div>
    <br>
    <div class="numbers-row">
      <label for="name">Dificuldade 3:</label>
      <input type="text" class="tamanho" name="dificuldade3" value="0">
    </div>
    <br>
    <div class="numbers-row">
      <label for="name">Dificuldade 4:</label>
      <input type="text" class="tamanho" name="dificuldade4" value="0">
    </div>
    <br>
    <div class="numbers-row">
      <label for="name">Dificuldade 5:</label>
      <input type="text" class="tamanho" name="dificuldade5" value="0">
    </div>
    <div class="buttons">
      <input type="submit" value="Criar" class="btn btn-success">
    </div>
    </form>
</div>
</body>
</html>
