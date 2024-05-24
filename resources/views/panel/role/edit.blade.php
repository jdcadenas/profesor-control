@extends('panel.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Rol</h1>

    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar</h5>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <!-- General Form Elements -->
                        <form action="{{ route('role.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nombre de Rol</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='name'
                                        value="{{ old('name', $role->name) }}">
                                </div>
                            </div>


                            <div class="row mb-3">

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
