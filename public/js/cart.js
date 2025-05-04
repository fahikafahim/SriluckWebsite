document.addEventListener('DOMContentLoaded', function() {
    loadCartItems();

    // Handle checkout button
    document.getElementById('checkout-btn')?.addEventListener('click', function() {
        alert('Checkout functionality would be implemented here');
        // In a real app, you would redirect to a checkout page
    });
});
function addToCart(productId) {
    fetch('/api/cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            product_id: productId,
            user_id: document.querySelector('meta[name="user-id"]').content,
            quantity: 1
        })
    })
    .then(async response => {
        const contentType = response.headers.get('content-type');

        if (!response.ok) {
            if (contentType && contentType.includes('application/json')) {
                const errorData = await response.json();
                console.error('Error (JSON):', errorData);
            } else {
                const errorText = await response.text();
                console.error('Error (HTML):', errorText); // This will show the full Laravel error page
            }
            throw new Error('Failed to add to cart');
        }

        return response.json();
    })
    .then(data => {
        alert('Product added to cart!');
        updateCartCount?.();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Could not add product to cart.');
    });
}

function loadCartItems() {
    fetch('/cart')
    .then(response => response.json())
    .then(data => {
        const cartContainer = document.getElementById('cart-items');
        if (data.length === 0) {
            cartContainer.innerHTML = `
                <div class="text-center py-8">
                    <i class="fas fa-shopping-cart text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-600">Your cart is empty</p>
                    <a href="/products" class="mt-4 inline-block text-amber-800 hover:text-amber-900">
                        Continue Shopping
                    </a>
                </div>
            `;
            document.getElementById('cart-total').textContent = '$0.00';
            return;
        }

        let html = '';
        let total = 0;

        data.forEach(item => {
            const itemTotal = item.product.price * item.quantity;
            total += itemTotal;

            html += `
                <div class="flex items-center border-b pb-4" data-cart-id="${item.id}">
                    <div class="flex-shrink-0 h-20 w-20">
                        <img class="h-full w-full object-cover rounded-md"
                             src="${item.product.image || '/images/placeholder-product.png'}"
                             alt="${item.product.name}">
                    </div>
                    <div class="ml-4 flex-1">
                        <h3 class="text-lg font-medium">${item.product.name}</h3>
                        <p class="text-gray-500">${item.product.description || ''}</p>
                        <div class="mt-1 flex items-center">
                            <span class="text-amber-800 font-semibold">$${item.product.price.toFixed(2)}</span>
                            <span class="mx-2 text-gray-400">×</span>
                            <input type="number" min="1" value="${item.quantity}"
                                   class="w-16 border border-gray-300 rounded-md px-2 py-1 text-sm quantity-input">
                            <span class="ml-2 text-gray-400">=</span>
                            <span class="ml-2 font-semibold">$${itemTotal.toFixed(2)}</span>
                        </div>
                    </div>
                    <button class="ml-4 text-red-500 hover:text-red-700 remove-item">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
        });

        cartContainer.innerHTML = html;
        document.getElementById('cart-total').textContent = `$${total.toFixed(2)}`;

        // Add event listeners for quantity changes
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function() {
                const cartId = this.closest('[data-cart-id]').dataset.cartId;
                updateCartItem(cartId, parseInt(this.value));
            });
        });

        // Add event listeners for remove buttons
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function() {
                const cartId = this.closest('[data-cart-id]').dataset.cartId;
                removeCartItem(cartId);
            });
        });
    });
}

function updateCartItem(cartId, quantity) {
    fetch(`/cart/${cartId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ quantity })
    })
    .then(response => {
        if (!response.ok) throw new Error('Failed to update cart');
        loadCartItems();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to update cart item');
    });
}

function removeCartItem(cartId) {
    if (!confirm('Are you sure you want to remove this item from your cart?')) return;

    fetch(`/cart/${cartId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) throw new Error('Failed to remove item');
        loadCartItems();
        updateCartCount();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to remove cart item');
    });
}
