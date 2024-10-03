<x-app-layout>
    <div class="flex flex-col gap-10">

    <x-a-btn class="ml-auto w-2" href="/appointments/index">Back</x-a-btn>

    <div class="rounded-sm border border-stroke bg-white px-5 pb-6 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5">
        <h4 class="mb-6 border-b border-stroke py-4 text-xl font-bold text-black dark:text-white"> Appointment Details </h4>

        <div>
            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/2">
                    <x-form-label>Appointment ID</x-form-label>
                    <x-form-input value="{{ $appointment->id }}" readonly></x-form-input>
                </div>

                <div class="w-full xl:w-1/2">
                    <x-form-label>Status</x-form-label>
                    <x-form-input value="" readonly></x-form-input>
                </div>
            </div>

            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/2">
                    <x-form-label>Appointment Date</x-form-label>
                    <x-form-input value="{{ $appointment->appointment_date->format('d M, Y') }}" readonly></x-form-input>
                </div>

                <div class="w-full xl:w-1/2">
                    <x-form-label>Appointment Time</x-form-label>
                    <x-form-input value="{{ $appointment->appointment_date->format('h:i A') }}" readonly></x-form-input>
                </div>
            </div>

            <x-form-label>Service</x-form-label>
            <x-form-input value="{{ $appointment->services }}" readonly></x-form-input>
        </div>
    </div>

    <div
        class="rounded-sm border border-stroke bg-white px-5 pb-6 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5">
        <h4 class="mb-6 border-b border-stroke py-4 text-xl font-bold text-black dark:text-white"> Customer Details
        </h4>

        <div>
            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/2">
                    <x-form-label>Full Name</x-form-label>
                    <x-form-input value="{{ $appointment->first_name }} {{ $appointment->last_name }}"
                        readonly></x-form-input>
                </div>

                <div class="w-full xl:w-1/2">
                    <x-form-label>Email</x-form-label>
                    <x-form-input value="{{ $appointment->email }}" readonly></x-form-input>
                </div>
            </div>

            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/2">
                    <x-form-label>Phone</x-form-label>
                    <x-form-input value="{{ $appointment->phone }}" readonly></x-form-input>
                </div>

                <div class="w-full xl:w-1/2">
                    <x-form-label>Address</x-form-label>
                    <x-form-input value="{{ $appointment->address }}" readonly></x-form-input>
                </div>
            </div>
        </div>
    </div>

    <div
        class="rounded-sm border border-stroke bg-white px-5 pb-6 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5">
        <h4 class="mb-6 border-b border-stroke py-4 text-xl font-bold text-black dark:text-white"> Vehicle Details
        </h4>

        <div>
            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/2">
                    <x-form-label>Model</x-form-label>
                    <x-form-input value="{{ $appointment->model }}" readonly></x-form-input>
                </div>

                <div class="w-full xl:w-1/2">
                    <x-form-label>Year</x-form-label>
                    <x-form-input value="{{ $appointment->year }}" readonly></x-form-input>
                </div>
            </div>

            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <div class="w-full xl:w-1/2">
                    <x-form-label>Transmission</x-form-label>
                    <x-form-input value="{{ $appointment->transmission }}" readonly></x-form-input>
                </div>

                <div class="w-full xl:w-1/2">
                    <x-form-label>Odometer</x-form-label>
                    <x-form-input value="{{ $appointment->odometer }}" readonly></x-form-input>
                </div>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
