@extends('customer.layouts.app')

@section('content')
    <main class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <section class="section">

            <!-- <img src="{{ asset('landing/hero-1.jpg') }}" alt="" data-aos="fade-in"> -->

            <div class="flex justify-center px-40 mt-10">
                <div class="container border-2 bg-white">
                    <h2>Appointments</h2>
                    <div class="flex justify-around text-center">
                            <a href="/customer/appointments/index" class="tab-link bg-boxdark-2 text-white py-2 px-4 rounded-lg focus:outline-none w-full">
                                Pending Services
                            </a>
                            <a href="/customer/appointments/approved" class="tab-link bg-blue-500 text-white py-2 px-4 rounded-lg focus:outline-none w-full">
                                Upcoming Services
                            </a>
                            <a href="/customer/appointments/completed" class="tab-link bg-blue-500 text-white py-2 px-4 rounded-lg focus:outline-none w-full">
                                Past Services
                            </a>
                    </div>

                    @if($appointments->isEmpty())
                        <p>Looks like you don't have any pending appointments.</p>
                        <form action="{{ route('customer.appointments.step-one')}}" method="get">
                            <button type="submit" class="tab-link bg-blue-500 text-white focus:outline-none">Book an appointment</button>
                        </form>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Vehicle Model</th>
                                    <th>Appointment Date</th>
                                    <th>Status</th>
                                    <th>Services</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->customer->first_name }} {{ $appointment->customer->last_name }}</td>
                                        <td>{{ $appointment->vehicle->model }} ({{ $appointment->vehicle->year }})</td>
                                        <td>{{ $appointment->appointment_date }}</td>
                                        <td>{{ ucfirst($appointment->status) }}</td>
                                        <td>{{ $appointment->services }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>



        </section><!-- /Hero Section -->
    </main>

@endsection
