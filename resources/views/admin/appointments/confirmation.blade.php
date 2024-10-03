<x-app-layout>
    <x-appointment-stepper :currentStep="4" />
    <x-container>
        <form method="POST" action="{{ route('appointments.confirmation.post') }}">
            @csrf
            <div class="p-6.5">
                <div class="mb-4.5">
                    <!-- Display collected appointment details -->
                    <div class="mb-3">
                        <h3 class="font-medium text-black dark:text-white"> Vehicle Information </h3>
                        <p class="block text-sm font-medium text-black dark:text-white">Model: {{ $appointment['model'] }}</p>
                        <p class="block text-sm font-medium text-black dark:text-white">Year: {{ $appointment['year'] }}</p>
                        <p class="block text-sm font-medium text-black dark:text-white">Transmission: {{ $appointment['transmission'] }}</p>
                        <p class="block text-sm font-medium text-black dark:text-white">Odometer: {{ $appointment['odometer'] }}</p>
                    </div>

                    <div class="mb-3">
                        <h3 class="font-medium text-black dark:text-white">Services</h3>
                        <p class="block text-sm font-medium text-black dark:text-white">Selected Services: {{ $appointment['services'] }}</p>
                    </div>

                    <div class="mb-3">
                        <h3 class="font-medium text-black dark:text-white">Personal Details</h3>
                        <p class="block text-sm font-medium text-black dark:text-white">First Name: {{ $appointment['first_name'] }}</p>
                        <p class="block text-sm font-medium text-black dark:text-white">Last Name: {{ $appointment['last_name'] }}</p>
                        <p class="block text-sm font-medium text-black dark:text-white">Phone: {{ $appointment['phone'] }}</p>
                        <p class="block text-sm font-medium text-black dark:text-white">Email: {{ $appointment['email'] }}</p>
                        <p class="block text-sm font-medium text-black dark:text-white">Address: {{ $appointment['address'] }}</p>
                        <p class="block text-sm font-medium text-black dark:text-white">Additional Notes: {{ $appointment['note'] }}</p>
                        <p class="block text-sm font-medium text-black dark:text-white">Appointment Date: {{ \Carbon\Carbon::parse($appointment['appointment_date'])->format('F j, Y g:iA') }}</p>
                    </div>

                </div>
            </div>
            <x-button type="submit" class="w-full"> Book Appointment </x-button>
        </form>

    </x-container>

</x-app-layout>
