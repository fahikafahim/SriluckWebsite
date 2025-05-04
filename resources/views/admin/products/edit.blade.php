{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
<div id="edit-product-modal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-8 rounded-2xl w-full max-w-lg shadow-lg animate-fade-in-up overflow-y-auto max-h-screen">

      <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-gray-800">Edit Product</h3>
        <button onclick="closeEditProductModal()" class="text-gray-500 hover:text-gray-700 transition">
          <i class="fas fa-times text-lg"></i>
        </button>
      </div>

      <form id="edit-product-form" class="space-y-5" enctype="multipart/form-data">
        <input type="hidden" id="edit-id" name="id">

        <div>
          <label for="edit-name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
          <input type="text" id="edit-name" name="name" class="block w-full border border-gray-300 rounded-lg py-2.5 px-4 focus:ring-amber-500 focus:border-amber-500">
        </div>

        <div>
          <label for="edit-description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
          <textarea id="edit-description" name="description" rows="3" class="block w-full border border-gray-300 rounded-lg py-2.5 px-4 focus:ring-amber-500 focus:border-amber-500"></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="edit-price" class="block text-sm font-medium text-gray-700 mb-1">Price ($)</label>
            <input type="number" step="0.01" id="edit-price" name="price" class="block w-full border border-gray-300 rounded-lg py-2.5 px-4 focus:ring-amber-500 focus:border-amber-500">
          </div>
          <div>
            <label for="edit-size" class="block text-sm font-medium text-gray-700 mb-1">Size</label>
            <input type="text" id="edit-size" name="size" class="block w-full border border-gray-300 rounded-lg py-2.5 px-4 focus:ring-amber-500 focus:border-amber-500">
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="edit-color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
            <input type="text" id="edit-color" name="color" class="block w-full border border-gray-300 rounded-lg py-2.5 px-4 focus:ring-amber-500 focus:border-amber-500">
          </div>
          <div>
            <label for="edit-image" class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
            <input type="file" id="edit-image" name="image"
                class="block w-full border border-gray-300 rounded-lg py-2.5 px-4 focus:ring-amber-500 focus:border-amber-500"
                accept="image/jpeg,image/png,image/jpg,image/gif">
            <p class="mt-1 text-xs text-gray-500">Max file size: 2MB (JPEG, PNG, JPG, GIF)</p>
            <div id="current-image-container" class="mt-2">
                <p class="text-sm text-gray-600">Current Image:</p>
                <img id="current-image-preview" src="" class="mt-1 w-24 h-24 object-cover rounded-md" style="display: none;">
                <p id="no-current-image" class="text-sm text-gray-400">No image</p>
            </div>
          </div>
        </div>

        <div class="flex justify-end space-x-3 pt-4">
          <button type="button" onclick="closeEditProductModal()" class="px-5 py-2 border border-gray-300 text-sm rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition">Cancel</button>
          <button type="submit" class="px-5 py-2 text-sm rounded-lg text-white bg-amber-800 hover:bg-amber-900 transition">Update Product</button>
        </div>
      </form>
    </div>
</div>








