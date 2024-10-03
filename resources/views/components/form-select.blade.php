<div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input mb-3">
    <select
        {{ $attributes->merge(['class' => 'relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input']) }}
        :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
        {{ $slot }}
    </select>
</div>
