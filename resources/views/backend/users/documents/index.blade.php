@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="col-xs-12">
      <h2>Lista de Documentos de {{ $user->name . " " . $user->lastname }}</h2>
   </div>
</div>

<div class="row">

   <table class="table">
      <thead>
         <th>Tipo de Documento</th>
         <th>Nº de Documento</th>
         <th>Acciones</th>
      </thead>
      <tbody>
         @foreach($documents as $document)
         <tr>
            <td>{{ $document->document_type->name }}</td>
            <td>{{ $document->code }}</td>
            <td>

            </td>
         </tr>
         @endforeach
      </tbody>
   </table>

</div>

<div class="row">
   <div class="form-group">

   </div>
</div>

@endsection