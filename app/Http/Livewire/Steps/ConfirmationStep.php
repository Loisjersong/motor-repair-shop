<?php

namespace App\Http\Livewire\Steps;

use Spatie\LivewireWizard\Components\StepComponent;
use App\Models\Appointment;

class ConfirmationStep extends StepComponent
{

    public function confirm()
    {
        $vehicleInfo = $this->wizard->getData('vehicle-info');
        $services = $this->wizard->getData('services');
        $appointment = $this->wizard->getData('appointment');

        Appointment::create([
            'model' => $vehicleInfo['model'],
            'year' => $vehicleInfo['year'],
            'transmission' => $vehicleInfo['transmission'],
            'odometer' => $vehicleInfo['odometer'],
            'services' => $services['services'],
            'first_name' => $appointment['first_name'],
            'last_name' => $appointment['last_name'],
            'phone' => $appointment['phone'],
            'email' => $appointment['email'],
            'address' => $appointment['address'],
            'note' => $appointment['note'],
            'appointment_date' => $appointment['appointment_date'],
        ]);
    }

    public function render()
    {
        return view('livewire.steps.confirmation-step');
    }
}


