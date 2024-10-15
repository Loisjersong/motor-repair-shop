<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::all();
        return view('admin.appointments.index', ['appointments' => $appointments]);
    }


    public function show(Appointment $appointment) {
        return view('admin.appointments.show', ['appointment' => $appointment]);
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
        $validatedData['user_id'] = 1;
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

    // Show Step 3: Details
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
            'address' => 'required|string',
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
        $appointment = $request->session()->get('appointment');

        if ($appointment) {
            // Save to the database
            Appointment::create($appointment); // Ensure $appointment matches the model fillable attributes

            // Forget session data
            $request->session()->forget('appointment');

            return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully.');
        }

        return redirect()->route('appointments.step-one');
    }
}
