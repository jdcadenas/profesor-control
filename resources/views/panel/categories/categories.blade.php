@extends('panel.layouts.app')


@section('title', 'Gestión de Cursos')

@section('content_header')
    <h1>Categorías</h1>
@stop
@section('plugins.Datatables', true)

<table id="example" class="table table-striped table-bordered" style="width:100%">

</table>
@stop
@section('content')


@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!");
    $(document).ready(function() {
        $('#example').dataTable({
                data: <?php echo json_encode($data); ?>,
                columns: [{
                        title: "id",
                        data: 'id',

                    },
                    {
                        title: "name",
                        data: 'name',

                    },
                    {
                        title: "idnumber",
                        data: 'idnumber',

                    },
                    {
                        title: "description",
                        data: 'description',

                    },
                    {
                        title: "parent",
                        data: 'parent',

                    },
                    {
                        title: "depth",
                        data: 'depth',

                    },
                    {
                        title: "path",
                        data: 'path',

                    },   

            ]
        });

    });
</script>
@stop
