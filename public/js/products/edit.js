function editProduct(productId) {
    fetch(`/api/products/${productId}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('Product not found');
        }
        return response.json();
    })
    .then(product => {
        // Populate the form fields
        document.getElementById('edit-id').value = product.id;
        document.getElementById('edit-name').value = product.name || '';
        document.getElementById('edit-description').value = product.description || '';
        document.getElementById('edit-price').value = product.price || '';
        document.getElementById('edit-size').value = product.size || '';
        document.getElementById('edit-color').value = product.color || '';

        // Handle image preview
        const imagePreview = document.getElementById('current-image-preview');
        const noImageText = document.getElementById('no-current-image');

        if (product.image) {
            const absoluteImagePath = `${window.location.origin}/${product.image}`;
            imagePreview.src = absoluteImagePath;
            imagePreview.style.display = 'block';
            noImageText.style.display = 'none';
        } else {
            imagePreview.style.display = 'none';
            noImageText.style.display = 'block';
        }

        // Show the modal
        document.getElementById('edit-product-modal').classList.remove('hidden');
    })
    .catch(error => {
        console.error('Error fetching product:', error);
        alert('Failed to load product data');
    });
}

function closeEditProductModal() {
    document.getElementById('edit-product-modal').classList.add('hidden');
    document.getElementById('edit-product-form').reset();
}

document.getElementById('edit-product-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const productId = document.getElementById('edit-id').value;
    const formData = new FormData(this);

    // Show loading state on the submit button
    const submitButton = this.querySelector('button[type="submit"]');
    const originalButtonText = submitButton.textContent;
    submitButton.disabled = true;
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';

    formData.append('_method', 'PUT'); 

    fetch(`/api/products/${productId}`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => { throw err; });
        }
        return response.json();
    })
    .then(data => {
        alert('Product updated successfully!');
        closeEditProductModal();

        // Option 1: If you have a refreshProducts function
        if (typeof window.refreshProducts === 'function') {
            window.refreshProducts();
        }
        // Option 2: Reload the page if refreshProducts doesn't exist
        else {
            window.location.reload();
        }
    })
    .catch(error => {
        console.error('Error updating product:', error);
        let errorMessage = 'Failed to update product';
        if (error.message) {
            errorMessage = error.message;
        } else if (error.errors) {
            errorMessage = Object.values(error.errors).join('\n');
        }
        alert(errorMessage);
    })
    .finally(() => {
        submitButton.disabled = false;
        submitButton.textContent = originalButtonText;
    });
});

// Add event listener for the modal backdrop click
document.getElementById('edit-product-modal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditProductModal();
    }
});
