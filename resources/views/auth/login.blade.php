<script src="https://cdn.tailwindcss.com"></script>

<div class="flex w-full flex-wrap">
    <div class="flex w-full flex-col md:w-1/2 lg:w-1/3">
        <div class="flex justify-center pt-12 md:-mb-24 md:justify-start md:pl-12">
            <a href="#" class="border-b-4 border-b-blue-700 pb-2 text-2xl font-bold text-gray-900"> STONKS | Point
                of Sale Systems. </a>
        </div>
        <div class="my-auto flex flex-col justify-center px-6 pt-8 sm:px-24 md:justify-start md:px-8 md:pt-0 lg:px-12">
            <p class="text-center text-3xl font-bold">Welcome Cashier</p>
            <p class="mt-2 text-center">Login to access your account.</p>
            <form class="flex flex-col pt-3 md:pt-8" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="flex flex-col pt-4">
                    <div
                        class="relative flex overflow-hidden rounded-lg border focus-within:border-transparent focus-within:ring-2 transition focus-within:ring-blue-600">
                        <span
                            class="inline-flex items-center border-r border-gray-300 bg-white px-3 text-sm text-gray-500 shadow-sm">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z">
                                </path>
                            </svg>
                        </span>
                        <input @error('email') is-invalid @enderror" type="email" id="email"
                            aria-describedby="email" placeholder="Email" name="email" value="{{ old('email') }}"
                            required autofocus autocomplete="username"
                            class="w-full flex-1 appearance-none border-gray-300 bg-white py-2 px-4 text-base text-gray-700 placeholder-gray-400  focus:outline-none" />

                    </div>
                </div>
                <div class="mb-12 flex flex-col pt-4">
                    <div
                        class="relative flex overflow-hidden rounded-lg border focus-within:border-transparent focus-within:ring-2 transition focus-within:ring-blue-600">
                        <span
                            class="inline-flex items-center border-r border-gray-300 bg-white px-3 text-sm text-gray-500 shadow-sm">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1376 768q40 0 68 28t28 68v576q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-576q0-40 28-68t68-28h32v-320q0-185 131.5-316.5t316.5-131.5 316.5 131.5 131.5 316.5q0 26-19 45t-45 19h-64q-26 0-45-19t-19-45q0-106-75-181t-181-75-181 75-75 181v320h736z">
                                </path>
                            </svg>
                        </span>
                        <input type="password" id="password" placeholder="Password" name="password" required
                            autocomplete="current-password"
                            class="w-full flex-1 appearance-none border-gray-300 bg-white py-2 px-4 text-base text-gray-700 placeholder-gray-400  focus:outline-none" />
                    </div>
                </div>

                @error('email')
                <div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-4 mb-8">
                    <div class="flex items-center gap-2 text-red-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd"
                                d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                clip-rule="evenodd" />
                        </svg>

                        <strong class="block font-medium"> Invalid Credentials</strong>
                    </div>

                    <p class="mt-2 text-sm text-red-700">
                        {{ $message }}
                    </p>
                </div>
                @enderror

                <button type="submit"
                    class="w-full rounded-lg bg-blue-700 px-4 py-2 text-center text-base font-semibold text-white shadow-md transition ease-in hover:bg-blue-600 focus:outline-none focus:ring-2">
                    <span class="w-full"> Submit </span>
                </button>
            </form>
            <div class="pt-12 pb-12 text-center">
                {{-- <p class="whitespace-nowrap">
                    Don't have an account?
                    <a href="#" class="font-semibold underline"> Register here. </a>
                </p> --}}
            </div>
        </div>
    </div>
    <div class="pointer-events-none hidden select-none bg-black shadow-2xl md:block md:w-1/2 lg:w-2/3">
        <img class="h-screen w-full object-cover opacity-90"
            src="https://images.unsplash.com/photo-1480796927426-f609979314bd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" />
    </div>
</div>
