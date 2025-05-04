<x-app-layout>
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 0.3s ease-out forwards; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .animate-fade-in { animation: fadeIn 0.5s ease-in forwards; }
        tr { transition: all 0.2s ease; }
        tr:hover { background-color: rgba(146, 64, 14, 0.05); transform: translateX(2px); }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <div class="flex h-screen bg-gray-100">
        <x-sidebar />
        <div class="flex flex-col flex-1 overflow-hidden">
            <div class="flex-1 overflow-auto p-6 bg-gray-50">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Products</h1>
                    <button id="create-product-btn"
                        class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-plus-circle mr-2"></i>Add New Product
                    </button>
                </div>

                @include('admin.products.add')
                @include('admin.products.edit')
               

                <div class="mt-4 p-4 bg-white shadow-lg rounded-lg border border-gray-200 animate-fade-in">
                    <div class="overflow-x-auto">
                        <table id="products-table" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">#</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">Description</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">Price</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">Size</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">Color</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">Image</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase tracking-wider">Actions</th>
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
            </div>
        </div>
    </div>

    <script src="{{ asset('js/products/index.js') }}"></script>
    <script src="{{ asset('js/products/add.js') }}"></script>
    <script src="{{ asset('js/products/edit.js') }}"></script>
    <script src="{{ asset('js/products/delete.js') }}"></script>
</x-app-layout>
