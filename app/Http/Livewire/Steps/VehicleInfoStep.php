<?php

namespace App\Http\Livewire\Steps;

use Spatie\LivewireWizard\Components\StepComponent;

class VehicleInfoStep extends StepComponent
{
    public $model;
    public $year;
    public $transmission;
    public $odometer;

    public array $rules = [
            'model' => 'required|string',
            'year' => 'required|integer|min:2000|max:2024',
            'transmission' => 'required|string',
            'odometer' => 'required|array',
            'odometer.*' => 'string',
    ];

    public function submit()
    {
        // ! resolve validation issues
        // $this->validate();
        // $this->state()-set('model', $this->model);
        // $this->state()-set('year', $this->year);
        // $this->state()-set('transmission', $this->transmission);
        // $this->state()-set('odometer', $this->odometer);
        $this->nextStep();
    }

    public function render()
    {
        return view('livewire.steps.vehicle-info-step');
    }
}

