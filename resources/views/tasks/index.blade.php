@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="jumbotron text-center">
            <h1>Bienvenido a Mi Aplicación</h1>
            <p class="lead">Aquí puedes encontrar todas tus tareas.</p>
            <hr>
            <a class="btn btn-primary" href="{{ route('tasks.create') }}" role="button">Crear Tarea</a>
            <div class="col-md-12">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('errors'))
                <div class="alert alert-danger">
                    {{ session('errors') }}
                </div>
                @endif
                <h1></h1>
                @foreach ($tasks as $task)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->title }}</h5>
                        <p class="card-text">{{ $task->description }}</p>
                        <div class="row d-flex justify-content-center align-items-center">
                            <a href="{{ route('tasks.edit', [$task->id]) }}" class="btn btn-secondary btn-xs">Editar</a>
                            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" onsubmit="return confirm('Seguro que quiere eliminar la tarea?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
