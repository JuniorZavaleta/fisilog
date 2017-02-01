@extends('backend.layout.base')

@section('content')
<title>Registro de Usuario</title>
<style type="text/css">
   .form-horizontal .control-label{
    text-align: left;
   }
</style>
<script src="{{ url('js/users/register/main.js') }}"></script>
<script type="text/javascript">
   var user_type_selected = "{{ old('user_type') }}";
</script>

<div class="row">
   <div class="col-xs-12">
      <h2>Registrar usuario</h2>
   </div>
</div>

@include('backend.show_errors')

<div class="row">
   <form class="form-horizontal" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <div class="col-sm-6">
         <!-- Start container -->
         <div class="form-container">
            <!-- Start Nombres -->
            <div class="form-group">

               <div class="col-sm-4">
                  <label class="control-label">Nombre</label>
               </div>

               <div class="col-sm-8">
                  <input type="text" class="form-control" name="name" placeholder="Ingrese sus nombres" value="{{ old('name') }}">
               </div>

            </div>
            <!-- End Nombres -->

            <!-- Start Apellidos -->
            <div class="form-group">

               <div class="col-sm-4">
                  <label class="control-label">Apellidos</label>
               </div>

               <div class="col-sm-8">
                  <input type="text" class="form-control" name="lastname" placeholder="Ingrese sus apellidos" value="{{ old('lastname') }}">
               </div>

            </div>
            <!-- End Apellidos -->

            <!-- Start Tipo Usuario -->
            <div class="form-group">

               <div class="col-sm-4">
                  <label class="control-label">Tipo Usuario</label>
               </div>

               <div class="col-sm-8">
                  <select id="user_type" name="user_type" class="form-control">
                     <option value="0" >Seleccione el tipo de Usuario</option>
                     @foreach($user_types as $user_type)
                        <option value="{{ $user_type->getId() }}" {{ old('user_type') == $user_type->getId() ? 'selected' : '' }} >{{ $user_type->getRealName() }}</option>
                     @endforeach
                  </select>
               </div>

            </div>
            <!-- End Tipo Usuario -->

            <!-- Start Tipo de documento -->
            <div class="form-group">

               <div class="col-sm-4">
                  <label class="control-label">Tipo de documento</label>
               </div>

               <div class="col-sm-8">
                  <select name="document_type" class="form-control">
                     <option value="0" >Seleccione un tipo de Documento</option>
                  @foreach($document_types as $document_type)
                     <option value="{{$document_type->getId()}}" {{ old('document_type') == $document_type->getId()  ? 'selected' : '' }} >{{$document_type->getName()}}</option>
                  @endforeach
                  </select>
               </div>

            </div>
            <!-- End Tipo de documento -->

            <!-- Start Numero de documento -->
            <div class="form-group">

               <div class="col-sm-4">
                  <label class="control-label">Número de Documento</label>
               </div>

               <div class="col-sm-8">
                  <input type="text" class="form-control" name="document_code" placeholder="Ingrese el número de documento" value="{{ old('document_code') }}">
               </div>

            </div>
            <!-- End Numero de documento -->

            <!-- Start Telefono -->
            <div class="form-group">

               <div class="col-sm-4">
                  <label class="control-label">Telefono</label>
               </div>

               <div class="col-sm-8">
                  <input type="text" class="form-control" name="phone" placeholder="Ingrese su telefono" value="{{ old('phone') }}">
               </div>

            </div>
            <!-- End telefono -->

            <!-- Start email -->
            <div class="form-group">

               <div class="col-sm-4">
                 <label class="control-label">E-mail</label>
               </div>

               <div class="col-sm-8">
                  <input type="text" name="email" class="form-control" placeholder="Ingrese su e-mail" value="{{ old('email') }}">
               </div>

            </div>
            <!-- End email -->

            <!-- Start password -->
            <div class="form-group">

               <div class="col-sm-4">
                 <label class="control-label">Password</label>
               </div>

               <div class="col-sm-8">
                  <input type="password" name="password" class="form-control" placeholder="Ingrese su password" value="">
               </div>

            </div>
            <!-- End password -->
         </div>
      </div>
      <!-- End primera columna -->

      <!-- Start segunda columna -->
      <div class="col-sm-6">
         <!-- Start Foto -->
         <div class="form-group">

            <div class="col-sm-3">
               <label class="control-label">Foto</label>
            </div>

            <div class="col-sm-9">
                <input type="file" name="photo" style="width: 100%;">
                   {{-- {!! Form::file('photo', ['style'=>'width:100%']) !!} --}}
            </div>

         </div>
         <!-- End Foto -->

         <!-- Start EAP -->
         <div class="form-group student-field" hidden>

            <div class="col-sm-3">
               <label class="control-label">EAP</label>
            </div>

            <div class="col-sm-9">
               <select name="school_id" class="form-control">
                  <option value="0" selected>Seleccione la EAP del alumno</option>
               @foreach($schools as $school)
                   <option value="{{ $school->getId() }}">{{ $school->getName() }}</option>
               @endforeach
               </select>
            </div>

         </div>
         <!-- End EAP -->

         <!-- Start Codigo -->
         <div class="form-group student-field" hidden>

            <div class="col-sm-3">
               <label class="control-label">Código</label>
            </div>

            <div class="col-sm-9">
               <input type="text" name="student_code" class="form-control" placeholder="Ingrese el código de alumno del estudiante" value="{{ old('student_code') }}">
            </div>

         </div>
         <!-- End Codigo -->

         <!-- Start año de ingreso -->
         <div class="form-group student-field" hidden>

            <div class="col-sm-3">
               <label class="control-label">Año de ingreso</label>
            </div>

            <div class="col-sm-9">
               <input type="text" name="year_of_entry" class="form-control" placeholder="Ingrese el año de ingreso del estudiante" value="{{ old('year_of_entry') }}">
            </div>

         </div>
         <!-- End año de ingreso -->

         <!-- Start tipo de profesor -->
         <div class="form-group professor-field" hidden>

            <div class="col-sm-3">
               <label class="control-label">Tipo de profesor</label>
            </div>

            <div class="col-sm-9">
               <select name="professor_type" class="form-control">
                  <option value="0" selected>Seleccione el tipo de profesor</option>
               @foreach($professor_types as $id => $name)
                  <option value="{{$id}}">{{$name}}</option>
               @endforeach
               </select>
            </div>

         </div>
         <!-- End tipo de profesor -->

         <!-- Start departamento academico -->
         <div class="form-group professor-field" hidden>

            <div class="col-sm-3">
               <label class="control-label">Dep. Academico</label>
            </div>

            <div class="col-sm-9">
               <select name="academic_department_id" class="form-control">
                  <option value="0" selected>Seleccione el Dep. Academico del profesor</option>
               @foreach($academic_departments as $academic_department)
                  <option value="{{$academic_department->getId()}}">{{$academic_department->getName()}}</option>
               @endforeach
               </select>
            </div>

         </div>
         <!-- End departamento academico -->

         <div class="form-group">
            <div class="col-sm-6">
               <button class="btn btn-primary" name="registerButton" type="submit" value="register">Registrar</button>
            </div>
         </div>

      </div>

   </form>

</div>
@endsection
