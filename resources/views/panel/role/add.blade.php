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
                    <h5 class="card-title">Crear</h5>
      
                    <!-- General Form Elements -->
                    <form>
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nombre de Rol</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                     
      
                      <div class="row mb-3">
                       
                        <div class="col-sm-12">
                          <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                      </div>
      
                    </form><!-- End General Form Elements -->
      
                  </div>
                </div>
      
              </div>
        </div>
    </section>
@endsection
