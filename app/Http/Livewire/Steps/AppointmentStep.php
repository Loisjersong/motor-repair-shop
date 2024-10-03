<?php

namespace App\Http\Livewire\Steps;

use Spatie\LivewireWizard\Components\StepComponent;

class AppointmentStep extends StepComponent
{

    public $first_name;
    public $last_name;
    public $phone;
    public $email;
    public $address;
    public $note;
    public $appointment_date;

    public array $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'note' => 'nullable|string',
            'appointment_date' => 'required|date'
    ];

    public function submit()
    {
        // ! resolve validation issues
        // $this->validate();
        $this->state()-set('first_name', $this->first_name);
        $this->state()-set('last_name', $this->last_name);
        $this->state()-set('phone', $this->phone);
        $this->state()-set('email', $this->email);
        $this->state()-set('address', $this->address);
        $this->state()-set('note', $this->note);
        $this->state()-set('appointment_date', $this->appointment_date);
        $this->nextStep();

    }

    public function render()
    {
        return view('livewire.steps.appointment-step');
    }
}


