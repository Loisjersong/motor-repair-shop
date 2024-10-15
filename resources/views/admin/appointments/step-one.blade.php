<x-app-layout>
    <x-container>
        <x-appointment-stepper :currentStep="1" />
        <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
            <h3 class="font-medium text-black dark:text-white">
                Vehicle Info
            </h3>
        </div>

        <form action="{{ route('appointments.step-one.post') }}" method="POST">
            @csrf
            <div class="p-6.5">
                <div class="mb-4.5">
                    <div>
                        <x-form-label for="model">Model</x-form-label>
                        <x-form-input type="text" name="model" id="model"></x-form-input>
                        <x-input-error :messages="$errors->get('model')" ></x-input-error>
                    </div>

                    <div>
                        <x-form-label for="year">Year</x-form-label>
                        <x-form-input type="number" name="year" id="year"></x-form-input>
                        <x-input-error :messages="$errors->get('year')" ></x-input-error>
                    </div>

                    <div>
                        <x-form-label for="transmission">Transmission</x-form-label>
                        <x-form-select name="transmission" id="transmission">
                            <option value="CVT">CVT</option>
                            <option value="Chain Drive">Chain Drive</option>
                        </x-form-select>
                        <x-input-error :messages="$errors->get('transmission')" ></x-input-error>
                    </div>

                    <div>
                        <x-form-label for="odometer">Odometer</x-form-label>
                        <x-form-select name="odometer" id="odometer" wire:model="odometer">
                            <option value="">Select Odometer</option>
                            <option value="0-15000 KM">0-15,000 KM</option>
                            <option value="16000-35000 KM">16,000 - 35,000 KM</option>
                            <option value="36000-55000 KM">36,000 - 55,000 KM</option>
                            <option value="56000-75000 KM">56,000 - 75,000 KM</option>
                            <option value="76000-95000 KM">76,000 - 95,000 KM</option>
                            <option value="96000 KM and above">96,000 KM and above</option>
                        </x-form-select>
                        <x-input-error :messages="$errors->get('odometer')" ></x-input-error>
                    </div>

                    <x-button type="submit" class="w-full">Next</x-button>
                </div>
            </div>
        </form>
    </x-container>
</x-app-layout>
