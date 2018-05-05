<?php
  session_start();
  include "conexao.php";

  //$nome = $_POST["nomeTeste"];

  $resultado_disciplina = mysqli_query($conn, "SELECT * FROM disciplina");


  $resultado_aluno = mysqli_query($conn, "SELECT nome_usuario FROM usuarios WHERE niveis_acesso_id = 3");

  if ($_SERVER['REQUEST_METHOD'] == 'POST') { //verifica o tipo de request
    $nome_teste             = $_POST['nome_teste'];
    $tipo_teste             = "Medição";
    $nome_usuario           = $_POST['nome_usuario'];
    $periodo_inicial        = $_POST['periodo_inicial'];
    $periodo_final          = $_POST['periodo_final'];
    $id_disciplina          = $_POST['id_disciplina'];

    //alterando os formatos das datas:
    $periodo_inicial = date_format(date_create_from_format("d-m-Y", $periodo_inicial), "Y-m-d");
    $periodo_final   = date_format(date_create_from_format("d-m-Y", $periodo_final), "Y-m-d");

    $sql_insert = "INSERT INTO teste (nome_teste, tipo_teste, nome_aluno, periodo_inicial, periodo_final, id_disciplina) VALUES ('".$nome_teste."','".$tipo_teste."','".$nome_usuario."','".$periodo_inicial."','".$periodo_final."','".$id_disciplina."')";
    
    mysqli_query($conn, $sql_insert);

    header("location: teste.php");

  } /* else { //verificando se o POST foi ou não
    echo "Não é POST";
  } */

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Criar Teste de Medição</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap-datepicker.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="bootstrap-datepicker.js"></script>

  <script>

    $(function () {
      $("#datepicker").datepicker({ 
          autoclose: true, 
          todayHighlight: true
      }).datepicker('update', new Date());;
    });

    $(function () {
      $("#datepicker1").datepicker({ 
          autoclose: true, 
          todayHighlight: true
      }).datepicker('update', new Date());;
    });

  </script>
  
  <style>
   #webprofessor{
     font-size: 25px;
     font-weight: bold;
   }

   .espaco{
     margin-left: 20px;
     font-size: 20px;
     top: 10px;
   }

   .navbar-inverse .navbar-nav>li>a{
     color: white;
   }

   .navbar-inverse .navbar-text{
     color: white;
   }

   a, a:hover{
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

  .posicao{
    position: relative;
    margin-top: 25px;
  }

  #direita{
    position: relative;
    float: right;
  }

  .borda{
    border-bottom: 3px solid;
  }

  .tamanhox{
    width: 20%;
  }

  #datepicker, #datepicker1{
    width:150px; 
    margin: 0 20px 20px 20px;
  }

  #datepicker > span:hover, #datepicker1 >span:hover{
    cursor: pointer;
  }


  </style>

</head>

<body>
  <nav class="navbar navbar-inverse" style="border-color: #E0FFFF;">
   <div class="container-fluid">
     <div class="navbar-header">
       <p class="navbar-text" id="webprofessor">WebProfessor</p>
     </div>
     <ul class="nav navbar-nav">
       <li class="espaco"><a href="home.php">Home</a></li>
       <li class="espaco"><a href="disciplinas.php">Disciplinas</a></li>
       <li class="espaco"><a href="questoes.php">Questões</a></li>
       <li class="espaco"><a href="teste.php">Teste</a></li>
       <li class="espaco"><a href="desempenho.php">Desempenho</a></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
       <li><a href="logout.php" style="font-size: 25px"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
     </ul>x
   </div>
  </nav>

  <form action="teste_medicao.php" method="POST">
    <div class="container">
      <div class="row col-md-12">
        <h1>Teste de Medição</h1>    
      </div>

      <div class="row form-group">
        <label class=" col-md-1">Nome:</label>
        <input class="form-control tamanhox" type="text" name="nome_teste">
      </div>

      <div class="row form-group">
        <label class="col-md-1">Disciplina:</label>
        <select class="form-control tamanhox" name="id_disciplina">
        <?php while ($row = mysqli_fetch_assoc($resultado_disciplina)): ?>
          <option value="<?= $row['id_disciplina'] ?>"><?= $row['nome_disciplina'] ?></option>
        <?php endwhile; ?>
        </select>
      </div>

      <div class="row form-group">
        <label class="col-md-1">Alunos:</label>
        <select class="form-control tamanhox" name="nome_usuario">
          <?php while ($row = mysqli_fetch_assoc($resultado_aluno)): ?>
            <option><?= $row['nome_usuario'] ?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="row form-group">
        <label class="col-md-1">Período Inicial: </label>
        <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
          <input class="form-control" type="text" name="periodo_inicial" readonly/>
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
        <label class="col-md-1">Período Final: </label>
        <div id="datepicker1" class="input-group date" data-date-format="dd-mm-yyyy">
          <input class="form-control" type="text" name="periodo_final" readonly/>
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
      </div>
      
      <div class="row form-group">
        <button type="submit" value="criar_teste" class="btn btn-primary col-md-1" style="margin-left: 10px;">Criar</button>
      </div>
    </div>
  </form>

</body>
</html>
