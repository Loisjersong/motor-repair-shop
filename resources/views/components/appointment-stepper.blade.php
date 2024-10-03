@props(['currentStep'])

<ol x-data="{ currentStep: {{ $currentStep ?? 1 }} }"
    class="flex justify-center items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-50 dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
    <!-- Step 1: Vehicle Info -->
    <li class="flex items-center"
        :class="currentStep >= 1 ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400'">
        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border rounded-full shrink-0"
            :class="currentStep >= 1 ? 'border-blue-600 dark:border-blue-500' : 'border-gray-500 dark:border-gray-400'">
            1
        </span>
        Vehicle <span class="hidden sm:inline-flex sm:ms-2">Info</span>
        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 12 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m7 9 4-4-4-4M1 9l4-4-4-4" />
        </svg>
    </li>
    <!-- Step 2: Services -->
    <li class="flex items-center"
        :class="currentStep >= 2 ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400'">
        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border rounded-full shrink-0"
            :class="currentStep >= 2 ? 'border-blue-600 dark:border-blue-500' : 'border-gray-500 dark:border-gray-400'">
            2
        </span>
        Services
        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 12 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m7 9 4-4-4-4M1 9l4-4-4-4" />
        </svg>
    </li>
    <!-- Step 3: Appointment Info -->
    <li class="flex items-center"
        :class="currentStep >= 3 ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400'">
        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border rounded-full shrink-0"
            :class="currentStep >= 3 ? 'border-blue-600 dark:border-blue-500' : 'border-gray-500 dark:border-gray-400'">
            3
        </span>
        Appointment <span class="hidden sm:inline-flex sm:ms-2">Info</span>
        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 12 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m7 9 4-4-4-4M1 9l4-4-4-4" />
        </svg>
    </li>
    <!-- Step 4: Confirmation -->
    <li class="flex items-center"
        :class="currentStep >= 4 ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 dark:text-gray-400'">
        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border rounded-full shrink-0"
            :class="currentStep >= 4 ? 'border-blue-600 dark:border-blue-500' : 'border-gray-500 dark:border-gray-400'">
            4
        </span>
        Confirmation
    </li>
</ol>
