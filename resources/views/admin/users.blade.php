<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-gray-50 overflow-auto">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">User Management</h1>
            </div>

            <div class="p-4 bg-white rounded-lg shadow border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-900">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase">Created At</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-amber-50 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->created_at ? $user->created_at->format('Y-m-d H:i') : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    @if($users->isEmpty())
                        <p class="text-gray-500 text-center py-4">No users found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
