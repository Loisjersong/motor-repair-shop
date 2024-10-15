<x-app-layout>
    <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <h4 class="mb-6 text-xl font-bold text-black dark:text-white">
            Appointments
        </h4>

        <div class="flex flex-col">
            <div class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-7">
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">APT. NO.</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">APT. DATE</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">name</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">email</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">phone</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">status</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Action</h5>
                </div>
            </div>

            <div class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-7">
                @foreach ($appointments as $appointment)
                    <div class="flex r items-center justify-center p-2.5 xl:p-5">
                        <p class="hidden font-medium text-black dark:text-white sm:block">
                            {{ $appointment->id }}
                        </p>
                    </div>

                    <!-- <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">{{ $appointment->title }}</p>
                    </div> -->

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">{{ $appointment->appointment_date->format('M d, Y') }}</p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">{{ $appointment->customer->first_name }} {{ $appointment->customer->last_name }}</p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">{{ $appointment->customer->email }}</p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">{{ $appointment->customer->phone }}</p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">{{ $appointment->status }}</p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <a class="hover:text-primary" href="/appointments/{{$appointment['id']}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z"></path><path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z"></path></svg>
                        </a>
                    </div>

                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
