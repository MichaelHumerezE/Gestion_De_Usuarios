@extends('layouts.app-master')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h1>Roles</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <a class="navbar-brand">Listar</a>
                        <select class="form-select" id="limit" name="limit">
                            @foreach ([10, 20, 50, 100] as $limit)
                                <option value="{{ $limit }}"
                                    @if (isset($_GET['limit'])) {{ $_GET['limit'] == $limit ? 'selected' : '' }} @endif>
                                    {{ $limit }}</option>
                            @endforeach
                        </select>
                        <?php
                        if (isset($_GET['page'])) {
                            $pag = $_GET['page'];
                        } else {
                            $pag = 1;
                        }
                        if (isset($_GET['limit'])) {
                            $limit = $_GET['limit'];
                        } else {
                            $limit = 10;
                        }
                        $comienzo = $limit;
                        ?>
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-group">
                        <a class="navbar-brand">Buscar</a>
                        <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search"
                            aria-label="Search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                    </div>
                </div>
                <div class="col-1">
                    @can('crear-rol')
                        <a href="{{ route('roles.create') }}" class="btn btn-primary ml-auto">
                            <i class="fas fa-plus"></i>
                            Agregar</a>
                    @endcan
                </div>
                @if ($roles->total() > 10)
                    {{ $roles->links() }}
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $valor = 1;
                        if ($pag != 1) {
                            $valor = $comienzo + 1;
                        }
                        //$valor = 1;
                        ?>
                        @foreach ($roles as $role)
                            <tr>
                                <th scope="row">{{ $valor++ }}</th>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('ver-rol')
                                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info"><i
                                                    class="fas fa-eye"></i></a>
                                        @endcan
                                        @can('editar-rol')
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                        @endcan
                                        @can('borrar-rol')
                                            <button type="submit" class="btn btn-danger" form="delete_{{ $role->id }}"
                                                onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <form action="{{ route('roles.destroy', $role->id) }}"
                                                id="delete_{{ $role->id }}" method="POST" enctype="multipart/form-data"
                                                hidden>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            @if ($roles->total() > 10)
                {{ $roles->links() }}
            @endif
        </div>
    </div>
    <!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->
    <Script type="text/javascript">
        $('#limit').on('change', function() {
            window.location.href = "{{ route('roles.index') }}?limit=" + $(this).val() + '&search=' + $(
                '#search').val()
        })

        $('#search').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('roles.index') }}?limit=" + $('#limit').val() + '&search=' +
                    $(this).val()
            }
        })
    </Script>
@endsection
