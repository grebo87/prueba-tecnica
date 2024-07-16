@extends('layouts.app')

@section('title', 'Editar Tarea')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="jumbotron text-center">
            <h1>Bienvenido a Mi Aplicación</h1>
            <hr>
            <div class="col-md-12">
                <h1></h1>
                <h2>Editar Tarea</h2>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <div class="form-group">
                        <label for="title">Título:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
                    <a href="{!! route('tasks.index') !!}" onclick="return confirm('¿Está seguro de cancelar la operación?')" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
