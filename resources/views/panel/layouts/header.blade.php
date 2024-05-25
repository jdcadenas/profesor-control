  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
          <a href="index.html" class="logo d-flex align-items-center">
              <img src="{{ url('') }}/assets/img/logo.png" alt="">
              <span class="d-none d-lg-block">Control de profesores</span>
          </a>
          <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->



      <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">

              <li class="nav-item d-block d-lg-none">
                  <a class="nav-link nav-icon search-bar-toggle " href="#">
                      <i class="bi bi-search"></i>
                  </a>
              </li><!-- End Search Icon-->




              <li class="nav-item dropdown pe-3">

                  
                  <ul class="navbar-nav ms-auto">
                      <!-- Authentication Links -->
                      @guest
                          @if (Route::has('login'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                          @endif

                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                          @endif
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                              </a>

                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                  </ul>
                  </div>
                  </div>

                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                      @if (Route::has('login'))
                          

                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                  <i class="bi bi-person"></i>
                                  <span>Perfil</span>
                              </a>
                          </li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                      @endif
                      <li>
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  this.closest('form').submit();">
                                  <i class="bi bi-box-arrow-right"></i>
                                  <span>Cerrar sesión</span>
                              </a>


                          </form>

                      </li>

                  </ul><!-- End Profile Dropdown Items -->
              </li><!-- End Profile Nav -->

          </ul>
      </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
