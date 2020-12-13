@extends('layouts.app')

@section('section')
    <div class="container mx-auto">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <h1 class="text-xl text-center py-3">Listado de Productos</h1>
            <table class="min-w-full mb-3">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-gray-300 leading-4 text-blue-500 tracking-wider">ID</th>
                        <th class="px-6 py-3 border-gray-300 leading-4 text-blue-500 tracking-wider">Nombre</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($products as $product)
                        <tr class="text-gray-800">
                            <td class="px-6 py-3 text-center whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->id }}</td>
                            <td class="px-6 py-3 text-center whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $products->links() !!}
        </div>
    </div>
@endsection
