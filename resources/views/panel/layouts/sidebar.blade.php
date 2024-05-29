  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="{{ url('panel/dashboard') }}">
                  <i class="bi bi-grid"></i>
                  <span>Tablero</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('users.index') }}">
                          <i class="bi bi-circle"></i><span>Listado de Usuarios</span>
                      </a>
                  </li>
                  
              </ul>
              <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('roles.index') }}">
                          <i class="bi bi-circle"></i><span>Listado de Roles</span>
                      </a>
                  </li>
              </ul>
              <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('permissions.index') }}">
                        <i class="bi bi-circle"></i><span>Listado de Permisos</span>
                    </a>
                </li>
            </ul>
          </li><!-- End Components Nav -->



      </ul>

  </aside><!-- End Sidebar-->
