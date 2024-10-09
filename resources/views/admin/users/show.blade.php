<x-app-layout>
    <div class="flex justify-center items-center">
        <div class="w-full max-w-md">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">
                        Edit User
                    </h3>
                </div>

                <div class="p-6.5">
                    <div class="mb-4.5">
                        <!-- First Name -->
                        <div>
                            <x-form-label for="first_name">First Name</x-form-label>
                            <x-form-input type="text" name="first_name" value="{{ $user->first_name }}" required disabled></x-form-input>
                        </div>

                        <!-- Last Name -->
                        <div>
                            <x-form-label for="last_name">Last Name</x-form-label>
                            <x-form-input type="text" name="last_name" value="{{ $user->last_name }}" required disabled></x-form-input>
                        </div>

                        <!-- Email -->
                        <div>
                            <x-form-label for="email">Email</x-form-label>
                            <x-form-input type="email" name="email" value="{{ $user->email }}" required disabled></x-form-input>
                        </div>

                        <!-- Mobile Number -->
                        <div>
                            <x-form-label for="phone">Mobile Number</x-form-label>
                            <x-form-input type="number" name="phone" value="{{ $user->phone }}" required disabled></x-form-input>
                        </div>

                        <!-- Password -->
                        <div>
                            <x-form-label for="password">Password</x-form-label>
                            <x-form-input type="password" name="password" disabled></x-form-input>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                            <x-form-input type="password" name="password_confirmation" disabled></x-form-input>
                        </div>

                        <!-- Date of Birth -->
                        <div>
                            <x-form-label for="date_of_birth">Date of Birth</x-form-label>
                            <x-form-input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}" required disabled></x-form-input>
                        </div>

                        <!-- Role -->
                        <div>
                            <x-form-label for="role_id">Role</x-form-label>
                            <x-form-input type="text" name="role_id" value="{{ $user->role->name }}" required disabled></x-form-input>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-between mt-4">
                        <x-a-btn href="{{ route('users.index') }}" >Back to Users</x-a-btn>
                        <x-a-btn href="{{ route('users.edit', $user->id) }}" >Edit User</x-a-btn>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
