<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ auth()->id() }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <x-top-navigation/>
    <style>
        .product-card {
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .price-tag {
            background-color: rgba(146, 64, 14, 0.1);
            transition: all 0.3s ease;
        }

        .product-card:hover .price-tag {
            background-color: rgba(146, 64, 14, 0.2);
        }

        .add-to-cart-btn {
            transition: all 0.2s ease;
        }

        .add-to-cart-btn:hover {
            transform: scale(1.1);
            color: #9c4221;
        }

        .cart-message {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: none;
        }
    </style>

    <!-- Cart Success Message -->
    <div id="cartMessage" class="cart-message bg-green-500 text-white"></div>

    <div class="flex h-screen bg-gray-100">
        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Page Content -->
            <div class="flex-1 overflow-auto p-6 bg-gray-50">
                <!-- Header -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Our Products</h1>
                    <p class="text-gray-600">Browse our collection of high-quality products</p>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse($products as $product)
                    <div class="product-card bg-white rounded-lg overflow-hidden shadow-md border border-gray-100">
                        <!-- Product Image -->
                        <div class="overflow-hidden relative">
                            <img src="{{ $product->image ?? 'https://via.placeholder.com/300' }}"
                                 alt="{{ $product->name }}"
                                 class="product-image w-full">
                        </div>

                        <!-- Product Info -->
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg mb-1">{{ $product->name }}</h3>
                                    <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 50) }}</p>
                                </div>
                                <span class="price-tag px-3 py-1 rounded-full text-amber-800 font-bold">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                            </div>

                            <!-- Size & Color -->
                            <div class="flex items-center mt-3 text-sm">
                                @if($product->size)
                                <span class="mr-3 text-gray-500">
                                    <i class="fas fa-ruler-combined mr-1"></i> {{ $product->size }}
                                </span>
                                @endif

                                @if($product->color)
                                <span class="text-gray-500">
                                    <i class="fas fa-palette mr-1"></i> {{ $product->color }}
                                </span>
                                @endif
                            </div>

                            <!-- View Button -->
                            <div class="mt-4 flex space-x-2">
                                <a href="{{ route('products.show', $product->id) }}"
                                   class="flex-1 text-center bg-gray-800 hover:bg-gray-900 text-white py-2 px-4 rounded transition-colors duration-200">
                                    View Details
                                </a>
                                <!-- Add to Cart Button -->
                                <button onclick="addToCart({{ $product->id }})"
                                        class="add-to-cart-btn bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 px-3 rounded transition-colors duration-200">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-12">
                        <i class="fas fa-box-open text-4xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-medium text-gray-600">No products available</h3>
                        <p class="text-gray-500 mt-2">Check back later for our latest products</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($products->hasPages())
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function addToCart(productId) {
    const userId = {{ auth()->id() ?? 'null' }};
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    if (!userId) {
        showCartMessage('Please login to add items to cart', 'red');
        window.location.href = '/login'; // Redirect to login if not authenticated
        return;
    }

    fetch('{{ route("cart") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            user_id: userId,
            product_id: productId,
            quantity: 1
        })
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => { throw err; });
        }
        return response.json();
    })
    .then(data => {
        showCartMessage('Product added to cart successfully!', 'green');
    })
    .catch(error => {
        console.error('Error:', error);
        const message = error.message || 'Failed to add product to cart';
        showCartMessage(message, 'red');
    });
}

        function showCartMessage(message, color) {
            const messageDiv = document.getElementById('cartMessage');
            messageDiv.textContent = message;
            messageDiv.style.backgroundColor = color === 'green' ? '#10B981' : '#EF4444';
            messageDiv.style.display = 'block';

            setTimeout(() => {
                messageDiv.style.display = 'none';
            }, 3000);
        }
    </script>
</x-app-layout>
