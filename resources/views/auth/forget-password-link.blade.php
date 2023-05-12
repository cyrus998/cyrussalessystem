<script src="https://cdn.tailwindcss.com"></script>

<div class="flex w-full flex-wrap">
    <div class="flex w-full flex-col md:w-1/2 lg:w-1/3">
        <div class="my-auto flex flex-col justify-center px-6 pt-8 sm:px-24 md:justify-start md:px-8 md:pt-0 lg:px-12">
            <p class="text-center text-3xl font-bold">RESET YOUR PASSWORD</p>
            <p class="mt-2 text-center">Enter your Desired Credentials.</p>
            <form class="flex flex-col pt-3 md:pt-8"action="{{ route('ResetPasswordPost') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

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
                        <input type="text" id="email_address" name="email" required autofocus
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
                        <input type="password" id="password" name="password" required autofocus
                            class="w-full flex-1 appearance-none border-gray-300 bg-white py-2 px-4 text-base text-gray-700 placeholder-gray-400  focus:outline-none" />

                    </div>

                    <div
                        class="mt-6 relative flex overflow-hidden rounded-lg border focus-within:border-transparent focus-within:ring-2 transition focus-within:ring-blue-600">
                        <span
                            class="inline-flex items-center border-r border-gray-300 bg-white px-3 text-sm text-gray-500 shadow-sm">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1376 768q40 0 68 28t28 68v576q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-576q0-40 28-68t68-28h32v-320q0-185 131.5-316.5t316.5-131.5 316.5 131.5 131.5 316.5q0 26-19 45t-45 19h-64q-26 0-45-19t-19-45q0-106-75-181t-181-75-181 75-75 181v320h736z">
                                </path>
                            </svg>
                        </span>
                        <input type="password" id="password-confirm" name="password_confirmation" required autofocus
                            class="w-full flex-1 appearance-none border-gray-300 bg-white py-2 px-4 text-base text-gray-700 placeholder-gray-400  focus:outline-none" />

                    </div>


                    @if ($errors->any())
                        <div
                            class="relative m-2 mt-2 max-w-full rounded-lg border border-gray-100 bg-white px-12 py-6 shadow-md">
                            <button class="absolute top-0 right-0 p-4 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-5 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            <p class="relative mb-1 text-sm font-medium">
                                <span
                                    class="absolute -left-7 flex h-5 w-5 items-center justify-center rounded-xl bg-green-400 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-3 w-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </span>
                                <span class="text-gray-700">Information:</span>
                            </p>
                            <p class="text-sm text-gray-600">
                                {{ $errors->first('password') }}
                                {{ $errors->first('password_confirmation') }}
                                {{ $errors->first('email') }}

                            </p>
                        </div>
                    @endif

                </div>

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

                <a class="btn btn-link" href="{{ route('ForgetPasswordGet') }}">
                    {{ __('Forgot Your Password?') }}
                </a>

            </div>
        </div>
    </div>
    <div class="pointer-events-none hidden select-none bg-black shadow-2xl md:block md:w-1/2 lg:w-2/3">
        <img class="h-screen w-full object-cover opacity-90"
            src="https://images.unsplash.com/photo-1480796927426-f609979314bd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" />
    </div>
</div>
