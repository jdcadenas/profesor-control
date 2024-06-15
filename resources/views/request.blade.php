@extends('panel.layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css"
        href="{{ url('') }}/assets/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endsection

@section('content')
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title ">Formulario Solicitud de Curso para moodle</h4>
                    <form class="needs-validation" novalidate>
                        <h6 class="card-subtitle mb-2 text-bg-secondary p-3">Datos personales </h6>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Nomre"
                                    value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Apellido</label>
                                <input type="text" class="form-control" id="validationCustom02" placeholder="Apellido"
                                    value="" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername">Usuario</label>
                                <div class="input-group">

                                    <input type="text" class="form-control" id="validationCustomUsername"
                                        placeholder="Usuario" required>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">Correo</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    </div>
                                    <input type="text" class="form-control" id="validationCustom03" placeholder="Correo"
                                        aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom04">Celular</label>
                                <input type="text" class="form-control" id="validationCustom04" placeholder="Celular"
                                    required>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom05">Teléfono</label>
                                <input type="text" class="form-control" id="validationCustom05" placeholder="Teléfono"
                                    required>
                                <div class="invalid-feedback">
                                    Please provide a valid zip.
                                </div>
                            </div>
                        </div>
                        <h6 class="card-subtitle mb-2 text-bg-secondary p-3">Datos curso</h6>

                        <div class="form-group">
                            <h5>Escoger Fecha Curso:<span class="text-danger">*</span></h5>
                            <div class="input-group">
                                <input type="text" class="form-control" id="datepicker-autoclose"
                                    placeholder="mm/dd/yyyy">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Categorías<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="select" id="select" required class="form-control">
                                    <option value="">Select Your City</option>
                                    <option value="1">India</option>
                                    <option value="2">USA</option>
                                    <option value="3">UK</option>
                                    <option value="4">Canada</option>
                                    <option value="5">Dubai</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Razón<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Solicitar</button>
                    </form>
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function() {
                            'use strict';
                            window.addEventListener('load', function() {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function(form) {
                                    form.addEventListener('submit', function(event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();
                    </script>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection

@section('script')
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="{{ url('') }}/assets/vendor/moment/moment.js"></script>
    <script src="{{ url('') }}/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
    
    <script>
        $('#datepicker-autoclose').datepicker({
          
            language: 'es',
            autoclose: true,
        todayHighlight: true,

        });
    </script>
@endsection
