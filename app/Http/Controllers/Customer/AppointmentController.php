<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;
use App\Models\Customer;

class AppointmentController extends Controller
{
    public function index() {
        $user = Auth::user();
        $appointments = Appointment::with(['customer', 'vehicle'])
                            ->where('user_id', $user->id)
                            ->where('status', 'pending')
                            ->get();

        return view('customer.appointments.index', compact('appointments'));
    }

    public function approved() {
        $user = Auth::user();
        $appointments = Appointment::with(['customer', 'vehicle'])
                            ->where('user_id', $user->id)
                            ->where('status', 'approved')
                            ->get();

        return view('customer.appointments.upcoming-appointments', compact('appointments'));
    }

    public function completed() {
        $user = Auth::user();
        $appointments = Appointment::with(['customer', 'vehicle'])
                            ->where('user_id', $user->id)
                            ->where('status', 'completed')
                            ->get();

        return view('customer.appointments.completed-appointments', compact('appointments'));
    }


    public function show(Appointment $appointment) {
        return view('customer.appointments.show', ['appointment' => $appointment]);
    }

     // Show Step 1: Vehicle Info
     public function showStepOne(Request $request) {
        $appointment = $request->session()->get('appointment', []);
        return view('customer.appointments.step-one', ['appointment' => $appointment]);
    }

    // Store data from Step 1
    public function storeStepOne(Request $request) {
        $validatedData = $request->validate([
            'model' => 'required|string',
            'year' => 'required|string',
            'transmission' => 'required|string',
            'odometer' => 'required|string',
        ]);

        // Add the user_id (authenticated user) to the session data
        $validatedData['user_id'] = Auth::user()->id;

        // Retrieve the existing session data and merge it with the new data
        $appointment = $request->session()->get('appointment', []);
        $appointment = array_merge($appointment, $validatedData);
        $request->session()->put('appointment', $appointment);

        // Redirect to the next step
        return redirect('/customer/appointments/step-two');
    }

    // Show Step 2: Services
    public function showStepTwo(Request $request) {
        $appointment = $request->session()->get('appointment', []);
        return view('customer.appointments.step-two', ['appointment' => $appointment]);
    }

    // Store data from Step 2
    public function storeStepTwo(Request $request) {
        $validatedData = $request->validate([
            'services' => 'required|string',
            'note' => 'nullable|string',
        ]);

        // Retrieve the existing session data and merge it with the new data
        $appointment = $request->session()->get('appointment', []);
        $appointment = array_merge($appointment, $validatedData);
        $request->session()->put('appointment', $appointment);

        // Redirect to the next step
        return redirect('/customer/appointments/step-three');
    }

    // Show Step 3: Customer Details
    public function showStepThree(Request $request) {
        $appointment = $request->session()->get('appointment', []);
        return view('customer.appointments.step-three', ['appointment' => $appointment]);
    }

    // Store data from Step 3 and show Confirmation
    public function storeStepThree(Request $request) {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'appointment_date' => 'required|date',
        ]);

        // Retrieve the existing session data and merge it with the new data
        $appointment = $request->session()->get('appointment', []);
        $appointment = array_merge($appointment, $validatedData);
        $request->session()->put('appointment', $appointment);

        // Redirect to the confirmation step
        return redirect('/customer/appointments/confirmation');
    }

    // Show Confirmation
    public function showConfirmation(Request $request) {
        $appointment = $request->session()->get('appointment', []);
        return view('customer.appointments.confirmation', ['appointment' => $appointment]);
    }

    // Store Final Data and Save to Database
    public function storeConfirmation(Request $request) {
        $appointment = $request->session()->get('appointment');

        if ($appointment) {
            // Add user_id and customer_id if not set
            if (!isset($appointment['user_id'])) {
                $appointment['user_id'] = Auth::user()->id;
            }
            if (!isset($appointment['customer_id'])) {
                $appointment['customer_id'] = Auth::user()->id;
            }

            // Create Customer
            $customer = Customer::create([
                'first_name' => $appointment['first_name'],
                'last_name' => $appointment['last_name'],
                'phone' => $appointment['phone'],
                'email' => $appointment['email'],
                'address' => $appointment['address'],
            ]);

            // Create Vehicle
            $vehicle = Vehicle::create([
                'customer_id' => $customer->id,
                'model' => $appointment['model'],
                'year' => $appointment['year'],
                'transmission' => $appointment['transmission'],
                'odometer' => $appointment['odometer'],
            ]);

            // Create Appointment
            Appointment::create([
                'user_id' => Auth::user()->id,  // Set the currently authenticated user
                'customer_id' => $customer->id,
                'vehicle_id' => $vehicle->id,
                'services' => $appointment['services'],
                'note' => $appointment['note'],
                'appointment_date' => $appointment['appointment_date'],
            ]);

            // Forget session data after successful appointment creation
            $request->session()->forget('appointment');

            // Redirect to the appointment index page with success message
            return redirect('/customer/appointments/index')->with('success', 'Appointment booked successfully.');
        }

        // If no appointment data exists in the session, redirect back to step 1
        return redirect('/customer/appointments/step-one');
    }

    public function cancel($id)
    {
        // Retrieve the appointment by its ID
        $appointment = Appointment::findOrFail($id);

        // Update the status to 'canceled'
        $appointment->status = 'canceled';
        $appointment->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Appointment has been canceled.');
    }

}
