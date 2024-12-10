@extends('customer.layouts.app')

@section('content')
<main class="flex justify-center items-center">
    <div class="w-full max-w-md">
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <h2 class="px-5 py-4 font-extrabold text-2xl border-b">profile edit</h2>

                <form method="POST" action="{{ route('customer.profile.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="p-6.5">
                        <div class="mb-4.5">
                            <!-- First Name -->
                            <div>
                                <x-form-label for="first_name">First Name</x-form-label>
                                <x-form-input type="text" name="first_name" value="{{ $user->first_name }}" required></x-form-input>
                                <x-input-error :messages="$errors->get('first_name')" />
                            </div>

                            <!-- Last Name -->
                            <div>
                                <x-form-label for="last_name">Last Name</x-form-label>
                                <x-form-input type="text" name="last_name" value="{{ $user->last_name }}" required></x-form-input>
                                <x-input-error :messages="$errors->get('last_name')" />
                            </div>

                            <!-- Email -->
                            <div>
                                <x-form-label for="email">Email</x-form-label>
                                <x-form-input type="email" name="email" value="{{ $user->email }}" required></x-form-input>
                                <x-input-error :messages="$errors->get('email')" />
                            </div>

                            <!-- Mobile Number -->
                            <div>
                                <x-form-label for="phone">Mobile Number</x-form-label>
                                <x-form-input type="number" name="phone" value="{{ $user->phone }}" required></x-form-input>
                                <x-input-error :messages="$errors->get('phone')" />
                            </div>

                            <!-- Password -->
                            <div>
                                <x-form-label for="password">Password</x-form-label>
                                <x-form-input type="password" name="password"></x-form-input>
                                <x-input-error :messages="$errors->get('password')" />
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                                <x-form-input type="password" name="password_confirmation"></x-form-input>
                                <x-input-error :messages="$errors->get('password_confirmation')" />
                            </div>

                            <!-- Date of Birth -->
                            <div>
                                <x-form-label for="date_of_birth">Date of Birth</x-form-label>
                                <x-form-input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}" required></x-form-input>
                                <x-input-error :messages="$errors->get('date_of_birth')" />
                            </div>

                        </div>
                        <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

@endsection
