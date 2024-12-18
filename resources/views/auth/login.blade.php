<x-guest-layout>
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="/" class="flex items-center mb-6 text-2xl font-semibold text-black dark:text-white">
                    4M MOTORSHOP
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1 class="text-xl font-bold leading-tight tracking-tight text-black md:text-2xl dark:text-white">
                                    Sign in to your account
                            </h1>
                            <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div>
                                            <label for="email" class="block mb-2 text-sm font-medium text-black dark:text-white">Your email</label>
                                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="old('email')" required autofocus autocomplete="username">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div>
                                            <label for="password" class="block mb-2 text-sm font-medium text-black dark:text-white">Password</label>
                                            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-black rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autocomplete="current-password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="flex items-center justify-between">
                                            <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                            <input id="remember_me" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" name="remember">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                            <label for="remember_me" class="text-black dark:text-gray-300">Remember me</label>
                                                    </div>
                                            </div>
                                    </div>
                                <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign in</button>
                                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                            Don’t have an account yet? <a href="/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                                    </p>
                            </form>
                    </div>
            </div>
    </div>
</section>
</x-guest-layout>
