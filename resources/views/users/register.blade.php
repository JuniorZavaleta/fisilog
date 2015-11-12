<!DOCTYPE html>
<html>
<head>
	<title>Registro de Usuario</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style type="text/css">
	.container {
		padding: 10px;
	}
	</style>
</head>
<body class="container">
	<div class="container">
		<div class="row">
			<h2>Registrar usuario</h2>
		</div>
		<div class="row">
			<div class="form-container">
				{!! Form::open(array('route'=>'user.register.process', 'class'=>'form-horizontal', 'method'=>'POST')) !!}
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label">Nombre</label>
					</div>
					<div class="col-sm-4">
						{!! Form::text('name', null ,['class'=>'form-control','placeholder'=>'Ingrese sus nombres']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label">Apellidos</label>
					</div>
					<div class="col-sm-4">
						{!! Form::text('lastname', null ,['class'=>'form-control','placeholder'=>'Ingrese sus apellidos']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label">Tipo Usuario</label>
					</div>
					<div class="col-sm-4">
						{!! Form::select('type', 
						[ 0 => 'Seleccione el tipo de Usuario',
						  1 => 'Alumno',
						  2 => 'Docente',
						] , 0, 
						['class'=>'form-control',]) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label">Tipo de documento</label>
					</div>
					<div class="col-sm-4">
						<select class="form-control">
							<option value="0">Seleccione un tipo de Documento</option>
							@foreach($document_types as $document_type)
								<option value="{{$document_type->id}}">{{$document_type->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</body>
</html>