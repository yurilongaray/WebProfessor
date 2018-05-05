<?php
  session_start();
  include "conexao.php";

  $resultado_questoes = mysqli_query($conn, "SELECT nome_questao, nome_disciplina, dificuldade_questao FROM questoes WHERE id_questao = 23");
  $questao = mysqli_fetch_assoc($resultado_questoes);

  $resultado_alternativas = mysqli_query($conn, "SELECT * FROM alternativas WHERE id_questao = 23");
  
?>


<!DOCTYPE html>
<html>
<head>
 <title>Questão</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="bootstrap-datepicker.css">
 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="bootstrap-datepicker.js"></script>

<style>
 a:hover{
   text-decoration: none;
 }

 .quadro{
   width: 30%;
   font-size: 25px;
 }

 .glyphicon-log-in{
   right: 10px;
 }

 h1{
   font-weight: bold;
 }

 .centralizar{
  margin-left: 20px;
  width: 70%;
  display: block;
  margin: auto;
}

#melhorar{
 position: relative;
 font-size: 20px;
 font-weight: bold;
 left: 20px;
}

.espacamento{
  position: relative;
  margin-top: 10px;
}

#revisao{ /* Para que o campo de revisao suma é preciso dar display: none*/
  display: none;
}

#enviar{
  position: relative;
  float: right;
}

</style>

</head>

<body>
  <?php include_once"topo.php";?>

  <div class="centralizar">
    <div class="row col-md-12">
      <h1>Questão</h1>
    </div>
    <div class="row">
      <div class="col-md-3">
        <input class="form-control" id="pwd" value="<?= $questao['nome_disciplina']?>" disabled>
      </div>

      <div class="col-md-2" >
       <p id="melhorar">Dificuldade: </p>
      </div>
      <div class="col-md-1">
        <input class="form-control" style="font-weight: bold" disabled="" value="<?= $questao['dificuldade_questao']?>">
      </div>
    </div>

    <div class="row form-group col-md-12 espacamento">
     <textarea class="form-control" style="height: 150px" disabled><?= $questao['nome_questao'] ?></textarea>
    </div>
    <?php while ($row = mysqli_fetch_assoc($resultado_alternativas)) :?>
      <div class="row col-md-12">
      <input class="form-control espacamento" disabled value="<?= $row['nome_alternativa'] ?>">
    </div>
  <?php endwhile; ?>

</div>
</body>
</html>