<x-layouts.app>

    <x-layouts.page.main>
        <div class="w-full md:w-2/3 lg:w-3/5 xl:w-2/3 mx-auto p-6 rounded-lg border border-gray-200 shadow mt-6">
            <h3 class="text-4xl semibold mt-4 mb-8">Update Profile Information</h3>
            <form method="POST" action="{{ route('user-profile-information.update') }}">
                @csrf

                @method('PUT')

                @if (session('status') === 'profile-information-updated')
                    <div class="mt-4 font-medium text-sm text-green-600">
                        Profile information has been updated.
                    </div>
                @endif
                <div class="mt-4">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
                           class="w-full mt-1 py-1 px-3 rounded border border-gray-200">
                    @error('name')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                           class="w-full mt-1 py-1 px-3 rounded border border-gray-200">

                    @error('email')
                    <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-8">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                        Update Profile
                    </button>
                </div>
            </form>
            <hr class="mt-8">

            <h3 class="text-4xl semibold mt-8 mb-8">Update Password</h3>
            <form method="POST" action="{{ route('user-password.update') }}">
                @csrf

                @method('PUT')

                @if (session('status') === 'password-updated')
                    <div class="mt-4 font-medium text-sm text-green-600">
                        Password has been updated.
                    </div>
                @endif
                <div class="mt-4">
                    <label for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password"
                           class="w-full mt-1 py-1 px-3 rounded border border-gray-200">
                    @error('current_password')
                    <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password"
                           class="w-full mt-1 py-1 px-3 rounded border border-gray-200">
                    @error('password')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full mt-1 py-1 px-3 rounded border border-gray-200">
                </div>

                <div class="mt-8">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                        Update Password
                    </button>
                </div>
            </form>

            <hr class="mt-8">
            <h3 class="text-4xl semibold mt-8 mb-8">Two Factor Authentication</h3>
            
            <div>
                @if (! auth()->user()->two_factor_secret)
                    <div>
                        <form method="POST" action="/user/two-factor-authentication">
                            @csrf

                            @if ($errors->any())
                                <div class="mt-4">
                                    <div class="mt-2">Something went wrong!</div>
                                    @foreach ($errors->all() as $error)
                                        <div class="mt-1 font-medium text-sm text-red-600">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if (session('status') == 'two-factor-authentication-disabled')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    Two factor authentication has been disabled.
                                </div>
                            @endif

                            <button type="submit"
                                    class=" mt-4 bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                                Enable Two Factor Authentication
                            </button>
                        </form>
                    </div>

                @else
                    <div>
                        <form method="POST" action="/user/two-factor-authentication">
                            @csrf
                            @method('DELETE')

                            @if (session('status') == 'two-factor-authentication-enabled')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    Two factor authentication has been enabled.
                                </div>
                            @endif

                            <button type="submit"
                                    class=" mt-6 bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                                Disable Two Factor Authentication
                            </button>
                        </form>
                    </div>

                    <div>
                        <div>
                            <div class="flex mt-6">
                                <div class="p-6 rounded-lg border border-gray-200 shadow">
                                    {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                </div>
                            </div>

                            <div class="flex mt-6">
                                <div class="p-6 rounded-lg border border-gray-200 shadow">
                                    @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                        <div class="mt-1">{{ $code }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div>
                            <form method="POST" action="/user/two-factor-recovery-codes">
                                @csrf

                                <button type="submit"
                                        class=" mt-6 bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                                    Regenerate Authentication Codes
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

            </div>
            
        </div>
    </x-layouts.page.main>

</x-layouts.app>