document.addEventListener('DOMContentLoaded', function() {
    loadProducts();

    // Create Product button click event
    document.getElementById('create-product-btn').addEventListener('click', function() {
        document.getElementById('create-product-form').classList.remove('hidden');
    });

   // Create product form submission
document.getElementById('create-product').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.innerHTML;

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Creating...';

    fetch('/api/products', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    })
    .then(async response => {
        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.message || 'Failed to create product');
        }
        return response.json();
    })
    .then(data => {
        submitBtn.innerHTML = '<i class="fas fa-check mr-2"></i> Success!';
        setTimeout(() => {
            closeCreateProductForm();
            loadProducts();
        }, 1000);
    })
    .catch(error => {
        console.error('Error:', error);
        alert(`Failed to create product: ${error.message || 'Unknown error'}`);
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
    });
});

// Edit product form submission
document.getElementById('edit-product-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const productId = document.getElementById('edit-id').value;
    const form = e.target;
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.innerHTML;

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Updating...';

    fetch(`/api/products/${productId}`, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    })
    .then(async response => {
        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.message || 'Failed to update product');
        }
        return response.json();
    })
    .then(data => {
        submitBtn.innerHTML = '<i class="fas fa-check mr-2"></i> Updated!';
        setTimeout(() => {
            closeEditProductModal();
            loadProducts();
        }, 1000);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to update product: ' + error.message);
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
    });
});
});


document.getElementById('edit-product-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const productId = document.getElementById('edit-id').value;
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.innerHTML;

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Updating...';

    fetch(`/api/products/${productId}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      },
      body: JSON.stringify({
        name: document.getElementById('edit-name').value,
        description: document.getElementById('edit-description').value,
        price: parseFloat(document.getElementById('edit-price').value),
        size: document.getElementById('edit-size').value,
        color: document.getElementById('edit-color').value,
        image_url: document.getElementById('edit-image_url').value
      })
    })
      .then(async response => {
        if (!response.ok) {
          const errorData = await response.json();
          throw new Error(errorData.message || 'Failed to update product');
        }
        submitBtn.innerHTML = '<i class="fas fa-check mr-2"></i> Updated!';
        setTimeout(() => {
          closeEditProductModal();
          loadProducts();
        }, 1000);
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Failed to update product: ' + error.message);
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
      });
  });


// Helper function to safely format prices
function formatPrice(price) {
    // Convert to number if it's a string
    const numericPrice = typeof price === 'string' ? parseFloat(price) : Number(price);

    // Handle NaN cases and ensure it's a valid number
    if (isNaN(numericPrice)) {
        console.warn('Invalid price value:', price);
        return '0.00';
    }

    // Format to 2 decimal places
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

// Add cache-busting parameter to ensure fresh data
fetch('/api/products?' + new Date().getTime(), {
headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
},
cache: 'no-cache' // Ensure no caching
})
.then(async response => {
const data = await response.json();
console.log("API Response:", data); // Add this line
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
        <td class="px-6 py-4 whitespace-nowrap">
            ${product.image_url ? `<img src="${product.image_url}" alt="${product.name}" class="w-12 h-12 object-cover rounded-md shadow-sm border border-gray-200">` : '<span class="text-gray-400">No image</span>'}
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
function createProduct() {
const form = document.getElementById('create-product');
const formData = new FormData(form);
const submitBtn = form.querySelector('button[type="submit"]');
const originalBtnText = submitBtn.innerHTML;

// Show loading state
submitBtn.disabled = true;
submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Creating...';

// Convert price to number before sending
const price = parseFloat(formData.get('price'));
if (isNaN(price)) {
alert('Please enter a valid price');
submitBtn.disabled = false;
submitBtn.innerHTML = originalBtnText;
return;
}

fetch('/api/products', {
method: 'POST',
headers: {
    'Accept': 'application/json',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
},
body: formData
})
.then(async response => {
if (!response.ok) {
    const errorData = await response.json();
    throw new Error(errorData.message || 'Failed to create product');
}
return response.json();
})
.then(data => {
// Show success animation
submitBtn.innerHTML = '<i class="fas fa-check mr-2"></i> Success!';
setTimeout(() => {
    closeCreateProductForm();
    loadProducts(); // Refresh the product list
}, 1000);
})
.catch(error => {
console.error('Error:', error);
alert(`Failed to create product: ${error.message || 'Unknown error'}`);
submitBtn.disabled = false;
submitBtn.innerHTML = originalBtnText;
});x
}
function closeCreateProductForm() {
    document.getElementById('create-product-form').classList.add('hidden');
    document.getElementById('create-product').reset();
}

function editProduct(productId) {
    fetch(`/api/products/${productId}`)
      .then(async response => {
        if (!response.ok) {
          const errorData = await response.json();
          throw new Error(errorData.message || 'Failed to fetch product');
        }
        return response.json();
      })
      .then(product => {
        // Populate the form
        document.getElementById('edit-id').value = productId;
        document.getElementById('edit-name').value = product.name || '';
        document.getElementById('edit-description').value = product.description || '';
        document.getElementById('edit-price').value = product.price || '';
        document.getElementById('edit-size').value = product.size || '';
        document.getElementById('edit-color').value = product.color || '';

        // Handle image preview
        const preview = document.getElementById('current-image-preview');
        const noImageMsg = document.getElementById('no-current-image');
        if (product.image_url) {
            preview.src = '/storage/' + product.image_url;
            preview.style.display = 'block';
            noImageMsg.style.display = 'none';
        } else {
            preview.style.display = 'none';
            noImageMsg.style.display = 'block';
        }

        // Show the modal
        document.getElementById('edit-product-modal').classList.remove('hidden');
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Failed to fetch product details: ' + error.message);
      });
}
  function closeEditProductModal() {
    document.getElementById('edit-product-modal').classList.add('hidden');
    document.getElementById('edit-product-form').reset();
  }

function deleteProduct(productId) {
if (confirm("Are you sure you want to delete this product?")) {
const btn = document.querySelector(`button[onclick="deleteProduct(${productId})"]`);
const originalBtnHTML = btn.innerHTML;

// Show loading state
btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
btn.disabled = true;

fetch(`/api/products/${productId}`, {
    method: 'DELETE',
    headers: {
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    }
})
.then(async response => {
    if (!response.ok) {
        const errorData = await response.json();
        throw new Error(errorData.message || 'Failed to delete product');
    }
    // Show success animation
    btn.innerHTML = '<i class="fas fa-check"></i>';
    setTimeout(() => {
        loadProducts(); // Refresh the product list
    }, 500);
})
.catch(error => {
    console.error('Error:', error);
    alert('Failed to delete product: ' + error.message);
    btn.innerHTML = originalBtnHTML;
    btn.disabled = false;
});
}

}
