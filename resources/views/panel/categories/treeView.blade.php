@extends('panel.layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestión de Categorías</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('permissions.create') }}"><i class="fa fa-plus"></i> Crear nuevo Permiso</a>
        @endcan
        </div>
    </div>
</div>

    <div class="container">
        <div class="panel panel-primary">

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">

                            <br>
                            <ul data-widget="treeview" data-accordion="false">
                                @foreach ($tree as $item)
                                    <li>{{ $item['name'] }}</li>
                                    @if (isset($item['children']))
                                        <ul>
                                            @foreach ($item['children'] as $child)
                                                @include('panel.categories.partials', ['item' => $child])
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection







@section('script')

<script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!");

        
 
    
</script>
@stop


