<?php 
  include "conexao.php";

  $resultado_disciplina = mysqli_query($conn, "SELECT * FROM disciplina");

  /* Exemplo de query
  SELECT turma.nome_turma FROM turma, disciplina WHERE turma.id_disciplina = disciplina.id_disciplina AND disciplina.id_disciplina = 3;
  */

?>

<!DOCTYPE html>
<html>
<head>
 <title>Disciplinas</title><meta charset="utf-8">
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
  
  <div class="row centralizar">
    <div class="col-md-12 filterable">
      <table class="table table-hover" style="border: 1px solid">
      <thead>
        <tr class="filters">
          <th class="filtrar">Disciplinas<span class="caret"></span><input type="text" class="form-control" disabled></th>
          <th class="filtrar">Turmas <input type="text" class="form-control" disabled></th>
        </tr>
      </thead>
      <tbody>
       <tr>
        <td><a href="#">Programação I</a></td>
        <td><a href="#">BSI001</a>, <a href="#">ECP001</a></td>
      </tr>
      <tr>
        <td><a href="#">Estrutura de Dados</a></td>
        <td><a href="#">BSI001</a></td>
      </tr>
      <tr>
        <td><a href="DetalhesDisciplinas.html">Programação Orientada a Objetos</a></td>
        <td><a href="#">ECP001</a></td>
      </tr>
      <tr>
        <td><a href="#">Redes de Alto Desempenho</a></td>
        <td><a href="#">BSI001</a>, <a href="#">ECP001</a>, <a href="#">BSI351</a></td>
      </tr>
      <tr>
        <td><a href="#">Redes de Computadores</a></td>
        <td><a href="#">BSI331</a></td>
      </tr>
      <tr>
        <td><a href="#">Avaliação de Desempenho</a></td>
        <td><a href="#">BSI301</a></td>
      </tr>
    </tbody>
  </table>
</div>
</div>

</body>
</html>
