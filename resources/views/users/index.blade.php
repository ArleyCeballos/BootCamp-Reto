<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-between">
            {{ __('Users') }}
            <a href="" class="bg-red-800 text-xs  text-white rounded px-2 py-1" style="background-color: green;">
                Crear
            </a>

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="mb-4">
                        @foreach($users as $user)
                            <tr class="border-b border-gray-200 text-sm">
                                <td class="px-6 py-4">{{$user->name}}</td>
                                <td class="px-6 py-4">
                                    <a href="" class="text-indigo-600">Habilitar</a>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="" method="POST">
                                        @csrf
                                      

                                        <input
                                        type="submit" 
                                        value="Inahibilitar" 
                                        class="bg-red-800 text-white rounded px-4 py-2"
                                        onclick="return confirm('Desea Inhabilitar?')"
                                        >
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
