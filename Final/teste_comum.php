<?php
  session_start();
  include "conexao.php";

  $resultado_questoes_temporario = mysqli_query($conn, "SELECT * FROM questoes ORDER BY id_questao");
  $resultado_questoes            = mysqli_query($conn, "SELECT * FROM questoes ORDER BY id_questao");
  $resultado_disciplina          = mysqli_query($conn, "SELECT * FROM disciplina ORDER BY nome_disciplina");
  $resultado_dificuldade         = mysqli_query($conn, "SELECT DISTINCT dificuldade_questao FROM questoes ORDER BY dificuldade_questao");

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

  .centralizargeral{
    position: relative;
    margin: auto;
    width: 50%;
    display: block;
  }
  
  .centralizartitulo{
    width: 200px;
    margin: auto;
  }


  .posicao{
    position: relative;
    margin-top: 25px;
  }

  .afastartop{
    position: relative;
    top: 10px;
  }

  #entrar{
    position: relative;
    float: right;
    right: 50px;
  }
  
  #paradireita{
    position: relative;
    left: 15px;
  }

  </style>

</head>

<body>
<?php include_once"topo.php"; ?>
<form>
  <div class="container centralizargeral">
    <div class="form-group afastartop">
      <h2 class="centralizartitulo">Teste Comum</h2>    
      <label>Disciplina:</label>
      <select class="form-control">
        <?php while ($row = mysqli_fetch_assoc($resultado_disciplina)): ?>
        <option><?= $row['nome_disciplina'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="form-group afastartop">
      <label>Assunto:</label>
      <select class="form-control">
        <?php while ($row = mysqli_fetch_assoc($resultado_questoes_temporario)): ?>
        <option><?= $row['nome_questao'] ?></option>
        <?php endwhile; ?>
      </select>
      </div>
    <div class="form-group afastartop">
      <label>Dificuldade:</label>
      <select class="form-control">
        <?php while($row = mysqli_fetch_assoc($resultado_dificuldade)):?>
        <option><?= $row["dificuldade_questao"] ?></option>
        <?php endwhile;?>
      </select>
    </div>
    <br>
    <br>
    <div class="table-responsive">          
    <table class="table">
      <thead>
        <tr>
          <th class="col-md-1">Id</th>
          <th class="col-md-4">Questão</th>
          <th class="col-md-1">Inserir</th>
          </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultado_questoes)): ?>
        <tr>
          <td class="col-md-1"><?= $row["id_questao"]  ?></td>
          <td class="col-md-4"><?= $row["nome_questao"]?></td>
          <td class="col-md-1" id="paradireita"><input type="checkbox" name="inserir"></td>
        </tr>
        <?php endwhile; ?>      
      </tbody>
    </table>
    <button type="submit" class="btn btn-success" id="entrar">Criar</button>
    </div>
  </div>
</form>
<br>
</body>
</html>
