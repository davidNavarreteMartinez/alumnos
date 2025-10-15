@extends('layouts.app')

@section('content')
<h1>Crear Alumno</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('alumnos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Código</label>
        <input type="text" name="codigo" class="form-control" value="{{ old('codigo') }}">
    </div>
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
    </div>
    <div class="mb-3">
        <label>Correo</label>
        <input type="email" name="correo" class="form-control" value="{{ old('correo') }}">
    </div>
    <div class="mb-3">
        <label>Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}">
    </div>
    <div class="mb-3">
        <label>Sexo</label>
        <select name="sexo" class="form-control">
            <option value="M" {{ old('sexo')=='M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ old('sexo')=='F' ? 'selected' : '' }}>Femenino</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Carrera</label>
        <input type="text" name="carrera" class="form-control" value="{{ old('carrera') }}">
    </div>
    <button class="btn btn-primary">Crear</button>
    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Regresar al listado</a>

</form>
@endsection
