<script src="https://cdn.tailwindcss.com"></script>

<main class="login-form">
    <div class="bg-gradient-to-r from-blue-600 to-indigo-500">
        <div
            class="mx-auto h-full px-4 py-10 sm:max-w-xl md:max-w-full md:px-24 lg:max-w-screen-xl lg:px-8 lg:py-16 xl:py-28">
            <div class="flex flex-col items-center justify-between">
                <div class="">
                    <div class="max-w-3xl">
                        <h1
                            class="mb-6 text-center text-5xl font-light tracking-tight text-white sm:text-5xl lg:text-7xl">
                            Forgot Your Password? <span class="my-1 inline-block font-serif font-bold text-white"> I
                                gotchu
                                homie. </span></h1>
                        <p class="text-center text-base text-gray-100">We all forget our passwords from time to time,
                            it's
                            okay, that means we are only human.</p>
                    </div>
                    @if (Session::has('message'))
                        <div
                            class="relative m-2 my-8 max-w-full rounded-lg border border-gray-100 bg-white px-12 py-6 shadow-md">
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
                                <span class="text-gray-700">Sent successfuly!</span>
                            </p>
                            <p class="text-sm text-gray-600"> {{ Session::get('message') }}.</p>
                        </div>
                    @endif

                    <form action="{{ route('ForgetPasswordPost') }}" method="POST"
                        class="mx-auto mt-12 mb-2 max-w-xl sm:rounded-xl sm:border sm:border-gray-100 sm:bg-white sm:p-2 sm:shadow">
                        @csrf
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">




                            <div class="relative text-gray-500 sm:w-7/12">
                                <label for="email" class="sr-only border-gray-300"></label>
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                                            class=""></path>
                                    </svg>
                                </div>
                                <input type="email" name="email" required autofocus
                                    placeholder="Enter email address"
                                    class="w-full cursor-text rounded-xl border-2 py-4 pr-4 pl-10 text-base outline-none transition-all duration-200 ease-in-out sm:border-0 focus:border-transparent focus:ring"
                                    required="" />


                            </div>



                            <button type="submit"
                                class="group flex items-center justify-center rounded-xl bg-blue-700 px-6 py-4 text-white transition">
                                <span
                                    class="group flex w-full items-center justify-center rounded text-center font-medium">Send
                                    Email Password Reset Link! </span>
                                <svg class="shrink-0 group-hover:ml-8 ml-4 h-4 w-4 transition-all"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3">
                                    </path>
                                </svg>
                            </button>
                        </div>


                    </form>

                    @if ($errors->has('email'))
                        <div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-4 mb-8">
                            <div class="flex items-center gap-2 text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-5 w-5">
                                    <path fill-rule="evenodd"
                                        d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                        clip-rule="evenodd" />
                                </svg>

                                <strong class="block font-medium"> Email is not found. </strong>
                            </div>

                            <p class="mt-2 text-sm text-red-700">
                                {{ $errors->first('email') }}
                            </p>
                        </div>
                    @endif


                    <div
                        class="divide-gray-300/30 mt-12 flex flex-col items-center justify-center space-y-3 text-sm text-gray-700 sm:flex-row sm:items-start sm:space-y-0 sm:divide-x">
                        <div class="flex max-w-xs space-x-2 px-4">

                            <span
                                class="shrink-0 flex h-14 w-14 items-center justify-center rounded-xl bg-white p-2.5 text-purple-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z">
                                    </path>
                                </svg>
                            </span>
                            <p class="text-gray-100"> <br>Enter your email used.</p>
                        </div>
                        <div class="flex max-w-xs space-x-2 px-4">
                            <span
                                class="shrink-0 flex h-14 w-14 items-center justify-center rounded-xl bg-white p-2.5 text-rose-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125">
                                    </path>
                                </svg>
                            </span>
                            <p class="text-gray-100"> <br> Then receive a confirmation email!</p>
                        </div>
                    </div>
                </div>
                <div class="relative mt-20 hidden lg:block">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="mx-auto my-6 h-10 w-10 animate-bounce rounded-full bg-blue-50 p-2 lg:hidden"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 17l-4 4m0 0l-4-4m4 4V3"></path>
                    </svg>
                    <div class="w-fit mx-auto flex overflow-hidden rounded-3xl bg-orange-400" role="image-container">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
