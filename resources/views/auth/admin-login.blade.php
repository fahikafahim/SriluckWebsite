<x-guest-layout>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .auth-container {
            background-image: url('https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1925&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .auth-overlay {
            background-color: rgba(0, 0, 0, 0.6);
        }

        .auth-card {
            backdrop-filter: blur(8px);
            background-color: rgba(255, 255, 255, 0.85);
        }

        .btn-primary {
            background: linear-gradient(to right, #222 0%, #444 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #d4a76a 0%, #e8c887 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(212, 167, 106, 0.4);
        }

        .input-field {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .input-field:focus {
            border-color: #d4a76a;
            box-shadow: 0 0 0 3px rgba(212, 167, 106, 0.2);
        }

        .admin-icon {
            background-color: rgba(212, 167, 106, 0.1);
        }
    </style>

    <div class="auth-container min-h-screen flex items-center justify-center p-4">
        <div class="auth-overlay absolute inset-0"></div>

        <div class="relative z-10 w-full max-w-md animate-fadeIn">
            <div class="auth-card rounded-xl shadow-2xl overflow-hidden border border-gray-100">
                <div class="p-8">
                    <!-- Brand Header -->
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 admin-icon rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#d4a76a]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h1 class="text-3xl font-bold text-[#222] tracking-wider">SRILUCK ADMIN</h1>
                        <p class="mt-2 text-gray-600">Secure Dashboard Access</p>
                    </div>

                    <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-label for="email" value="{{ __('Admin Email') }}" class="block text-sm font-medium text-gray-700 mb-1" />
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <x-input id="email" class="input-field block w-full pl-10 pr-3 py-2 rounded-lg focus:ring-[#d4a76a]"
                                         type="email" name="email" :value="old('email')" required autofocus
                                         placeholder="admin@example.com" />
                            </div>
                        </div>

                        <div>
                            <x-label for="password" value="{{ __('Password') }}" class="block text-sm font-medium text-gray-700 mb-1" />
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <x-input id="password" class="input-field block w-full pl-10 pr-3 py-2 rounded-lg focus:ring-[#d4a76a]"
                                         type="password" name="password" required
                                         placeholder="••••••••" />
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-[#d4a76a] focus:ring-[#d4a76a] border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                    {{ __('Remember me') }}
                                </label>
                            </div>

                            <div class="text-sm">
                                <a href="#" class="font-medium text-[#222] hover:text-[#d4a76a]">
                                    {{ __('Forgot password?') }}
                                </a>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn-primary w-full flex justify-center py-3 px-4 border border-transparent rounded-lg text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#d4a76a]">
                                {{ __('Sign In to Dashboard') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
