@extends('layouts.app-master')
@section('content')
    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Crear Asignación De Horarios</h1>
        </div>
        <div class="card-header d-inline-flex">
            <a href="{{ route('detalleTurnos.index') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{route('detalleTurnos.store')}}" method="POST" enctype="multipart/form-data" id="create">
                @include('detalleTurnos.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <Button class="btn btn-primary" form="create">
                <i class="fas fa-plus"></i> Crear
            </Button>
        </div>
    </div>
@endsection