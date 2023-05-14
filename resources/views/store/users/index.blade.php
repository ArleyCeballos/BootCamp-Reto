@extends('layouts.admin')
@section('content')
@hasrole('admin')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-gray-100">
                <table class="table table-striped">
                    <caption>Lista de usuarios</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td class="px-6 py-4">
                        <form action="{{ route('roles.create', [$user->id]) }}" method="POST">
                            @csrf
                            @if($user->hasRole('visible'))
                            <input type="submit" value="Habilitar" class="bg-gray-500 text-black rounded px-4 py-2" disabled>
                            @else
                            <input type="submit" value="Habilitar" class="bg-green-500 text-black rounded px-4 py-2" onclick="return confirm('Desea habilitar?')">
                            @endif
                        </form>
                        </td>
                        <td class="px-6 py-4">
                        <form action="{{url('/roles/'.$user->id)}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}  
                            @if($user->hasRole('visible'))
                            <input type="submit" value="Inhabilitar" class="bg-red-800 text-black rounded px-4 py-2" onclick="return confirm('Desea Inhabilitar?')">
                            @else
                            <input type="submit" value="Inhabilitar" class="bg-red-800 text-black rounded px-4 py-2" disabled>
                            @endif
                        </form>
                        </td>
                    </tr>        
                    @endforeach


                    </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    No tienes acceso a esta vista
@endhasrole

@endsection