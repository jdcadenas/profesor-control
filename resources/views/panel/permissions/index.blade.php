@extends('panel.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestión de Permisos</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('permissions.create') }}"><i class="fa fa-plus"></i> Crear nuevo Permiso</a>
        @endcan
        </div>
    </div>
</div>


<table class="table table-bordered">
  <tr>
     <th width="100px">No</th>
     <th>{{ __('Name') }}</th>
     <th width="280px">{{ __('Action') }}</th>
  </tr>
    @foreach ($permissions as $key => $permission)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $permission->name }}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('permissions.show',$permission->id) }}"><i class="fa-solid fa-list"></i>{{ __('Show') }}</a>
            @can('role-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('permissions.edit',$permission->id) }}"><i class="fa-solid fa-pen-to-square"></i> {{ __('Edit') }}</a>
            @endcan

            @can('role-delete')
            {{-- <form method="POST" action="{{ route('permissions.destroy', $permission->id) }}" style="display:inline">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>{{ __('Delete') }}</button>
            </form> --}}
            <a  class="btn btn-danger btn-sm"onclick="event.preventDefault(); confirmDelete(event);" href="{{ route('permissions.destroy', $permission->id) }}" data-confirm-delete="true">{{ __('Delete') }}</a>
            @endcan
        </td>
    </tr>
    @endforeach
</table>

{!! $permissions->links('pagination::bootstrap-5') !!}

@endsection