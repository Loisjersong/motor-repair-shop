<x-app-layout>
    <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="flex justify-between">
            <h4 class="mb-6 text-xl font-bold text-black dark:text-white">
                Appointments
            </h4>

            <div class="mb- w-full text-right">
                <form method="GET" action="{{ route('appointments.index') }}">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search by ID, Name, Email, or Phone"
                        class="border border-gray-300 rounded p-2 w-full sm:w-1/2"
                    />
                    <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">
                        Search
                    </button>
                </form>
            </div>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7 rounded-sm bg-gray-2 dark:bg-meta-4">
            <div class="p-2.5 text-center xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">
                    <a href="{{ route('appointments.index', ['sort' => 'id', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                        APT. NO.
                    </a>
                </h5>
            </div>
            <div class="p-2.5 text-center xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">
                    <a href="{{ route('appointments.index', ['sort' => 'appointment_date', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                        APT. DATE
                    </a>
                </h5>
            </div>
            <div class="p-2.5 text-center xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">
                    <a href="{{ route('appointments.index', ['sort' => 'customer_name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                        Name
                    </a>
                </h5>
            </div>
            <div class="p-2.5 text-center xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">
                    <a href="{{ route('appointments.index', ['sort' => 'email', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                        Email
                    </a>
                </h5>
            </div>
            <div class="p-2.5 text-center xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">
                    <a href="{{ route('appointments.index', ['sort' => 'phone', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                        Phone
                    </a>
                </h5>
            </div>
            <div class="p-2.5 text-center xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">
                    <a href="{{ route('appointments.index', ['sort' => 'status', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                        Status
                    </a>
                </h5>
            </div>
            <div class="p-2.5 text-center xl:p-5">
                <h5 class="text-sm font-medium uppercase xsm:text-base">Action</h5>
            </div>
        </div>


            @foreach ($appointments as $index => $appointment)
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7 {{ $loop->last ? '' : 'border-b border-stroke dark:border-strokedark' }}">
                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="hidden font-medium text-black dark:text-white sm:block">
                            {{ $appointment->id }}
                        </p>
                    </div>

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
                        @if ($appointment->status === 'pending')
                            <span class="inline-block rounded-full px-3 py-1 text-sm font-medium text-yellow-500 bg-yellow-100 dark:bg-yellow-900">
                                {{ $appointment->status }}
                            </span>
                        @elseif ($appointment->status === 'approved')
                            <span class="inline-block rounded-full px-3 py-1 text-sm font-medium text-green-500 bg-green-100 dark:bg-green-900">
                                {{ $appointment->status }}
                            </span>
                        @elseif ($appointment->status === 'completed')
                            <span class="inline-block rounded-full px-3 py-1 text-sm font-medium text-blue-500 bg-blue-100 dark:bg-blue-900">
                                {{ $appointment->status }}
                            </span>
                        @elseif ($appointment->status === 'canceled')
                            <span class="inline-block rounded-full px-3 py-1 text-sm font-medium text-red-500 bg-red-100 dark:bg-red-900">
                                {{ $appointment->status }}
                            </span>
                        @endif
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <a class="hover:text-primary" href="/appointments/{{$appointment['id']}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z"></path><path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z"></path></svg>
                        </a>

                        <a class="hover:text-primary ml-2" href="/appointments/{{$appointment['id']}}/edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                                <path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path>
                            </svg>
                        </a>

                        <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                            <a class="flex items-center gap-4" href="#" @click.prevent="dropdownOpen = ! dropdownOpen">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M11 11h2v6h-2zm0-4h2v2h-2z"></path></svg>
                            </a>

                            <!-- Dropdown Start -->
                            <div x-show="dropdownOpen" class="absolute right-0 mt-4 flex w-62.5 flex-col rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                                <form method="POST" action="{{ route('appointments.updateStatus', ['appointment' => $appointment->id]) }}" class="inline"></form>
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="status" value="pending">
                                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Pending</button>
                                </form>
                                <form method="POST" action="{{ route('appointments.updateStatus', ['appointment' => $appointment->id]) }}" class="inline">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Approved</button>
                                </form>
                                <form method="POST" action="{{ route('appointments.updateStatus', ['appointment' => $appointment->id]) }}" class="inline">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="status" value="completed">
                                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Completed</button>
                                </form>
                                <form method="POST" action="{{ route('appointments.updateStatus', ['appointment' => $appointment->id]) }}" class="inline">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="status" value="canceled">
                                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Canceled</button>
                                </form>
                            </div>
                        </div>
                <!-- Dropdown End -->
                    </div>

            </div>
            @endforeach

        </div>

        <div class="mt-6">
            {{ $appointments->appends(request()->except('page'))->links() }}
        </div>
    </div>
</x-app-layout>
