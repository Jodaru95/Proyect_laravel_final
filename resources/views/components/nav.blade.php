<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/"><i class="fas fa-home"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('usuarios.index')}}"><i class="fas fa-users"></i> Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('perfiles.index')}}"><i class="far fa-id-badge"></i> Perfiles</a>
          </li>
        </ul>
      </div>
    </div>
</nav>
