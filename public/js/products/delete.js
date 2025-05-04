function deleteProduct(productId) {
    if (confirm("Are you sure you want to delete this product?")) {
        const btn = document.querySelector(`button[onclick="deleteProduct(${productId})"]`);
        const originalBtnHTML = btn.innerHTML;

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
            btn.innerHTML = '<i class="fas fa-check"></i>';
            setTimeout(() => {
                loadProducts();
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
