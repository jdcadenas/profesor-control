@extends('panel.layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de usuarios</h2>
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
                        <h4 class="card-title">Usuarios</h4>
                        <h6 class="card-subtitle"></h6>
                        <h6 class="card-title m-t-40"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i>
                            <div class="pull-right">
                                <a class="btn btn-primary mb-2 tn-sm" href="{{ route('users.create') }}"><i
                                        class="fa fa-plus"></i> Crear nuevo
                                    usuario</a>
                            </div>
                        </h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Roles</th>
                                    <th width="280px">Acción</th>
                                </tr>
                                @foreach ($data as $key => $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $v)
                                                    <label class="badge bg-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}"><i
                                                    class="fa-solid fa-list"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sucess btn-sm" href="{{ route('users.edit', $user->id) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i>{{ __('Edit') }}</a>
                                            <form method="POST" action="{{ route('users.destroy', $user->id) }}"
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
        {!! $data->links('pagination::bootstrap-5') !!}

        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Usuarios</h4>
                            <h6 class="card-subtitle"></h6>
                            <h6 class="card-title m-t-40"><i
                                    class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Usuarios de Moodle</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered datatable">
                                    <tr>
                                        <th>Imagen</th>
                                        <th>No</th>
                                        <th>Nombre Completo</th>
                                        <th>Correo</th>
                                        <th>Departamento</th>
                                        <th>Suspendido</th>
                                        <th width="280px">Acción</th>
                                    </tr>
                                    @foreach ($dataMoodle as $key => $user)            
                                        <tr>
                                            <td><img src="{{ $user['profileimageurlsmall'] }}" alt=""></td>
                                            <td>{{  $user['id'] }}</td>
                                            <td>{{ $user['fullname'] }}</td>
                                            <td>{{ $user['email'] }}</td>
                                            <td>{{ $user['department'] }}</td>
                                            <td>{{ $user['suspended'] }}</td>
                                           
                                            {{-- <td>
           @if (!empty($user->getRoleNames()))
             @foreach ($user->getRoleNames() as $v)
                <label class="badge bg-success">{{ $v }}</label>
             @endforeach
           @endif
         </td> --}}
                                            <td>
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('users.show', $user['id']) }}"><i
                                                        class="fa-solid fa-list"></i> {{ __('Show') }}</a>
                                                <a class="btn btn-sucess btn-sm"
                                                    href="{{ route('users.edit', $user['id']) }}"><i
                                                        class="fa-solid fa-pen-to-square"></i>{{ __('Edit') }}</a>
                                                <form method="POST" action="{{ route('users.destroy', $user['id']) }}"
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
            {!! $data->links('pagination::bootstrap-5') !!}
        @endsection
