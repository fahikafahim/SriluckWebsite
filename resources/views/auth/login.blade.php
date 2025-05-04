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
            background-image: url('/images/loginbg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .auth-overlay {
            background-color: rgba(0, 0, 0, 0.351);
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
            background: linear-gradient(to right, #2e261a 0%, #14110b 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(212, 167, 106, 0.4);
        }
    </style>

    <div class="auth-container min-h-screen flex items-center justify-center p-4">
        <div class="auth-overlay absolute inset-0"></div>

        <div class="relative z-10 w-full max-w-md animate-fadeIn">
            <div class="auth-card rounded-xl shadow-2xl overflow-hidden border border-gray-100">
                <div class="p-8">
                    <!-- Brand Header -->
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-[#222] tracking-wider">SRILUCK</h1>
                        <p class="mt-2 text-gray-600">Premium Footwear Collection</p>
                    </div>

                    <x-validation-errors class="mb-6 bg-red-50 p-4 rounded-lg text-red-600 text-sm" />

                    @session('status')
                        <div class="mb-6 bg-green-50 p-4 rounded-lg text-green-600 text-sm">
                            {{ $value }}
                        </div>
                    @endsession

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-label for="email" value="{{ __('Email') }}" class="block text-sm font-medium text-gray-700 mb-1" />
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <x-input id="email" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-[#493923] focus:border-[#493a25]"
                                         type="email" name="email" :value="old('email')" required autofocus
                                         placeholder="your@email.com" />
                            </div>
                        </div>

                        <div>
                            <x-label for="password" value="{{ __('Password') }}" class="block text-sm font-medium text-gray-700 mb-1" />
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <x-input id="password" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-[#483821] focus:border-[#493a25]"
                                         type="password" name="password" required
                                         placeholder="••••••••" />
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-[#7b531b] focus:ring-[#483821] border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                    {{ __('Remember me') }}
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="text-sm">
                                    <a href="{{ route('password.request') }}" class="font-medium text-[#222] hover:text-[#4d371a]">
                                        {{ __('Forgot password?') }}
                                    </a>
                                </div>
                            @endif
                        </div>

                        <div>
                            <button type="submit" class="btn-primary w-full flex justify-center py-3 px-4 border border-transparent rounded-lg text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#483821]">
                                {{ __('Sign in') }}
                                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </form>

                    @if (Route::has('register'))
                        <div class="mt-6 text-center text-sm text-gray-600">
                            <p>
                                {{ __("Don't have an account?") }}
                                <a href="{{ route('register') }}" class="font-medium text-[#222] hover:text-[#7f5a26]">
                                    {{ __('Register now') }}
                                </a>
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
