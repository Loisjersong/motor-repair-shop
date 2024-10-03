<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index() {
        $user = Auth::user();

        $appointments = Appointment::where('user_id', $user->id)->get();

        return view('customer.appointments.index', compact('appointments'));
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

        $validatedData['user_id'] = Auth::user()->id;
        $appointment = $request->session()->get('appointment', []);
        $appointment = array_merge($appointment, $validatedData);
        $request->session()->put('appointment', $appointment);



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

        $appointment = $request->session()->get('appointment', []);
        $appointment = array_merge($appointment, $validatedData);
        $request->session()->put('appointment', $appointment);

        return redirect('/customer/appointments/step-three');
    }

    // Show Step 3: Details
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

        $appointment = $request->session()->get('appointment', []);
        $appointment = array_merge($appointment, $validatedData);
        $request->session()->put('appointment', $appointment);

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
            // Save to the database
            if (!isset($appointment['user_id'])) {
                $appointment['user_id'] = Auth::user()->id;
            }

            Appointment::create($appointment); // Ensure $appointment matches the model fillable attributes

            // Forget session data
            $request->session()->forget('appointment');

            return redirect('/customer/appointments/index')->with('success', 'Appointment booked successfully.');
        }

        return redirect('/customer/appointments/step-one');
    }
}
