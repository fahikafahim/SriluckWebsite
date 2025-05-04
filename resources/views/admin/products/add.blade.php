<div id="create-product-form"
    class="fixed inset-0 w-full h-full bg-gray-900 bg-opacity-75 flex justify-center items-center hidden z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl mx-4 animate-fade-in-up">
        <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
            <h3 class="text-xl font-bold text-gray-800">Add New Product</h3>
            <button onclick="closeCreateProductForm()"
                class="text-gray-500 hover:text-gray-700 transition-colors duration-200">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <div class="p-6">
            <form id="create-product" method="POST" class="space-y-5" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                        <input type="text" id="name" name="name"
                            class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-4 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                            placeholder="Enter product name" required>
                    </div>
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price ($)</label>
                        <input type="number" step="0.01" id="price" name="price"
                            class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-4 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                            placeholder="Enter product price" required>
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-4 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                        placeholder="Enter product description" required></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="size" class="block text-sm font-medium text-gray-700 mb-1">Size</label>
                        <input type="text" id="size" name="size"
                            class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-4 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                            placeholder="Enter product size">
                    </div>
                    <div>
                        <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                        <input type="text" id="color" name="color"
                            class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-4 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                            placeholder="Enter product color">
                    </div>
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                    <input type="file" id="image" name="image"
                        class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-4 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200"
                        accept="image/jpeg,image/png,image/jpg,image/gif">
                    <p class="mt-1 text-xs text-gray-500">Max file size: 2MB (JPEG, PNG, JPG, GIF)</p>
                </div>

                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <button type="button" onclick="closeCreateProductForm()"
                        class="inline-flex items-center px-5 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-200">
                        Cancel
                    </button>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-amber-800 hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-200">
                        <i class="fas fa-save mr-2"></i>Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
