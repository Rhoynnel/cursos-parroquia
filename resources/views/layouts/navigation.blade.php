<div class="container">
      <header class="py-3 mb-3 border-bottom">
        <div
          class="container-fluid d-grid gap-3 align-items-center"
          style="grid-template-columns: 1fr 2fr"
        >
          <div class="dropdown">
            <a
              href="#"
              class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-body-emphasis text-decoration-none dropdown-toggle"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              aria-label="Bootstrap menu"
            >
              <H3>Iniciar</H3>
            </a>
            <ul class="dropdown-menu text-small shadow">
              <li><a class="dropdown-item" href="{{route('dashboard')}}">Panel Inicial</a></li>
              <li>
                <a class="dropdown-item active" href="#" aria-current="page"
                  >Catequesis</a>
                  <ul>
                    <li><a class="dropdown-item" href="{{ route('catequesis.index') }}">Catequesis</a></li>
                    <li><a class="dropdown-item" href="{{ route('representante.index') }}">Representantes</a></li>
                    <li><a class="dropdown-item" href="{{ route('estudiante.index') }}">Estudiantes</a></li>
                  </ul>
              </li>
              <li><a class="dropdown-item" href="{{ route('centro.index') }}">Centros</a></li>
              <li><a class="dropdown-item" href="{{ route('curso.index') }}">Cursos</a></li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#">Centro de Consultas</a></li>
              <li><a class="dropdown-item" href="#">Reportes</a></li>
              
            </ul>
          </div>
          <div class="d-flex align-items-center">
            <h3>Cursos Parroquia</h3>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <div class="flex-shrink-0 align-items-left dropdown">
              <a
                href="#"
                class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu text-small shadow">
                {{-- <li><a class="dropdown-item" href="#">Usuarios</a></li>
                <li><a class="dropdown-item" href="#">Tasas</a></li>
                <li><a class="dropdown-item" href="#">Proveedores</a></li>
                <li><a class="dropdown-item" href="#">Clientes</a></li>
                
               <li><hr class="dropdown-divider" /></li> --}}
                <li><a class="dropdown-item" href="{{route('profile.edit')}}">{{ __('Perfil') }}</a></li>
                
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Salir') }}
                    </a>
                        </form>
                </li>
              </ul>
            </div>
            
          </div>
        </div>
      </header>
</div>
