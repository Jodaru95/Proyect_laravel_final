<x-plantilla>
    <x-slot name="titulo">Crear Perfil</x-slot>
    <x-slot name="cabecera">Crear perfil</x-slot>
    <x-errores/>
    <form name="ff" method="POST" action="{{route('perfiles.store')}}" class="p-4 bg-secondary text-light mt-3">
        @csrf
        <x-form-input name="nombre" label="Nombre"></x-form-input>
        <x-form-input name="descripcion" label="Descripcion"></x-form-input>
        <div class="container mt-2">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Enviar</button>
            <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            <a href="{{route('perfiles.index')}}" class="btn btn-dark"><i class="fas fa-backward"></i> Volver</a>
        </div>
    </form>
</x-plantilla>
