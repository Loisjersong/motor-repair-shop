<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::with('customer', 'vehicle')->paginate(10); // Eager load relationships
        return view('admin.appointments.index', ['appointments' => $appointments]);
    }

    public function show(Appointment $appointment) {
        return view('admin.appointments.show', ['appointment' => $appointment]);
    }

    public function edit(Appointment $appointment) {
        return view('admin.appointments.edit', ['appointment' => $appointment]);
    }

    public function update(Request $request, Appointment $appointment) {
        $validatedData = $request->validate([
            'model' => 'required|string',
            'year' => 'required|string',
            'transmission' => 'required|string',
            'odometer' => 'required|string',
            'services' => 'required|string',
            'note' => 'nullable|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'nullable|string',
            'appointment_date' => 'required|date',
        ]);

        // Update Customer
        $appointment->customer->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address'],
        ]);

        // Update Vehicle
        $appointment->vehicle->update([
            'model' => $validatedData['model'],
            'year' => $validatedData['year'],
            'transmission' => $validatedData['transmission'],
            'odometer' => $validatedData['odometer'],
        ]);

        // Update Appointment
        $appointment->update([
            'services' => $validatedData['services'],
            'note' => $validatedData['note'],
            'appointment_date' => $validatedData['appointment_date'],
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    // Show Step 1: Vehicle Info
    public function showStepOne(Request $request) {
        $appointment = $request->session()->get('appointment', []);
        return view('admin.appointments.step-one', ['appointment' => $appointment]);
    }

    // Store data from Step 1
    public function storeStepOne(Request $request) {
        $validatedData = $request->validate([
            'model' => 'required|string',
            'year' => 'required|string',
            'transmission' => 'required|string',
            'odometer' => 'required|string',
        ]);

        $appointment = $request->session()->get('appointment', []);
        $appointment = array_merge($appointment, $validatedData);
        $request->session()->put('appointment', $appointment);

        return redirect()->route('appointments.step-two');
    }

    // Show Step 2: Services
    public function showStepTwo(Request $request) {
        $appointment = $request->session()->get('appointment', []);
        return view('admin.appointments.step-two', ['appointment' => $appointment]);
    }

    // Store data from Step 2
    public function storeStepTwo(Request $request) {
        $validatedData = $request->validate([
            'services' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $appointment = $request->session()->get('appointment', []);
        $appointment = array_merge($appointment, $validatedData);
        $request->session()->put('appointment', $appointment);

        return redirect('appointments/step-three');
    }

    // Show Step 3: Customer Details
    public function showStepThree(Request $request) {
        $appointment = $request->session()->get('appointment', []);
        return view('admin.appointments.step-three', ['appointment' => $appointment]);
    }

    // Store data from Step 3 and show Confirmation
    public function storeStepThree(Request $request) {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'nullable|string',
            'appointment_date' => 'required|date',
        ]);

        $appointment = $request->session()->get('appointment', []);
        $appointment = array_merge($appointment, $validatedData);
        $request->session()->put('appointment', $appointment);

        return redirect('/appointments/confirmation');
    }

    // Show Confirmation
    public function showConfirmation(Request $request) {
        $appointment = $request->session()->get('appointment', []);
        return view('admin.appointments.confirmation', ['appointment' => $appointment]);
    }

    // Store Final Data and Save to Database
    public function storeConfirmation(Request $request) {
        $appointmentData = $request->session()->get('appointment');



        if ($appointmentData) {
            // Create Customer
            $customer = Customer::create([
                'first_name' => $appointmentData['first_name'],
                'last_name' => $appointmentData['last_name'],
                'phone' => $appointmentData['phone'],
                'email' => $appointmentData['email'],
                'address' => $appointmentData['address'],
            ]);

            // Create Vehicle
            $vehicle = Vehicle::create([
                'customer_id' => $customer->id,
                'model' => $appointmentData['model'],
                'year' => $appointmentData['year'],
                'transmission' => $appointmentData['transmission'],
                'odometer' => $appointmentData['odometer'],
            ]);

            // Create Appointment
            Appointment::create([
                'user_id' => 1,
                'customer_id' => $customer->id,
                'vehicle_id' => $vehicle->id,
                'services' => $appointmentData['services'],
                'note' => $appointmentData['note'],
                'appointment_date' => $appointmentData['appointment_date'],
            ]);

            // Forget session data
            // $request->session()->forget('appointment');

            return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully.');
        }

        return redirect()->route('appointments.step-one');
    }

    public function updateStatus(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = $request->input('status');
        $appointment->save();

        return redirect()->back()->with('status', 'Appointment status updated successfully!');
    }
}
