<x-app-layout>
    <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="flex justify-between">
            <h4 class="mb-6 text-xl font-bold text-black dark:text-white">
                All Users
            </h4>

            <div class="flex justify-between items-center mb-4">
                <!-- Search Form -->
                <form method="GET" action="{{ route('users.index') }}" class="flex items-center space-x-2">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search by name or email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-primary"
                    >
                    <button
                        type="submit"
                        class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600"
                    >
                        Search
                    </button>
                </form>
            </div>
        </div>

        <div class="flex flex-col">
            <!-- Table Header -->
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-5 rounded-sm bg-gray-2 dark:bg-meta-4">
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">#</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Name</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Email</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Role</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Actions</h5>
                </div>
            </div>

            <!-- Table Rows -->
            @forelse ($users as $index => $user)
                <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-5 {{ $loop->last ? '' : 'border-b border-stroke dark:border-strokedark' }}">
                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">
                            {{ $users->firstItem() + $index }}
                        </p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">
                            {{ $user->email }}
                        </p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">
                            {{ $user->role->name }}
                        </p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5 space-x-3.5">
                        <a class="hover:text-primary" href="{{ route('users.show', $user->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                                <path d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z"></path>
                                <path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z"></path>
                            </svg>
                        </a>

                        <a class="hover:text-primary" href="{{ route('users.edit', $user->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                                <path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path>
                            </svg>
                        </a>

                        <a class="hover:text-primary" href="{{ route('users.destroy', $user->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                                <path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path>
                                <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                            </svg>
                        </a>
                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-5">
                    <p class="text-center text-black dark:text-white">No users found.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
