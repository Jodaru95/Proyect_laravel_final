<x-plantilla>
    <x-slot name="titulo">Editar</x-slot>
    <x-slot name="cabecera">Editar usuario {{$usuario->id}}</x-slot>
    <x-errores/>
    <form name="ff" method="POST" action="{{route('usuarios.update',$usuario)}}" class="p-4 bg-secondary text-light mt-3">
        @csrf
        @method('PUT')
        @bind($usuario)
        <x-form-input name="nomusu" label="NickName"/>
        <x-form-input name="mail" label="Email"/>
        <x-form-input name="localidad" label="Localidad" type="mail"/>
        <x-form-select name="perfil_id" :options="$misPerfiles" label="Perfil"/>
        <div class="container mt-2">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
            <a href="{{route('usuarios.index')}}" class="btn btn-dark"><i class="fas fa-backward"></i> Volver</a>
        </div>
    </form>
</x-plantilla>
