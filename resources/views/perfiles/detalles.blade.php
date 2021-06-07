<x-plantilla>
    <x-slot name="titulo">Detalles</x-slot>
    <x-slot name="cabecera">Detalles del perfil ({{$perfile->id}})</x-slot>
    <div class="card mx-auto mt-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><b>Nombre:</b><br/>
                {{$perfile->nombre}}</h5>
            <p class="card-text"><b>Descripción:</b><br/>
                {{$perfile->descripcion}}</p>
            <p class="card-text">
                <b>Usuarios Adjuntos a este perfil: </b>
                <ul>
                    @foreach($perfile->usuarios as $item)
                        <li><a href="{{route('usuarios.show',$item)}}">{{$item->nomusu}}</a></li>
                    @endforeach
                </ul>
            </p>
            <a href="{{route('perfiles.index')}}" class="btn btn-dark"><i class="fas fa-backward"></i> Volver</a>
        </div>
      </div>
</x-plantilla>
