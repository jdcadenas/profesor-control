@extends('panel.layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de categorías</h2>
            </div>

        </div>
    </div>

    @session('success')
        <div class="alert alert-success" role="alert">
            {{ $value }}
        </div>
    @endsession
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Categorías</h4>
                        <h6 class="card-subtitle"></h6>
                        <h6 class="card-title m-t-40"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i>
                            <div class="pull-right">
                                <a class="btn btn-primary mb-2 tn-sm" href="{{ route('categories.create') }}"><i
                                        class="fa fa-plus"></i> Crear nuevo categorías</a>
                            </div>
                        </h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Parent</th>
                                    <th width="280px">Acción</th>
                                </tr>
                                @foreach ($dataMoodle as $key => $category)
                                    <tr>
                                        <td>{{ $category['id'] }}</td>
                                        <td>{{ $category['name'] }}</td>
                                        <td>{{ $category['description'] }}</td>
                                        <td>{{ $category['parent'] }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('categories.show', $category['id']) }}"><i
                                                    class="fa-solid fa-list"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sucess btn-sm" href="{{ route('categories.edit', $category['id']) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i>{{ __('Edit') }}</a>
                                            <form method="POST" action="{{ route('categories.destroy', $category['id']) }}"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-trash"></i>{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        @endsection
