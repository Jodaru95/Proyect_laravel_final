<x-plantilla>
    <x-slot name="titulo">Detalles</x-slot>
    <x-slot name="cabecera">Detalles del usuario ({{$usuario->id}})</x-slot>
    <div class="card mx-auto mt-3" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{$usuario->nomusu}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$usuario->localidad}}</h6>
          <p class="card-text"><b>Email:</b> {{$usuario->mail}}</p>
          <p class="card-subtitle mb-2">
              <b>Perfil: </b>
              <ul class="list-group">
                <li class="list-group-item list-group-item-action list-group-item-dark">
                    <a href="{{ route('perfiles.show', $usuario->perfil->id) }}"
                        class="card-link">#{{ $usuario->perfil->nombre }}</a>
                </li>
            </ul>
          </p>
          <a href="{{route('usuarios.index')}}" class="btn btn-dark"><i class="fas fa-backward"></i> Volver</a>
        </div>
      </div>
</x-plantilla>
