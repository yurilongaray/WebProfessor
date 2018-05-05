<?php
  session_start();
  include "conexao.php";

  $resultado_questoes = mysqli_query($conn, "SELECT * FROM questoes ORDER BY nome_disciplina");

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

  /* Efetuando filtros: */
  $(document).ready(function(){
    $('.filtrar').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
  });

  </script>


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
      width: 70%;
      display: block;
      margin: auto;
    }

    .filterable .filters input[disabled] {
        background-color: transparent;
        border: none;
        cursor: auto;
        box-shadow: none;
        padding: 0;
        height: auto;
    }
    .filterable .filters input[disabled]::-webkit-input-placeholder {
        color: #333;
    }
    .filterable .filters input[disabled]::-moz-placeholder {
        color: #333;
    }
    .filterable .filters input[disabled]:-ms-input-placeholder {
        color: #333;
    }


  </style>

</head>

<body>
  <?php include_once"topo.php"; ?>

  <div class="container">
    <div class="filterable">  
        <h1>Questões</h1>
        <table class="table table-hover">
          <thead>
            <tr class="filters">
              <th class="filtrar">Enunciado <span class="caret"></span><input type="text" class="form-control" disabled></th>
              <th class="filtrar">Disciplina  <span class="caret"></span><input type="text" class="form-control" disabled></th>
              <th class="filtrar">Dificuldade  <span class="caret"></span><input type="text" class="form-control" disabled></th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($resultado_questoes)): ?>
            <tr>
              <td class="col-md-4"><?= $row['nome_questao'] ?></td>
              <td class="col-md-2"><?= $row['nome_disciplina'] ?></td>
              <td class="col-md-2" style="font-weight: bold;"><?= $row['dificuldade_questao'] ?></td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
  </div>


</body>
</html>
