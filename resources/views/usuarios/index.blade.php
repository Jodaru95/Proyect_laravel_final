<x-plantilla>
    <x-slot name="titulo">Gestión</x-slot>
    <x-slot name="cabecera">Gestion de los usuarios de la plataforma</x-slot>
    <x-mensajes/>
    <a href="{{route('usuarios.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Crear Usuario</a>
    <table class="table table-dark table-striped mt-3">
        <thead>
            <tr>
              <th scope="col">Detalles</th>
              <th scope="col">Nick</th>
              <th scope="col">Email</th>
              <th scope="col">Localidad</th>
              <th scope="col" colspan=2 class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($misUsuarios as $usuario)
                <tr>
                <th scope="row">
                    <a href="{{route('usuarios.show' ,$usuario)}}" class="btn btn-info"><i class="fas fa-info"></i> Detalles</a>
                </th>
                <td>{{$usuario->nomusu}}</td>
                <td>{{$usuario->mail}}</td>
                <td>{{$usuario->localidad}}</td>
                <td>
                    <a href="{{route('usuarios.edit',$usuario)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                </td>
                <td>
                    <form name="ff" method="POST" action="{{route('usuarios.destroy', $usuario)}}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Borrar</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">
        {{$misUsuarios->links()}}
    </div>
</x-plantilla>
