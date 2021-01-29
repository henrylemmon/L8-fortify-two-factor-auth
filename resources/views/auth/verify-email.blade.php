<x-layouts.guest>

    <x-layouts.page.main>
        <div class="w-full md:w-2/3 lg:w-3/5 xl:w-2/3 mx-auto p-6 rounded-lg border border-gray-200 shadow mt-6">
            <h3 class="text-4xl semibold mt-4 mb-8">Verify Email</h3>

            <p class="mt-4">Please check your email for a email verification link</p>

            @if (session('status') == 'verification-link-sent')
                <div class="mt-4 font-medium text-sm text-green-600">
                    A new email verification link has been emailed to you!
                </div>
            @endif

            <p class="mt-4">If you did not get a link in the mail we will gladly send you another.</p>


            <div class="flex justify-between mt-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                        Send Another Link
                    </button>

                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">Log Out</button>
                </form>

            </div>
        </div>
    </x-layouts.page.main>

</x-layouts.guest>