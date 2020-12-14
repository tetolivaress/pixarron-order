@extends('layouts.app')

@section('section')
    <div class="container mx-auto">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <h1 class="text-xl text-center py-3">{{ __('Orders List') }}</h1>
            <table class="table-auto md:table-fixed mx-auto mb-3">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-gray-300 leading-4 text-blue-500 tracking-wider">{{ __('User') }}</th>
                        <th class="px-6 py-3 border-gray-300 leading-4 text-blue-500 tracking-wider">{{ __('Address') }}</th>
                        <th class="w-1/3 px-6 py-3 border-gray-300 leading-4 text-blue-500 tracking-wider">{{ __('Products') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($orders as $order)
                        <tr class="text-gray-800">
                            <td class="px-6 py-3 text-center whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $order->address->user->name }}</td>
                            <td class="px-6 py-3 text-center whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $order->address->detail }}</td>
                            <td class="px-6 py-3 text-left whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                                <ul class="list-disc">
                                    @foreach ($order->products as $product)
                                        <li>{{$product->name}}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $orders->links() !!}
        </div>
    </div>
@endsection
