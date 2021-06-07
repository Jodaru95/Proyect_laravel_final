<x-plantilla>
    <x-slot name="titulo">Gestión</x-slot>
    <x-slot name="cabecera">Gestión de los perfiles de la plataforma</x-slot>
    <x-mensajes/>
    <a href="{{route('perfiles.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Crear Perfil</a>
    <table class="table table-dark table-striped mt-3">
        <thead>
            <tr>
              <th scope="col">Detalles</th>
              <th scope="col">Nombre</th>
              <th scope="col" colspan=2 class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($misPerfiles as $perfil)
                <tr>
                <th scope="row">
                    <a href="{{route('perfiles.show', $perfil)}}" class="btn btn-info"><i class="fas fa-info"></i> Detalles</a>
                </th>
                <td>{{$perfil->nombre}}</td>
                <td>
                    <a href="{{route('perfiles.edit',$perfil)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                </td>
                <td>
                    <form name="ff" method="POST" action="{{route('perfiles.destroy',$perfil)}}">
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
        {{$misPerfiles->links()}}
    </div>
</x-plantilla>
