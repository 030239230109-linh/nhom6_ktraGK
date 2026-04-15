<x-guest-layout>

    <!-- Logo + tiêu đề -->
    <div class="text-center mb-4">
    <img src="{{ asset('images/logo.jpg') }}" width="50">
    <h2 class="text-xl font-bold mt-2">Đăng ký tài khoản</h2>
        <p class="text-sm text-gray-500">Tạo tài khoản mới để bắt đầu</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Tên -->
        <div>
            <x-input-label for="name" :value="'Tên'" />
            <x-text-input id="name" class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required autofocus />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mật khẩu -->
        <div class="mt-4">
            <x-input-label for="password" :value="'Mật khẩu'" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Xác nhận mật khẩu -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="'Xác nhận mật khẩu'" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Action -->
        <div class="flex items-center justify-between mt-4">

            <a class="text-sm text-gray-600 hover:text-gray-900"
               href="{{ route('login') }}">
                Đã có tài khoản?
            </a>

            <x-primary-button>
                Đăng ký
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>