@extends('app')
@section('content')
<title>
    Home
</title>

<div class="panel panel-primary">
  <!-- Default panel contents -->
      <div class="panel-heading">
            <div class="row">
                <div class="col-md-11">Clases del día</div>
                <div class="col-md-1">
                    <a href="#" style="color:white">Mis cursos</a>
                </div>
            </div>
      </div>
  <!-- Table -->
  <table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Grupo</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Aula</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <a href="#">Diseño de software</a>
            </td>
            <td>1</td>
            <td>13:00</td>
            <td>18:00</td>
            <td>101</td>
            <td>Iniciada</td>
        </tr>
        <tr>
            <td>
                <a href="#">Diseño de software</a>
            </td>
            <td>2</td>
            <td>13:00</td>
            <td>18:00</td>
            <td>107</td>
            <td>No iniciada</td>
        </tr>
    </tbody>
  </table>
</div>

@endsection