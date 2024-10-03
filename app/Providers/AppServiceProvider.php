<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use App\Http\Livewire\Steps\VehicleInfoStep;
use App\Http\Livewire\Steps\ConfirmationStep;
use App\Http\Livewire\Steps\ServicesStep;
use App\Http\Livewire\Steps\AppointmentStep;
use App\Http\Livewire\VehicleAppointmentWizard;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::component('vehicle-appointment-wizard', VehicleAppointmentWizard::class);
        Livewire::component('vehicle-info-step', VehicleInfoStep::class);
        Livewire::component('appointment-step', AppointmentStep::class);
        Livewire::component('services-step', ServicesStep::class);
        Livewire::component('confirmation-step', ConfirmationStep::class);

    }
}
