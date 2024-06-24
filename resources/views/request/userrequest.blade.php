<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login - Sistema control Profesores</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="{{ url('') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ url('') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{ url('') }}/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 min-vh-100 col-md-12  align-items-center justify-content-center">

                            <div class="justify-content-center py-4">
                                <a href={{ url('') }} class="logo d-flex align-items-center w-auto">

                                    <span class="d-none d-lg-block">Control de Cursos</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card w-full mb-3">
                                <div class="card-header">{{ __('Solicitud de Registro de Profesor') }}</div>

                                <div class="card-body">

                                    <form method="POST" action="{{ route('user-request.store') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="faculty">Facultad:</label>
                                            <select class="form-control" id="faculty" name="faculty">
                                                <option value="">Seleccione</option>
                                                @foreach ($faculties as $faculty)
                                                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="school">Escuela:</label>
                                            <select class="form-control" id="school" name="school" required
                                                disabled>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="document">Documento:</label>
                                            <input type="text" class="form-control" id="document" name="document"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="firstname">Nombre:</label>
                                            <input type="text" class="form-control" id="firsname" name="name"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname">Apellido:</label>
                                            <input type="text" class="form-control" id="lastname" name="name"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Usuario:</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Correo electrónico:</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Teléfono:</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Enviar solicitud</button>


                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->


   
    <script src="{{ url('') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ url('') }}/assets/vendor/jquery/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#faculty').on('change', function() {
                var facultyId = $(this).val();
                if (facultyId) {
                    $.ajax({
                        url: '{{ route('getSchoolsByFaculty') }}', // Define a route to fetch schools
                        method: 'POST',
                        data: {
                            faculty_id: facultyId
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('#school').empty(); // Clear existing options
                            $.each(response.schools, function(key, value) {
                                $('#school').append($('<option>', {
                                    value: value.id,
                                    text: value.name
                                }));
                            });
                            $('#school').prop('disabled', false); // Enable school selection
                        }
                    });
                } else {
                    $('#school').empty(); // Clear options on faculty change
                    $('#school').prop('disabled', true); // Disable school selection
                }
            });
        });
    </script>
</body>

</html>
