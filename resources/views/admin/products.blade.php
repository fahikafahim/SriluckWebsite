<x-app-layout>
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.3s ease-out forwards;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-in forwards;
        }

        tr {
            transition: all 0.2s ease;
        }

        tr:hover {
            background-color: rgba(146, 64, 14, 0.05);
            transform: translateX(2px);
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <x-sidebar />
        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Page Content -->
            <div class="flex-1 overflow-auto p-6 bg-gray-50">
                <!-- Header and Create Button -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Products</h1>
                    <button id="create-product-btn"
                        class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-plus-circle mr-2"></i>Add New Product
                    </button>
                </div>

                <!-- Create Product Form -->
                              <!-- Create Product Form -->
                              <div id="create-product-form"
                              class="fixed inset-0 w-full h-full bg-gray-900 bg-opacity-75 flex justify-center items-center hidden z-50">
                              <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl mx-4 animate-fade-in-up">
                                  <!-- Form Header -->
                                  <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
                                      <h3 class="text-xl font-bold text-gray-800">Add New Product</h3>
                                      <button onclick="closeCreateProductForm()"
                                          class="text-gray-500 hover:text-gray-700 transition-colors duration-200">
                                          <i class="fas fa-times text-lg"></i>
                                      </button>
                                  </div>

                                  <!-- Form Content -->
                                  <div class="p-6">
                                      <form id="create-product" method="POST" class="space-y-5">
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

                                          <!-- Form Footer -->
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

                <!-- Products Table -->
                <div class="mt-4 p-4 bg-white shadow-lg rounded-lg border border-gray-200 animate-fade-in">
                    <div class="overflow-x-auto">
                        <table id="products-table" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-900">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">
                                        #</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">
                                        Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">
                                        Description</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">
                                        Price</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">
                                        Size</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">
                                        Color</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">
                                        Image</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody id="products-container">
                                <tr>
                                  <td colspan="8" class="text-center py-4">
                                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-amber-800 mx-auto"></div>
                                    <span class="mt-2 block text-sm text-gray-600">Loading products...</span>
                                  </td>
                                </tr>
                              </tbody>

                        </table>
                    </div>
                </div>


                <!-- Edit Product Modal -->
<div id="edit-product-modal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-8 rounded-2xl w-full max-w-lg shadow-lg animate-fade-in-up">
      <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-gray-800">Edit Product</h3>
        <button onclick="closeEditProductModal()" class="text-gray-500 hover:text-gray-700 transition">
          <i class="fas fa-times text-lg"></i>
        </button>
      </div>

      <form id="edit-product-form" class="space-y-5">
        <input type="hidden" id="edit-id" name="id">

        <div>
          <label for="edit-name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
          <input type="text" id="edit-name" name="name" class="block w-full border border-gray-300 rounded-lg py-2.5 px-4 focus:ring-amber-500 focus:border-amber-500" required>
        </div>

        <div>
          <label for="edit-description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
          <textarea id="edit-description" name="description" rows="3" class="block w-full border border-gray-300 rounded-lg py-2.5 px-4 focus:ring-amber-500 focus:border-amber-500" required></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="edit-price" class="block text-sm font-medium text-gray-700 mb-1">Price ($)</label>
            <input type="number" step="0.01" id="edit-price" name="price" class="block w-full border border-gray-300 rounded-lg py-2.5 px-4 focus:ring-amber-500 focus:border-amber-500" required>
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
   <script src="{{ asset('js/product.js') }}"></script>

</x-app-layout>
