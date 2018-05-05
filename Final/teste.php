<? php
  session_start();
  include "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


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

   h1, h2, h3, h4, h5{
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

  #melhorar{
   position: relative;
   font-size: 20px;
   font-weight: bold;
   margin-top: -3px;
 }

 .borda{
  border-bottom: 3px solid;
  }
  
  a, a:hover{
    text-decoration: none;
    color: white;
  }

</style>

</head>

<body>
  <?php include_once"topo.php"; ?>
  
  <div class="container">
    <div class="row borda">
      <div class="col-md-2">
        <h1>Testes</h1>
      </div>
      <div class="col-md-1 posicao">
        <h5 style="float: right;">Criar:</h5>
      </div>
      <div class="col-md-1 posicao">
        <a href="teste_medicao.php"><button type="button" class="btn btn-primary">Medição</button></a>
      </div>
      <div class="col-md-1 posicao">
        <a href="teste_comum.php"><button type="button" class="btn btn-success">Comum</button></a>
      </div>
      <div class="col-md-1 posicao">
        <a href="teste_comum_aleatorio.php"><button type="button" class="btn btn-success">Aleatório</button></a>
      </div>
      <div class="row col-md-3 posicao" id="direita">
        <input class="form-control" placeholder="Procurar..." >
      </div>
    </div>

  <div class="row posicao borda">   
    <div class="col-md-2" >
      <p id="melhorar">Tipo: </p>
    </div>

    <div class="col-md-2" >
      <label class="radio-inline negrito"><input type="radio" name="optradio">Agendado</label>
    </div>
    <div class="col-md-2" >
      <label class="radio-inline negrito"><input type="radio" name="optradio">Aplicado</label>
    </div>
    <div class="col-md-2" >
      <label class="radio-inline negrito"><input type="radio" name="optradio">Rascunho</label>
    </div>
  </div>
  <div class="table-responsive">          
    <table class="table">
      <thead>
        <tr>
          <th>Prova <span class="caret"></span></th>
          <th>Disciplina <span class="caret"></span></th>
          <th>Status <span class="caret"></span></th>
          <th>Data <span class="caret"></span></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Parcial I</td>
          <td>Programação I</td>
          <td>Rascunho</td>
          <td>N/A</td>
        </tr>      
        <tr class="active">
          <td>Semestral</td>
          <td>Programação I</td>
          <td>Aplicada</td>
          <td>04/05/2016</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
