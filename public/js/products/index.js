document.addEventListener('DOMContentLoaded', function() {
    loadProducts();

    // Create Product button click event
    document.getElementById('create-product-btn').addEventListener('click', function() {
        document.getElementById('create-product-form').classList.remove('hidden');
    });
});

// Helper function to safely format prices
function formatPrice(price) {
    const numericPrice = typeof price === 'string' ? parseFloat(price) : Number(price);
    if (isNaN(numericPrice)) {
        console.warn('Invalid price value:', price);
        return '0.00';
    }
    return numericPrice.toFixed(2);
}

// Improved loadProducts function with error handling
function loadProducts() {
    const productsContainer = document.getElementById('products-container');
    productsContainer.innerHTML = `
    <tr>
        <td colspan="8" class="text-center py-4">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-amber-800 mx-auto"></div>
            <span class="mt-2 block text-sm text-gray-600">Loading products...</span>
        </td>
    </tr>
    `;

    fetch('/api/products?' + new Date().getTime(), {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        cache: 'no-cache'
    })
    .then(async response => {
        const data = await response.json();
        if (!response.ok) {
            throw new Error(data.message || 'Failed to fetch products');
        }
        return data;
    })
    .then(data => {
        if (!data.data || data.data.length === 0) {
            productsContainer.innerHTML = `
                <tr>
                    <td colspan="8" class="text-center py-4 text-gray-500">
                        <i class="fas fa-box-open text-4xl mb-2 text-amber-700"></i>
                        <p class="text-lg">No products found.</p>
                    </td>
                </tr>
            `;
            return;
        }

        productsContainer.innerHTML = data.data.map((product, index) => `
            <tr class="animate-fade-in" style="animation-delay: ${index * 0.05}s">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${index + 1}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-semibold">${product.name || '-'}</td>
                <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">${product.description || '-'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-amber-800">$${formatPrice(product.price)}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${product.size || '-'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                    ${product.color ? `<span class="inline-block w-4 h-4 rounded-full mr-2" style="background-color: ${product.color}"></span>${product.color}` : '-'}
                </td>
              <td class="p-2">
        <img src="/${product.image}" alt="${product.name}" class="w-40 h-auto object-cover">
      </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-3">
                        <button onclick="editProduct(${product.id})"
                                class="p-2 rounded-full text-gray-900 hover:text-gray-500 transition-all duration-200 shadow-md hover:shadow-lg"
                                title="Edit">
                            <i class="fas fa-edit text-base"></i>
                        </button>
                        <button onclick="deleteProduct(${product.id})"
                                class="p-2 rounded-full text-gray-900 hover:text-red-400 transition-all duration-200 shadow-md hover:shadow-lg"
                                title="Delete">
                            <i class="fas fa-trash-alt text-base"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `).join('');
    })
    .catch(error => {
        console.error('Fetch error:', error);
        productsContainer.innerHTML = `
            <tr>
                <td colspan="8" class="text-center py-4">
                    <div class="text-red-500 mb-2">
                        <i class="fas fa-exclamation-circle text-2xl"></i>
                    </div>
                    <p class="text-sm text-gray-600">Error: ${error.message || 'Failed to load products'}</p>
                    <button onclick="loadProducts()" class="mt-3 inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-amber-800 hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-200">
                        <i class="fas fa-sync-alt mr-1"></i> Retry
                    </button>
                </td>
            </tr>
        `;
    });
}
