@extends('layouts.admin')
@section('content')


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
                                    <a href="" class="text-indigo-600">Habilitar</a>
                                </td>
                        <td class="px-6 py-4">
                                    <form action="{{url('/users/'.$user->id)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}                                      

                                        <input
                                        type="submit" 
                                        value="Inahibilitar" 
                                        class="bg-red-800 text-black rounded px-4 py-2"
                                        onclick="return confirm('Desea Inhabilitar?')"
                                        >
                                    </form>
                                </td>
                        </tr>        
                        @endforeach
                    </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-4">
                        {{ $users->links() }}
                    </div>

                    <!-- <table class="mb-4">
                        @foreach($users as $user)
                            <tr class="border-b border-gray-200 text-sm">
                                <td class="px-6 py-4">{{$user->name}} {{$user->last_name}}</td>
                                <td class="px-6 py-4">
                                    <a href="" class="text-indigo-600">Habilitar</a>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{url('/users/'.$user->id)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}                                      

                                        <input
                                        type="submit" 
                                        value="Inahibilitar" 
                                        class="bg-red-800 text-black rounded px-4 py-2"
                                        onclick="return confirm('Desea Inhabilitar?')"
                                        >
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </table> -->
                </div>
            </div>
        </div>
    </div>

@endsection