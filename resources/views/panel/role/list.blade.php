@extends('panel.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Roles</h1>

    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6 mt-2 mb-3">
                                <h5 class="card-title">Listado de Roles</h5>
                            </div>
                            <div class="col-lg-6 mt-2 mb-3">
                                <a href="{{ route('role.add') }}" class="btn btn-primary float-right">Crear Rol</a>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>

                                    <th width="250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $rol)
                                    <tr>
                                        <th scope="row">{{ $rol->id }}</th>
                                        <td>{{ $rol->name }}</td>

                                        <td>
                                            <form action="{{ route('role.delete', $rol->id) }}" method="POST">
                                                {{-- <a class="btn btn-info btn-sm" href="{{ route('rol.show', $rol->id) }}"><i
                                                        class="fa-solid fa-list"></i> Show</a> --}}
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('role.edit', $rol->id) }}"><i
                                                        class="fa-solid fa-pen-to-square"></i> Editar</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-trash"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">There are no data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
