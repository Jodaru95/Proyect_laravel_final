<x-plantilla>
    <x-slot name="titulo">Editar</x-slot>
    <x-slot name="cabecera">Editar perfil {{$perfile->id}}</x-slot>
    <x-errores/>
    <form name="ff" method="POST" action="{{route('perfiles.update',$perfile)}}" class="p-4 bg-secondary text-light mt-3">
        @csrf
        @method('PUT')
        @bind($perfile)
        <x-form-input name="nombre" label="Nombre"/>
        <x-form-input name="descripcion" label="Descripción"/>
        <div class="container mt-2">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
            <a href="{{route('perfiles.index')}}" class="btn btn-dark"><i class="fas fa-backward"></i> Volver</a>
        </div>
    </form>
</x-plantilla>
