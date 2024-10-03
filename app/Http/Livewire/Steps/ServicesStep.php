<?php

namespace App\Http\Livewire\Steps;

use Spatie\LivewireWizard\Components\StepComponent;

class ServicesStep extends StepComponent
{
    public $services;


    public array $rules = [
            'services' => 'required|array',
            'services.*' => 'string',
    ];

    public function submit()
    {
        // $this->state()-set('', $this->);
        $this->nextStep();
    }

    public function render()
    {
        return view('livewire.steps.services-step');
    }
}
