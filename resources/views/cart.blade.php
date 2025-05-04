<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

        @if(session('cart') && count(session('cart')) > 0)
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-6 text-left">Product</th>
                            <th class="py-3 px-6 text-left">Price</th>
                            <th class="py-3 px-6 text-left">Quantity</th>
                            <th class="py-3 px-6 text-left">Total</th>
                            <th class="py-3 px-6 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach(session('cart') as $item)
                            @php $itemTotal = $item['price'] * $item['quantity']; $total += $itemTotal; @endphp
                            <tr class="border-b">
                                <td class="py-4 px-6 flex items-center">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover mr-4">
                                    <span>{{ $item['name'] }}</span>
                                </td>
                                <td class="py-4 px-6">${{ number_format($item['price'], 2) }}</td>
                                <td class="py-4 px-6">
                                    <form action="{{ route('cart.update', $item['id']) }}" method="POST">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 border rounded px-2 py-1">
                                        <button type="submit" class="ml-2 text-blue-500 hover:underline">Update</button>
                                    </form>
                                </td>
                                <td class="py-4 px-6">${{ number_format($itemTotal, 2) }}</td>
                                <td class="py-4 px-6">
                                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-600 hover:underline">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="py-4 px-6 text-right font-bold">Total:</td>
                            <td class="py-4 px-6 font-bold">${{ number_format($total, 2) }}</td>
                            <td class="py-4 px-6">
                                <a href="#"
                                   class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Checkout</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        @else
            <div class="text-center py-20">
                <i class="fas fa-shopping-cart text-4xl text-gray-400 mb-4"></i>
                <h2 class="text-xl font-semibold text-gray-600">Your cart is empty</h2>
                <a href="{{ route('product') }}" class="mt-4 inline-block bg-gray-800 text-white px-5 py-2 rounded hover:bg-gray-900">Browse Products</a>
            </div>
        @endif
    </div>
</x-app-layout>
