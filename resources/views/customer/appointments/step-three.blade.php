@extends('customer.layouts.app')

@section('content')
    <x-appointment-stepper :currentStep="3" />
    <x-container>
        <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
            <h3 class="font-medium text-black dark:text-white">
                Appointment Details
            </h3>
        </div>

        <form action="/customer/appointments/step-three" method="POST">
            @csrf
            <div class="p-6.5">
                <div class="mb-4.5">
                    <div>
                        <x-form-label for="first_name">First Name</x-form-label>
                        <x-form-input id="first_name" name="first_name" type="text" value="{{ Auth::user()->first_name }}" required></x-form-input>
                        <x-input-error :messages="$errors->get('first_name')" />
                    </div>

                    <div>
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <x-form-input id="last_name" name="last_name" type="text" value="{{ Auth::user()->last_name }}" required></x-form-input>
                        <x-input-error :messages="$errors->get('last_name')" />
                    </div>

                    <div>
                        <x-form-label for="phone">Phone Number</x-form-label>
                        <x-form-input id="phone" name="phone" type="number" value="{{ Auth::user()->phone }}" required></x-form-input>
                        <x-input-error :messages="$errors->get('phone')" />
                    </div>

                    <div>
                        <x-form-label for="email">Email</x-form-label>
                        <x-form-input id="email" name="email" type="email" value="{{ Auth::user()->email }}" required></x-form-input>
                        <x-input-error :messages="$errors->get('email')" />
                    </div>
                </div>
                <div>
                    <x-form-label for="address">Address</x-form-label>
                    <x-form-input id="address" name="address" type="text" value="{{ Auth::user()->address }}" required></x-form-input>
                    <x-input-error :messages="$errors->get('address')" />
                </div>

                <!-- Schedule -->
                <div>
                    <x-form-label for="appointment_date">Schedule Appointment</x-form-label>
                    <x-form-input id="appointment_date" type="datetime-local" name="appointment_date" required></x-form-input>
                    <x-input-error :messages="$errors->get('appointment_date')" />
                </div>
            </div>
            <x-button type="submit">Next</x-button>
        </form>
    </x-container>
@endsection
