@extends('customer.layouts.app')

@section('content')
    <x-container>
        <h1>Your Appointments</h1>
        @if($appointments->isEmpty())
            <p>No appointments found.</p>
        @else
            @foreach($appointments as $appointment)
                <div class="appointment">
                    <p><strong>Model:</strong> {{ $appointment->model }}</p>
                    <p><strong>Year:</strong> {{ $appointment->year }}</p>
                    <p><strong>Transmission:</strong> {{ $appointment->transmission }}</p>
                    <p><strong>Odometer:</strong> {{ $appointment->odometer }}</p>
                    <p><strong>Services:</strong> {{ $appointment->services }}</p>
                    <p><strong>Note:</strong> {{ $appointment->note }}</p>
                    <p><strong>First Name:</strong> {{ $appointment->first_name }}</p>
                    <p><strong>Last Name:</strong> {{ $appointment->last_name }}</p>
                    <p><strong>Phone:</strong> {{ $appointment->phone }}</p>
                    <p><strong>Email:</strong> {{ $appointment->email }}</p>
                    <p><strong>Address:</strong> {{ $appointment->address }}</p>
                    <p><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>
                </div>
            @endforeach
        @endif
    </x-container>
@endsection
