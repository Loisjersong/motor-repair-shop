<x-app-layout>
    <div class="flex flex-col gap-10">

    <x-a-btn class="ml-auto w-2" href="/appointments/index">Back</x-a-btn>

    <form method="POST" action="/appointments/{{ $appointment->id }}">
        @csrf
        @method('PUT')

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
                        <x-form-input name="status" value="{{ $appointment->status }}"></x-form-input>
                    </div>
                </div>

                <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                    <div class="w-full xl:w-1/2">
                        <x-form-label>Appointment Date</x-form-label>
                        <x-form-input name="appointment_date" value="{{ $appointment->appointment_date->format('d M, Y') }}"></x-form-input>
                    </div>

                    <div class="w-full xl:w-1/2">
                        <x-form-label>Appointment Time</x-form-label>
                        <x-form-input name="appointment_time" value="{{ $appointment->appointment_date->format('h:i A') }}"></x-form-input>
                    </div>
                </div>

                <x-form-label>Service</x-form-label>
                <x-form-input name="services" value="{{ $appointment->services }}"></x-form-input>
            </div>
        </div>

        <div class="rounded-sm border border-stroke bg-white px-5 pb-6 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5">
            <h4 class="mb-6 border-b border-stroke py-4 text-xl font-bold text-black dark:text-white"> Customer Details </h4>

            <div>
                <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                    <div class="w-full xl:w-1/2">
                        <x-form-label>Full Name</x-form-label>
                        <x-form-input name="customer_first_name" value="{{ $appointment->customer->first_name }}"></x-form-input>
                        <x-form-input name="customer_last_name" value="{{ $appointment->customer->last_name }}"></x-form-input>
                    </div>

                    <div class="w-full xl:w-1/2">
                        <x-form-label>Email</x-form-label>
                        <x-form-input name="customer_email" value="{{ $appointment->customer->email }}"></x-form-input>
                    </div>
                </div>

                <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                    <div class="w-full xl:w-1/2">
                        <x-form-label>Phone</x-form-label>
                        <x-form-input name="customer_phone" value="{{ $appointment->customer->phone }}"></x-form-input>
                    </div>

                    <div class="w-full xl:w-1/2">
                        <x-form-label>Address</x-form-label>
                        <x-form-input name="customer_address" value="{{ $appointment->customer->address }}"></x-form-input>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-sm border border-stroke bg-white px-5 pb-6 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5">
            <h4 class="mb-6 border-b border-stroke py-4 text-xl font-bold text-black dark:text-white"> Vehicle Details </h4>

            <div>
                <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                    <div class="w-full xl:w-1/2">
                        <x-form-label>Model</x-form-label>
                        <x-form-input name="vehicle_model" value="{{ $appointment->vehicle->model }}"></x-form-input>
                    </div>

                    <div class="w-full xl:w-1/2">
                        <x-form-label>Year</x-form-label>
                        <x-form-input name="vehicle_year" value="{{ $appointment->vehicle->year }}"></x-form-input>
                    </div>
                </div>

                <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                    <div class="w-full xl:w-1/2">
                        <x-form-label>Transmission</x-form-label>
                        <x-form-input name="vehicle_transmission" value="{{ $appointment->vehicle->transmission }}"></x-form-input>
                    </div>

                    <div class="w-full xl:w-1/2">
                        <x-form-label>Odometer</x-form-label>
                        <x-form-input name="vehicle_odometer" value="{{ $appointment->vehicle->odometer }}"></x-form-input>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <x-button type="submit">Save Changes</x-button>
        </div>
    </form>

    </div>
</x-app-layout>
