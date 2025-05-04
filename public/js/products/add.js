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

function closeCreateProductForm() {
    document.getElementById('create-product-form').classList.add('hidden');
    document.getElementById('create-product').reset();
}
