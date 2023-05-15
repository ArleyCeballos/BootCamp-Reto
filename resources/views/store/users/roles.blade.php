@extends('layouts.admin')
@section('content')
@hasrole('admin')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-gray-100">
                <table class="table table-striped">
                    <caption>
                    <form action="{{ route('roles.create') }}" method="POST">
                        @csrf
                        <label for="nombre_rol">Crear nuevo Role:</label>
                        <input type="text" name="nombre_rol" required>
                        <button type="submit">Crear Rol</button>
                    </form>
                    </caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID ROL</th>
                            <th scope="col">Nombre Rol</th>
                            <th scope="col">Modificar</th>
                            <th scope="col"></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $rol)
                    <tr>
                        <th scope="row">{{$rol->id}}</th>
                        <td>{{$rol->name}}</td>
                        <td class="px-6 py-4">
                        <form action="{{ route('roles.destroy', [$rol->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                        
                            <input type="submit" value="Eliminar" class="bg-green-500 text-black rounded px-4 py-2" onclick="return confirm('Desea Eliminar?')">
                            
                        </form>
                        </td>                
                       
                    </tr>    
                        
                    @endforeach
                    Lista de Roles
                    </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-4">
                        {{ $roles->links() }}
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
@else
    No tienes acceso a esta vista
@endhasrole

@endsection

