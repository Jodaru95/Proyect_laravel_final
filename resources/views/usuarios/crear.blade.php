<x-plantilla>
    <x-slot name="titulo">Crear Usuario</x-slot>
    <x-slot name="cabecera">Crear usuario</x-slot>
    <x-errores/>
    <form name="ff" method="POST" action="{{route('usuarios.store')}}" class="p-4 bg-secondary text-light mt-3">
        @csrf
        <x-form-input name="nomusu" label="NickName"></x-form-input>
        <x-form-input name="mail" label="Email"></x-form-input>
        <x-form-input name="localidad" label="Localidad"></x-form-input>
        <x-form-select name="perfil_id" :options="$misPerfiles" label="Perfil" />
        <div class="container mt-2">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Enviar</button>
            <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            <a href="{{route('usuarios.index')}}" class="btn btn-dark"><i class="fas fa-backward"></i> Volver</a>
        </div>
    </form>
</x-plantilla>
