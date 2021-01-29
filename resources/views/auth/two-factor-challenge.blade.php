<x-layouts.guest>

    <x-layouts.page.main>

        <div x-data="{ open: true }">
            <div class="w-full md:w-2/3 lg:w-3/5 xl:w-2/3 mx-auto p-6 rounded-lg border border-gray-200 shadow mt-6">
                <h3 class="text-4xl semibold mt-4 mb-8">Two Factor Authentication</h3>
                <form method="POST" action="/two-factor-challenge">
                    @csrf

                    <div x-show="open">
                        <p class="mt-4">Please enter your authentication code</p>
                        <div class="mt-4">
                            <label for="code">Authentication Code</label>
                            <input type="text" id="code" name="code"
                                   class="w-full mt-1 py-1 px-3 rounded border border-gray-200">
                        </div>
                    </div>

                    <div x-show="! open">
                        <p class="mt-4">Please enter your recovery code</p>
                        <div class="mt-4">
                            <label for="recovery_code">Recovery Code</label>
                            <input type="text" id="recovery_code" name="recovery_code"
                                   class="w-full mt-1 py-1 px-3 rounded border border-gray-200">
                        </div>

                    </div>

                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="mt-1 text-red-500 text-xs italic" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <div class="mt-8">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                            Authenticate
                        </button>
                    </div>
                </form>
                <div class="mt-4">
                    <div x-show="! open" class="text-blue-500 hover:underline" @click="open = true">Use authentication code</div>
                    <div x-show="open" class="text-blue-500 hover:underline" @click="open = false">Use recovery code</div>
                </div>
            </div>
        </div>

    </x-layouts.page.main>

</x-layouts.guest>