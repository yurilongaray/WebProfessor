<?php
  session_start();
  include "conexao.php";

  //Criando os "Counts", os resultados das pesquisas abaixo serão utilizados nos mysqli_num_rows que efetuará o count da quantidade de rows
  $resultado_questoes_avaliar   = mysqli_query($conn, "SELECT * FROM questoes"); 
  $resultado_provas_validar     = mysqli_query($conn, "SELECT * FROM teste");
  $resultado_questoes_aprovadas = mysqli_query($conn, "SELECT * FROM questoes");
  $resultado_alunos_desempenho  = mysqli_query($conn, "SELECT * FROM usuarios WHERE niveis_acesso_id = 3");
  $resultado_provas_aberto      = mysqli_query($conn, "SELECT * FROM teste");
  $resultado_rascunhos          = mysqli_query($conn, "SELECT * FROM teste");

  $avaliar    = mysqli_num_rows($resultado_questoes_avaliar);
  $validar    = mysqli_num_rows($resultado_provas_validar);
  $aprovadas  = mysqli_num_rows($resultado_questoes_aprovadas);
  $desempenho = mysqli_num_rows($resultado_alunos_desempenho);
  $aberto     = mysqli_num_rows($resultado_provas_aberto);
  $rascunhos  = mysqli_num_rows($resultado_rascunhos);

?>

<!DOCTYPE html>
<html>
<head>
 <title>Home</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="bootstrap-datepicker.css">
 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="bootstrap-datepicker.js"></script>

 <style>
 a, a:hover{
   text-decoration: none;
 }


 .calendario{
   font-size: 20px;
   float: right;
 }

 .badge{
   width: 60px;
   height: 20px;
   font-size: 15px;
   float: right;
  }

 .quadro{
  font-size: 20px;
  font-style: italic;
 }

 .glyphicon-log-in{
   right: 10px;
 }

 h1{
   font-weight: bold;
 }

 .ajustar{
    position: relative;
    width: 90%;
    margin: auto;
 }

 </style>

 <script>

  $(function () {
    $('#datepicker').datepicker();
  });
</script>

</head>

<body>
  
  <!-- Incluindo navbar com opções no topo -->
  <?php include_once"topo.php" ?>  
  
  <div class="container">
    <div class="col-md-5 quadro">
      <h1>Avisos</h1>
      <a href="#">Questões para avaliar <span class="badge"><?= $avaliar; ?></span></a><br>
      <a href="#">Provas para validar <span class="badge"><?= $validar; ?></span></a><br>
      <a href="#">Questões aprovadas <span class="badge"><?= $aprovadas; ?></span></a><br>
      <br>
      <h1>Pendências</h1>
      <a href="#">Alunos para avaliar desempenho <span class="badge"><?= $desempenho; ?></span></a><br>
      <a href="#">Provas em aberto <span class="badge"><?= $aberto; ?></span></a><br>
      <a href="#">Rascunhos de prova <span class="badge"><?= $rascunhos; ?></span></a><br>
      <br>
      <h1>Links</h1>
      <a href="#">Solicitar disciplina </a><br>
      <a href="teste.php">Criar avaliação </a><br>
      <a href="#">Analisar desempenho </a>
    </div>

    <div class="col-md-3 calendario" style="float: right;">
     <div>
      <div id="datepicker"> <!-- Calendario -->
      </div>
     </div>
    </div>
  </div>

</body>
</html>
