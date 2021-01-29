<x-layouts.guest>

    <x-layouts.page.main>
        <div class="w-full md:w-2/3 lg:w-3/5 xl:w-2/3 mx-auto p-6 rounded-lg border border-gray-200 shadow mt-6">
            <h3 class="text-4xl semibold mt-4 mb-8">Login</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mt-4">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}"
                           class="w-full mt-1 py-1 px-3 rounded border border-gray-200">

                    @error('email')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                           class="w-full mt-1 py-1 px-3 rounded border border-gray-200">
                    @error('password')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="flex items-center mt-8">
                    <input type="checkbox" id="remember" name="remember" class="mr-2">
                    <label for="remember">Remember Me</label>
                </div>

                <div class="flex justify-between items-center mt-8">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                        Submit
                    </button>
                    <a href="{{ route('password.request') }}" class="text-blue-500 hover:text-blue-600 hover:underline">
                        Forgot Password?
                    </a>
                    <a href="/"
                       class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </x-layouts.page.main>

</x-layouts.guest>
