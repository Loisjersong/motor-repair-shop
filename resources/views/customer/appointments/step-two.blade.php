@extends('customer.layouts.app')

@section('content')
<x-appointment-stepper :currentStep="2" />

<x-container>
    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <h3 class="font-medium text-black dark:text-white">
            Select Services
        </h3>
    </div>

    <form action="/customer/appointments/step-two" method="post">
        @csrf
        <div class="p-6.5">
            <div class="mb-4.5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Services
                </label>

                <div class="border-none">
                    <select class="hidden" x-cloak id="select" size="5" style="overflow-y: auto;">
                        <option value="Change Oil">Change Oil</option>
                        <option value="Tune Up">Tune Up</option>
                        <option value="Tire Pressure Check">Tire Pressure Check</option>
                        <option value="Rim/Wheel Alignment">Rim/Wheel Alignment</option>
                        <option value="Repaint">Repaint</option>
                        <option value="Wiring">Wiring</option>
                        <option value="Carburetor Tuning">Carburetor Tuning</option>
                        <option value="Fi Cleaning">Fi Cleaning</option>
                        <option value="Injector Cleaning">Injector Cleaning</option>
                        <option value="Throttle Cable Replacement">Throttle Cable Replacement</option>
                        <option value="Bearing Replacement">Bearing Replacement</option>
                        <option value="Overhaul">Overhaul</option>
                        <option value="Engine Refresh">Engine Refresh</option>
                        <option value="Engine Upgrade">Engine Upgrade</option>
                        <option value="Hybrid Engine Upgrade">Hybrid Engine Upgrade</option>
                        <option value="CVT Tuning">CVT Tuning</option>
                        <option value="Part Modification">Part Modification</option>
                        <option value="Fabrication (Lathe Machine)">Fabrication (Lathe Machine)</option>
                        <option value="Exhaust Pipe Restoration">Exhaust Pipe Restoration</option>
                        <option value="Full Body Restoration">Full Body Restoration</option>
                        <option value="Transmission Upgrade">Transmission Upgrade</option>
                        <option value="Tire Replacement">Tire Replacement</option>
                    </select>

                    <div x-data="dropdown()" x-init="loadOptions()" class="flex flex-col items-center ">
                        <input name="services" type="hidden" :value="selectedValues()" />
                        <div class="relative z-20 inline-block w-full">
                            <div class="relative flex flex-col items-center">
                                <div @click="open" class="w-full">
                                    <div
                                        class="mb-2 flex rounded border border-stroke py-2 pl-3 pr-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input">
                                        <div class="flex flex-auto flex-wrap gap-3">
                                            <template x-for="(option,index) in selected" :key="index">
                                                <div
                                                    class="my-1.5 flex items-center justify-center rounded border-[.5px] border-stroke bg-gray px-2.5 py-1.5 text-sm font-medium dark:border-strokedark dark:bg-white/30 border-none">
                                                    <div class="max-w-full flex-initial" x-model="options[option]"
                                                        x-text="options[option].text"></div>
                                                    <div class="flex flex-auto flex-row-reverse">
                                                        <div @click="remove(index,option)"
                                                            class="cursor-pointer pl-2 hover:text-danger">
                                                            <svg class="fill-current" role="button" width="12"
                                                                height="12" viewBox="0 0 12 12" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M9.35355 3.35355C9.54882 3.15829 9.54882 2.84171 9.35355 2.64645C9.15829 2.45118 8.84171 2.45118 8.64645 2.64645L6 5.29289L3.35355 2.64645C3.15829 2.45118 2.84171 2.45118 2.64645 2.64645C2.45118 2.84171 2.45118 3.15829 2.64645 3.35355L5.29289 6L2.64645 8.64645C2.45118 8.84171 2.45118 9.15829 2.64645 9.35355C2.84171 9.54882 3.15829 9.54882 3.35355 9.35355L6 6.70711L8.64645 9.35355C8.84171 9.54882 9.15829 9.54882 9.35355 9.35355C9.54882 9.15829 9.54882 8.84171 9.35355 8.64645L6.70711 6L9.35355 3.35355Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                            <div x-show="selected.length == 0" class="flex-1">
                                                <input placeholder="Select a option"
                                                    class="h-full w-full appearance-none bg-transparent p-1 px-2 outline-none border-none"
                                                    :value="selectedValues()" />
                                            </div>
                                        </div>
                                        <div class="flex w-8 items-center py-1 pl-1 pr-1">
                                            <button type="button" @click="open"
                                                class="h-6 w-6 cursor-pointer outline-none focus:outline-none"
                                                :class="isOpen() === true ? 'rotate-180' : ''">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.8">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                            fill="#637381"></path>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full px-4">
                                    <div x-show.transition.origin.top="isOpen()"
                                        class="max-h-select absolute top-full left-0 z-40 w-full max-h-60 overflow-y-auto rounded bg-white shadow dark:bg-form-input"
                                        @click.outside="close">
                                        <div class="flex w-full flex-col">
                                            <template x-for="(option,index) in options" :key="index">
                                                <div>
                                                    <div class="w-full cursor-pointer rounded-t border-b border-stroke hover:bg-primary/5 dark:border-form-strokedark"
                                                        @click="select(index,$event)">
                                                        <div :class="option.selected ? 'border-primary' : ''"
                                                            class="relative flex w-full items-center border-l-2 border-transparent p-2 pl-2">
                                                            <div class="flex w-full items-center">
                                                                <div class="mx-2 leading-6" x-model="option"
                                                                    x-text="option.text"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('services')" />
                </div>

                <!-- Vehicle Issues/Notes -->
            <div>
                <x-form-label for="note">Vehicle Issues / Other Notes or Requests</x-form-label>
                <x-form-textarea id="note" name="note"></x-form-textarea>
                <x-input-error :messages="$errors->get('note')" />
            </div>
            </div>
            <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90" type="submit">
                Next
            </button>
        </div>
    </form>
</x-container>

<script>
    function dropdown() {
        return {
            options: [],
            selected: [],
            show: false,
            open() {
                this.show = true;
            },
            close() {
                this.show = false;
            },
            isOpen() {
                return this.show === true;
            },
            select(index, event) {
                if (!this.options[index].selected) {
                    this.options[index].selected = true;
                    this.options[index].element = event.target;
                    this.selected.push(index);
                } else {
                    this.selected.splice(this.selected.lastIndexOf(index), 1);
                    this.options[index].selected = false;
                }
            },
            remove(index, option) {
                this.options[option].selected = false;
                this.selected.splice(index, 1);
            },
            loadOptions() {
                const options = document.getElementById("select").options;
                for (let i = 0; i < options.length; i++) {
                    this.options.push({
                        value: options[i].value,
                        text: options[i].innerText,
                        selected: options[i].getAttribute("selected") != null ?
                            options[i].getAttribute("selected") :
                            false,
                    });
                }
            },
            selectedValues() {
                return this.selected.map((option) => {
                    return this.options[option].value;
                });
            },
        };
    }
</script>
@endsection
