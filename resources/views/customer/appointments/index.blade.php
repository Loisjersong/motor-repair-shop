@extends('customer.layouts.app')

@section('content')
    <main class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex justify-center px-4 md:px-20 lg:px-40 mt-10">
            <div class="container bg-white shadow-lg rounded-lg">
                <h2 class="px-5 py-4 font-extrabold text-2xl border-b">Appointments</h2>
                <div class="flex justify-around text-center my-4">
                    <a href="/customer/appointments/index" class="tab-link text-white py-2 px-4 rounded-lg focus:outline-none w-full bg-blue-600 hover:bg-blue-700 transition duration-300">
                        Pending Services
                    </a>
                    <a href="/customer/appointments/approved" class="tab-link bg-graydark text-white py-2 px-4 rounded-lg focus:outline-none w-full">
                        Upcoming Services
                    </a>
                    <a href="/customer/appointments/completed" class="tab-link bg-graydark text-white py-2 px-4 rounded-lg focus:outline-none w-full">
                        Past Services
                    </a>
                </div>

                @if($appointments->isEmpty())
                    <div class="p-10 flex justify-center items-center">
                        <div>
                            <p class="mb-3">Looks like you don't have any pending appointments.</p>
                            <form action="{{ route('customer.appointments.step-one')}}" method="get" class="text-center">
                                <button type="submit" class="tab-link bg-blue-500 p-3 border-r-2 text-white focus:outline-none">Book an appointment</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default sm:px-7.5 xl:pb-1">
                        <div class="flex flex-col">
                            <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-6 rounded-sm bg-gray-2">
                                <div class="p-2.5 text-center xl:p-5">
                                    <h5 class="text-sm font-medium uppercase xsm:text-base text-black">ID</h5>
                                </div>
                                <div class="p-2.5 text-center xl:p-5">
                                    <h5 class="text-sm font-medium uppercase xsm:text-base text-black">DATE</h5>
                                </div>
                                <div class="p-2.5 text-center xl:p-5">
                                    <h5 class="text-sm font-medium uppercase xsm:text-base text-black">TIME</h5>
                                </div>
                                <div class="p-2.5 text-center xl:p-5">
                                    <h5 class="text-sm font-medium uppercase xsm:text-base text-black">Vehicle</h5>
                                </div>
                                <div class="p-2.5 text-center xl:p-5">
                                    <h5 class="text-sm font-medium uppercase xsm:text-base text-black">Services</h5>
                                </div>
                                <div class="p-2.5 text-center xl:p-5">
                                    <h5 class="text-sm font-medium uppercase xsm:text-base text-black">Action</h5>
                                </div>
                            </div>
                            @foreach ($appointments as $index => $appointment)
                                <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-6 {{ $loop->last ? '' : 'border-b border-stroke' }}">
                                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                                        <p class="hidden font-medium text-black sm:block">
                                            {{ $appointment->id }}
                                        </p>
                                    </div>
                                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                                        <p class="font-medium text-black">{{ $appointment->appointment_date->format('M d, Y') }}</p>
                                    </div>
                                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                                        <p class="font-medium text-black">{{ $appointment->appointment_date->format('h:i A') }}</p>
                                    </div>
                                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                                        <p class="font-medium text-black">{{ $appointment->vehicle->model }} ({{ $appointment->vehicle->year }})</p>
                                    </div>
                                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                                        <p class="font-medium text-black">{{ $appointment->services }}</p>
                                    </div>
                                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                                        <form action="{{ route('customer.appointments.cancel', $appointment->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="tab-link bg-red-500 p-2 text-white rounded-lg focus:outline-none hover:bg-red-600 transition duration-300">
                                                Cancel
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
