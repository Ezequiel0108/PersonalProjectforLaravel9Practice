    <!-- place navbar here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand">Brand</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link {{request()->routeIs('tareas.index')? 'activo':""}}" href="{{route('tareas.index')}} ">Ver tus tareas</a>
              @dump(request()->routeIs('tareas.index'))
             
            </li>
            <li class="nav-item">
              <a class="nav-link {{request()->routeIs('tareas.create')? 'activo':""}}"  href="{{route('tareas.create')}}"  >Crear tarea</a>
              @dump(request()->routeIs('tareas.create'))
            </li>

            <li class="nav-item">
              <a class="nav-link {{request()->routeIs('contactanos.index')? 'activo':""}}"  href="{{route('contactanos.index')}}"  >Contactanos</a>
              @dump(request()->routeIs('contactanos.index'))
            </li>
          </ul>
        </div>
      </nav>