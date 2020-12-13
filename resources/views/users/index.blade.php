@extends('layouts.app')

@section('section')
    <div class="container mx-auto">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <h1 class="text-xl text-center py-3">Listado de Usuarios</h1>
            <table class="min-w-full mb-3">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-gray-300 leading-4 text-blue-500 tracking-wider">Nombre</th>
                        <th class="px-6 py-3 border-gray-300 leading-4 text-blue-500 tracking-wider">Email</th>
                        <th class="px-6 py-3 border-gray-300 leading-4 text-blue-500 tracking-wider">Direcciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($users as $user)
                        <tr class="text-gray-800">
                            <td class="px-6 py-3 text-center whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $user->name }}</td>
                            <td class="px-6 py-3 text-center whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $user->email }}</td>
                            <td class="px-6 py-3 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                                <ul class="list-disc">
                                @foreach ($user->addresses as $address)
                                    <li>{{ $address->detail }}</li>
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $users->links() !!}
        </div>
    </div>
@endsection
