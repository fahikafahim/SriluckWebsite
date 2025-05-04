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
        .dashboard-card {
            transition: all 0.3s ease;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .sidebar-link.active {
            background-color: rgba(146, 64, 14, 0.1);
            border-left: 4px solid #92400e;
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
                <!-- Dashboard Overview -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <!-- Total Products Card -->
                    <div class="dashboard-card bg-white rounded-lg shadow p-6 flex items-center">
                        <div class="p-3 rounded-full bg-amber-100 text-amber-800 mr-4">
                            <i class="fas fa-box-open text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Products</p>
                            <p class="text-2xl font-semibold text-gray-800">1,248</p>
                            <p class="text-xs text-amber-600"><i class="fas fa-arrow-up mr-1"></i>12% from last month</p>
                        </div>
                    </div>

                    <!-- Revenue Card -->
                    <div class="dashboard-card bg-white rounded-lg shadow p-6 flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-800 mr-4">
                            <i class="fas fa-dollar-sign text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Revenue</p>
                            <p class="text-2xl font-semibold text-gray-800">$24,780</p>
                            <p class="text-xs text-green-600"><i class="fas fa-arrow-up mr-1"></i>8% from last month</p>
                        </div>
                    </div>

                   

                    <!-- Inventory Card -->
                    <div class="dashboard-card bg-white rounded-lg shadow p-6 flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-800 mr-4">
                            <i class="fas fa-warehouse text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Low Inventory</p>
                            <p class="text-2xl font-semibold text-gray-800">18</p>
                            <p class="text-xs text-purple-600"><i class="fas fa-exclamation-triangle mr-1"></i>Needs attention</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity and Quick Stats -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Recent Activity -->
                    <div class="lg:col-span-2 bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Recent Activity</h3>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div class="p-4 hover:bg-gray-50 transition-colors duration-150">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-amber-100 rounded-full p-2 text-amber-800">
                                        <i class="fas fa-plus-circle"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">New product added</p>
                                        <p class="text-sm text-gray-500">"Premium Leather Jacket" was added to inventory</p>
                                        <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 hover:bg-gray-50 transition-colors duration-150">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-blue-100 rounded-full p-2 text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Product updated</p>
                                        <p class="text-sm text-gray-500">"Classic White Sneakers" details were modified</p>
                                        <p class="text-xs text-gray-400 mt-1">5 hours ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 hover:bg-gray-50 transition-colors duration-150">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-green-100 rounded-full p-2 text-green-800">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">New order</p>
                                        <p class="text-sm text-gray-500">Order #4562 for $124.99 was placed</p>
                                        <p class="text-xs text-gray-400 mt-1">1 day ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Quick Stats</h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Top Selling Product</p>
                                    <p class="text-md font-semibold text-gray-800">Classic White Sneakers</p>
                                    <p class="text-xs text-gray-500">128 sold this month</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Most Popular Category</p>
                                    <p class="text-md font-semibold text-gray-800">Footwear</p>
                                    <p class="text-xs text-gray-500">42% of total sales</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Average Order Value</p>
                                    <p class="text-md font-semibold text-gray-800">$89.45</p>
                                    <p class="text-xs text-gray-500">+5.2% from last month</p>
                                </div>
                            </div>
                            <div class="mt-6">
                                <button class="w-full bg-amber-100 text-amber-800 py-2 px-4 rounded-md text-sm font-medium hover:bg-amber-200 transition-colors duration-200">
                                    View Full Report
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Section -->
                <div class="bg-white rounded-lg shadow-lg border border-gray-200 animate-fade-in">
                    <!-- Products Header -->
                    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800">Product Management</h2>
                            <p class="text-sm text-gray-600 mt-1">Manage your product inventory and listings</p>
                        </div>
                        <div class="flex space-x-3">
                            <button class="bg-white border border-gray-300 text-gray-700 font-medium py-2 px-4 rounded-md shadow-sm text-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-200">
                                <i class="fas fa-filter mr-2"></i>Filter
                            </button>
                            <button id="create-product-btn" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-plus-circle mr-2"></i>Add New Product
                            </button>
                        </div>
                    </div>

                    <!-- Products Table -->
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
                            <tbody id="products-container" class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-amber-800 mx-auto"></div>
                                        <span class="mt-2 block text-sm text-gray-600">Loading products...</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Table Footer -->
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">1248</span> results
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                Previous
                            </button>
                            <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-white bg-gray-800 hover:bg-gray-900">
                                1
                            </button>
                            <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                2
                            </button>
                            <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                3
                            </button>
                            <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Product Form Modal -->
    <div id="create-product-form" class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-75 flex justify-center items-center hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md animate-fade-in-up">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Add New Product</h3>
                <button onclick="closeCreateProductForm()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form id="create-product" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-amber-500 focus:border-amber-500"
                        placeholder="Enter product name" required>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="3"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-amber-500 focus:border-amber-500"
                        placeholder="Enter product description" required></textarea>
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price ($)</label>
                    <input type="number" step="0.01" id="price" name="price"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-amber-500 focus:border-amber-500"
                        placeholder="Enter product price" required>
                </div>
                <div>
                    <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
                    <input type="text" id="size" name="size"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-amber-500 focus:border-amber-500"
                        placeholder="Enter product size">
                </div>
                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                    <input type="text" id="color" name="color"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-amber-500 focus:border-amber-500"
                        placeholder="Enter product color">
                </div>
                <div>
                    <label for="image_url" class="block text-sm font-medium text-gray-700">Image URL</label>
                    <input type="text" id="image_url" name="image_url"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-amber-500 focus:border-amber-500"
                        placeholder="Enter image URL">
                </div>

                <div class="flex justify-end space-x-3 pt-2">
                    <button type="button" onclick="closeCreateProductForm()"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-200">
                        Cancel
                    </button>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-amber-800 hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-200 transform hover:scale-105">
                        <i class="fas fa-save mr-2"></i>Create Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/product.js') }}"></script>
    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });
    </script>
</x-app-layout>
