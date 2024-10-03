<?php

namespace App\Http\Livewire;

use Spatie\LivewireWizard\Components\WizardComponent;
class VehicleAppointmentWizard extends WizardComponent
{
    public function steps(): array
    {
        return [
            \App\Http\Livewire\Steps\VehicleInfoStep::class,
            \App\Http\Livewire\Steps\AppointmentStep::class,
            \App\Http\Livewire\Steps\ServicesStep::class,
            \App\Http\Livewire\Steps\ConfirmationStep::class,
        ];
    }
}
