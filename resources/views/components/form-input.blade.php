<input {{$attributes->merge(['class' => "w-full rounded border-[1.5px] border-stroke bg-transparent mb-3 px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"])}}>
    {{ $slot }}
</input>
